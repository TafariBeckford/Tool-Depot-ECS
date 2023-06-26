

output "database_subnets" {

  value = module.tool-depot-vpc.database_subnets
}


output "public_subnets" {

  value = module.tool-depot-vpc.public_subnets

}

output "private_subnets" {

  value = module.tool-depot-vpc.private_subnets
}

output "vpc_id" {

  value = module.tool-depot-vpc.vpc_id
}

output "ecs_security_group_id" {

  value = module.ecs_sg.security_group_id
  
}

output "rds_security_group_id" {

  value = module.database_sg.security_group_id
  
}


