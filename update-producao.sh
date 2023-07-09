#!/bin/bash

docker pull henriquemg/gcs-laravel:latest
docker compose -f docker-compose.prod.yml -p prod up -d
docker exec eventos-prod php artisan migrate