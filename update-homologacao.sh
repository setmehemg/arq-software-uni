#!/bin/bash

docker compose -f docker-compose.stage.yml -p stage up -d
docker exec eventos-homolog php artisan migrate