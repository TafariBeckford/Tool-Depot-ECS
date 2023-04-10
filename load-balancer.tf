module "alb" {
  source  = "terraform-aws-modules/alb/aws"
  version = "~> 8.0"

  name = "tool-alb"


  load_balancer_type = "application"

  vpc_id             = data.aws_vpc.default.id
  subnets            = [data.aws_subnets.selected.ids[0],data.aws_subnets.selected.ids[1]]

  create_security_group = true
  security_group_name = "tool-depot-sg"
  security_group_rules = {
    ingress_all_http = {
      type        = "ingress"
      from_port   = 80
      to_port     = 80
      protocol    = "tcp"
      description = "HTTP web traffic"
      cidr_blocks = ["0.0.0.0/0"]
    }
     egress_all = {
      type        = "egress"
      from_port   = 0
      to_port     = 0
      protocol    = "-1"
      cidr_blocks = ["0.0.0.0/0"]
    }
   }

  target_groups = [
    {
      name_prefix      = "pref-"
      backend_protocol = "HTTP"
      backend_port     = 80
      target_type      = "ip"
    }
  ]

  http_tcp_listeners = [
    {
      port               = 80
      protocol           = "HTTP"
      target_group_index = 0
    }
  ]

  tags = {
    Environment = "Test"
  }
}


data "aws_vpc" "default" {
  default = true
} 

data "aws_subnets" "selected" {
filter {
    name   = "vpc-id"
    values = [data.aws_vpc.default.id]
  }
}