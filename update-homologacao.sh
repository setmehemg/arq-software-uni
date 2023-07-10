#!/bin/bash

sudo docker pull -q henriquemg/gcs-laravel:latest
sudo docker compose -f docker-compose.stage.yml -p stage up -d
sudo docker exec eventos-homolog php artisan migrate