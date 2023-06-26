module "tool-depot-vpc" {
  source = "terraform-aws-modules/vpc/aws"

  name = "tool-depot-vpc"
  cidr = var.cidr_block

  azs                   = ["us-east-1a", "us-east-1b"]
  private_subnets       = slice(cidrsubnets(var.cidr_block, 4, 4, 4, 4, 4, 4), 0, 2)
  public_subnets        = slice(cidrsubnets(var.cidr_block, 4, 4, 4, 4, 4, 4), 2, 4)
  database_subnets      = slice(cidrsubnets(var.cidr_block, 4, 4, 4, 4, 4, 4), 4, 6)
  database_subnet_names = ["db-a", "db-b", "db-c"]
  private_subnet_names  = ["app-a", "app-b", "app-c"]
  public_subnet_names   = ["pub-a", "pub-b", "pub-c"]
  enable_dns_hostnames  = true

  tags = {
    Terraform   = "true"
    Environment = "dev"
  }
}