# waw.travel
Réaliser une plateforme permettant aux utilisateurs inscrits de créer un carnet de voyage (type road trip avec plusieurs étapes). Pour pouvoir être consultée facilement par la famille des voyageurs, une page web publique détaillera l'ensemble du road trip.

## Installation

1. Build the Docker image: `docker build -t wawtravel .`
2. Run the Docker container: `docker run -p 8000:8000 wawtravel`
3. Create the database: `docker exec -i <container_id> mysql -u root -p -e "CREATE DATABASE waw_travel;"`
4. Run the SQL script: `docker exec -i <container_id> mysql -u root -p waw_travel < db/waw_travel.sql`
> Note: To get the container id, run `docker ps` and use the first 3 characters of the id.
