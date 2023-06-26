module "s3_bucket" {
  source = "terraform-aws-modules/s3-bucket/aws"

  bucket = "remote-terraform-state-files-876"
  acl    = "private"

  control_object_ownership = true
  object_ownership         = "ObjectWriter"

  versioning = {
    enabled = true
  }
}