#!/bin/bash
cd /var/www/html/laravel_practice/docker
sudo docker system prune -f
sudo docker container stop $(docker container ls -aq)
sudo docker container rm $(docker container ls -aq)
sudo docker rmi $(docker images -aq)
sudo docker volume prune -f
rm -rf /var/www/html/laravel_practice   