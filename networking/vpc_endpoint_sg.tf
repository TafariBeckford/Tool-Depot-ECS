module "endpoint_sg" {
  source = "terraform-aws-modules/security-group/aws"

  name        = "endpoint-security-group"
  description = "Security group for ECS with ports open within VPC"
  vpc_id      =  module.tool-depot-vpc.vpc_id

  ingress_with_cidr_blocks = [
    {
      from_port   = 443
      to_port     = 443
      protocol    = "tcp"
      cidr_blocks = "10.17.0.0/16"
    }
  ]
}