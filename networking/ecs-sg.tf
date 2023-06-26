module "ecs_sg" {
  source = "terraform-aws-modules/security-group/aws"

  name        = "ecs-security-group"
  description = "Security group for ECS with ports open within VPC"
  vpc_id      =  module.tool-depot-vpc.vpc_id

  egress_cidr_blocks = ["0.0.0.0/0"]
  egress_rules       = ["all-all"]

  ingress_with_cidr_blocks = [
    {
      from_port   = 80
      to_port     = 80
      protocol    = "tcp"
      cidr_blocks = "10.17.0.0/16"
    }
  ]
}