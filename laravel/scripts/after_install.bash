#!/bin/bash 
cd /var/www/html
aws secretsmanager get-secret-value --region ap-northeast-2 --secret-id env --query SecretString --output text | sudo tee secret.json
jq -r '{"KEYS": "VALUES"} + to_entries[] | "\(.key)=\(.value)"' secret.json | sudo tee laravel_practice/laravel/.env
# sudo rm -f secret.json
# cd laravel_practice/docker
# sudo docker-compose up --build -d

 

 