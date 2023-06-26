
data "terraform_remote_state" "network" {
  backend = "s3"
  config = {
    bucket = "remote-terraform-state-files-876"
    key    = "networking/terraform.tf"
    region = "us-east-1"
  }
}

data "aws_iam_role" "es" {
  name = "ecsTaskExecutionRole"
}

data "aws_ecr_image" "service_image" {
  repository_name = "tool-depot-registry"
  image_tag       = "latest"
}
data "aws_ecr_repository" "service" {
  name = "tool-depot-registry"
}