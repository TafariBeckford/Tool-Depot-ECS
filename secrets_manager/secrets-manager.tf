module "secrets-manager" {
  source  = "lgallard/secrets-manager/aws"
  version = "0.8.0"

  secrets = {
     rds-secrets = {
      description = "Another key/value secret"
      secret_key_value = {
        username = random_string.random.result
        password = random_password.password.result
      }
      tags = {
        app = "web"
      }
      recovery_window_in_days = 7
    },
  }

  tags = {
    Environment = "dev"
    Terraform   = true
  }
  }

 resource "random_password" "password" {
  length = 8
  special = false
  upper = false
}

resource "random_string" "random" {
  length = 10
  special = false
  upper = false
}