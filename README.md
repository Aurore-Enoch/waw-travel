# waw.travel
Réaliser une plateforme permettant aux utilisateurs inscrits de créer un carnet de voyage (type road trip avec plusieurs étapes). Pour pouvoir être consultée facilement par la famille des voyageurs, une page web publique détaillera l'ensemble du road trip.

## Requirements
- Docker

## Installation
1. Build the Docker image: `docker build -t wawtravel .`
2. Run the Docker container: `docker run -p 8000:8000 wawtravel`

## Database setup
wait for the container to be up and running, then:
1. Create the database: `docker exec -i <container_id> mysql -u root -e "CREATE DATABASE waw_travel;"`
2. Run the SQL script: `docker exec -i  <container_id> mysql -u root waw_travel < db/waw_travel.sql`
> Note: To get the container id, run `docker ps` and use the first 3 characters of the id.

## Usage
1. Go to http://localhost/waw-travel/public/index.php?path=/inscription
2. Create an account

## Authors
- [Achraf Ait Mbarek](https://github.com/achrafaitmbarek)
- [Aurore Enoch](https://github.com/Aurore-Enoch)
- [Liticia Tadjer](https://github.com/ltadjer)

