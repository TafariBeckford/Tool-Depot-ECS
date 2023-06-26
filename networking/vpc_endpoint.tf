module "endpoints" {
  source = "terraform-aws-modules/vpc/aws//modules/vpc-endpoints"

  vpc_id             = module.tool-depot-vpc.vpc_id
  security_group_ids = [module.endpoint_sg.security_group_id]
  
   endpoints = {
    s3 = {
      service             = "s3"
      service_type        = "Gateway"
      route_table_ids     =  module.tool-depot-vpc.private_route_table_ids
      policy              = data.aws_iam_policy_document.s3_gateway_policy.json
      tags                = { Name = "s3-vpc-endpoint" }
    },
    ecr_api = {
      service             = "ecr.api"
      private_dns_enabled = true
      policy              = data.aws_iam_policy_document.vpc_endpoint_policy.json
      subnet_ids          = module.tool-depot-vpc.private_subnets
           tags           = { Name = "ecr.api-endpoint" }
    },
    ecr_dkr = {
      service             = "ecr.dkr"
      private_dns_enabled = true
       policy             = data.aws_iam_policy_document.vpc_endpoint_policy.json
      subnet_ids          = module.tool-depot-vpc.private_subnets
        tags           = { Name = "ecr.dkr-endpoint" }
    }
}
}

data "aws_iam_policy_document" "s3_gateway_policy" {
  statement {
    sid       = "Access-to-specific-bucket-only"
    effect    = "Allow"
    principals {
      type        = "AWS"
      identifiers = ["*"]
    }
    actions   = ["s3:GetObject"]
    resources = ["arn:aws:s3:::prod-us-east-1-starport-layer-bucket/*"]
  }
}

data "aws_iam_policy_document" "vpc_endpoint_policy" {
 statement {
    sid       = "AllowPull"
    effect    = "Allow"
    principals {
      type        = "AWS"
      identifiers = ["arn:aws:iam::764450536500:role/ecsTaskExecutionRole"]
    }
    actions   = [
      "ecr:BatchGetImage",
      "ecr:GetDownloadUrlForLayer",
      "ecr:GetAuthorizationToken",
    ]
    resources = ["*"]
  }
}

