#!/bin/bash 
cd /var/www/html
aws secretsmanager get-secret-value --region ap-northeast-2 --secret-id env --query SecretString --output text | sudo tee env.json
jq -r '{"KEYS": "VALUES"} + to_entries[] | "\(.key)=\(.value)"' env.json | sudo tee laravel_practice/laravel/.env
sudo rm -f env.json
cd laravel_practice/docker
sudo docker-compose up --build -d  
sudo docker system prune -f
sudo docker volume prune -f
sudo docker exec app chmod 755 -R storage
sudo docker exec app chmod 755 -R bootstrap

