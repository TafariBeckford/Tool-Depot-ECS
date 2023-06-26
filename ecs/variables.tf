variable "cluster_name" {
  type    = string
  default = "tool_depot"
}


variable "container_name" {

  default = "tool-depot"

}

variable "container_image" {

  default = "764450536500.dkr.ecr.us-east-1.amazonaws.com/tool-depot-registry:latest"

}

variable "container_definitions_name" {
  default = "tool-depot"

}