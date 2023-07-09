#!/bin/bash

docker pull henriquemg/gcs-laravel:latest
docker compose -f docker-compose.stage.yml -p stage up -d