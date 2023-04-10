resource "aws_ecs_cluster" "tool_depot" {
  name =  var.cluster_name

  setting {
    name  = "containerInsights"
    value = "enabled"
  }
}

resource "aws_ecs_task_definition" "tool_depot_task" {
  family = "tool_depot_task"
  requires_compatibilities = ["FARGATE"]
  network_mode = "awsvpc"
  cpu                      = 1024
  memory                   = 2048
  execution_role_arn = data.aws_iam_role.example.arn
 
  container_definitions = jsonencode([
    {
      name      = "tool-depot"
      image     = "764450536500.dkr.ecr.us-east-1.amazonaws.com/tool-depot-registry:latest"
      cpu       = 1024
      memory    = 2048
      essential = true
      portMappings = [
        {
          containerPort = 80
          hostPort      = 80
        }
      ]
    },
  ])
 
}

resource "aws_ecs_service" "tool_depot_service" {
  name            = "tool_depot_service"
  cluster         = aws_ecs_cluster.tool_depot.id
  task_definition = aws_ecs_task_definition.tool_depot_task.arn
  desired_count   = 3
  launch_type     = "FARGATE"

   load_balancer {
    target_group_arn = module.alb.target_group_arns[0]
    container_name   = var.container_name
    container_port   = 80
  }

  network_configuration {
    subnets = [data.aws_subnets.selected.ids[0],data.aws_subnets.selected.ids[1]]
    assign_public_ip = true
  }

}

data "aws_iam_role" "example" {
  name = "ecsTaskExecutionRole"
}

