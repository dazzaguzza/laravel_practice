#!/bin/bash
cd /var/www/html/laravel_practice/docker
sudo docker rm $(sudo docker ps -q)
sudo docker rmi $(sudo docker images -q)
sudo rm -rf /var/www/html/laravel_practice   