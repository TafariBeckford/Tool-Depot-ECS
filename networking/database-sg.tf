module "database_sg" {
  source = "terraform-aws-modules/security-group/aws"

  name        = "rds-security-group"
  description = "Security group to open SQL within the VPC"
  vpc_id      = module.tool-depot-vpc.vpc_id

  egress_cidr_blocks = ["0.0.0.0/0"]
  egress_rules       = ["all-all"]

  computed_ingress_with_source_security_group_id = [
    {
      rule                     = "mysql-tcp"
      source_security_group_id = module.ecs_sg.security_group_id
    },
    {
      rule                     = "mysql-tcp"
      source_security_group_id = module.bastion_sg.security_group_id
    }
  ]
  number_of_computed_ingress_with_source_security_group_id = 2


}

