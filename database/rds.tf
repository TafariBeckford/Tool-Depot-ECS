module "db" {

  source  = "terraform-aws-modules/rds/aws"
  version = "5.9.0"

  identifier = "tooldepot"

  engine              = "mysql"
  engine_version      = "8.0.28"
  instance_class      = "db.t3.micro"
  allocated_storage   = 20
  multi_az            = true
  publicly_accessible = false
  create_random_password = false
  apply_immediately   = true

  db_name                = "tooldepotdb"
  username               = jsondecode(data.aws_secretsmanager_secret_version.secret.secret_string).username
  password               = jsondecode(data.aws_secretsmanager_secret_version.secret.secret_string).password
  port                   = "3306"

  iam_database_authentication_enabled = true

  vpc_security_group_ids = [data.terraform_remote_state.network.outputs.rds_security_group_id]

  tags = {
    Owner       = "user"
    Environment = "dev"
  }

  # DB subnet group
  create_db_subnet_group = true
  db_subnet_group_name   = "tool-depot-db-group"

  create_db_option_group    = false
  create_db_parameter_group = false

  subnet_ids = data.terraform_remote_state.network.outputs.private_subnets
}

