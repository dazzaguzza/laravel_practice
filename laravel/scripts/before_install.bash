#!/bin/bash
cd /var/www/html/laravel_practice/docker
sudo docker rm -f $(sudo docker ps -q)
sudo docker rmi -f $(sudo docker images -q)
sudo docker system prune -f
sudo docker volume prune -f
sudo rm -rf /var/www/html/laravel_practice  