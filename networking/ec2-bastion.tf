module "ec2_instance" {
  source  = "terraform-aws-modules/ec2-instance/aws"

  name = "bastion-instance"

  instance_type          = "t2.micro"
  monitoring             = true
  associate_public_ip_address = true
  vpc_security_group_ids = [module.bastion_sg.security_group_id]
  subnet_id              = module.tool-depot-vpc.public_subnets[0]
  key_name                = data.aws_key_pair.key.key_name
  tags = {
    Terraform   = "true"
    Environment = "dev"
  }
}

data "aws_key_pair" "key" {
  key_pair_id = "key-09f92d41facb18057"
  include_public_key = true
}
