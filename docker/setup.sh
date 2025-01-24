#!/bin/bash
sudo docker compose build --no-cache

sudo docker compose up -d

# Permission to src folder
sudo chown -R $USER:$USER src
sudo chmod -R 777 src

# composer install
docker exec task-api composer install

# Copy the .env-example file to .env
cp src/.env-example src/.env