#!/bin/bash
cd /var/www/html/laravel_practice/docker
sudo docker system prune -f
sudo docker rm $(sudo docker ps -q)
sudo docker rmi $(sudo docker images -q)
sudo docker volume prune -f
rm -rf /var/www/html/laravel_practice   