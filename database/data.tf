data "terraform_remote_state" "network" {
  backend = "s3"
  config = {
    bucket = "remote-terraform-state-files-876"
    key    = "networking/terraform.tf"
    region = "us-east-1"
  }
}

data "aws_secretsmanager_secret" "by-name" {
  name = "rds-secrets"
}

data "aws_secretsmanager_secret_version" "secret" {
  secret_id = data.aws_secretsmanager_secret.by-name.id
}