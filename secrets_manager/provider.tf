terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = ">= 5.0.0"
    }
     random = {
      source = "hashicorp/random"
      version = ">= 3.1.0"
    }
  }
  backend "s3" {
    bucket = "remote-terraform-state-files-876"
    key    = "secrets-manager/terraform.tf"
    region = "us-east-1"
  }
}

provider "aws" {
  region = "us-east-1"
}

provider "random" {
  
}