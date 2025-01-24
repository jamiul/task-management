#!/bin/bash
docker compose up -d

# Permission to src folder
sudo chown -R $USER:$USER src
sudo chmod -R 777 src


# composer install
docker exec task-api composer install

sleep(2)

# Check if .env-example exists before copying
if [ -f src/.env.example ]; then
    cp src/.env.example src/.env
else
    echo "Error: src/.env.example does not exist."
    exit 1
fi