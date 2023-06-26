module "bastion_sg" {
  source = "terraform-aws-modules/security-group/aws"

  name        = "bastion-security-group"
  description = "Security group to open SSH publicly"
  vpc_id      = module.tool-depot-vpc.vpc_id

  egress_cidr_blocks = ["0.0.0.0/0"]
  egress_rules       = ["all-all"]

  computed_ingress_with_cidr_blocks = [
    {
      rule        = "ssh-tcp"
      cidr_blocks = "0.0.0.0/0"
    }
  ]
  number_of_computed_ingress_with_cidr_blocks = 1
}