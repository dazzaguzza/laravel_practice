#!/bin/bash
cd /var/www/html/laravel_practice/docker
sudo docker-compose down
sudo docker system prune --volumes
rm -rf /var/www/html/laravel_practice   