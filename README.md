# Docker / PHP Demo

## Tech Stack

- Docker
- docker-compose
- PHP
- MariaDB


## Getting Started

Get the environment running:
```
docker-compose up --build
```

Test the connection:
```
curl http://localhost:5000
```
(or open a web browser to: http://localhost:5000):

Access MySQL:
```
docker exec -it db mysql
```

## How it works

We start with the Docker image `php:7.3-apache`. This container source code can be found here:
https://github.com/docker-library/php/blob/5992cb02fa5b3d76baffad60d94052a805958553/7.3/buster/apache/Dockerfile

`docker-compose` links up the `src/` directory to `/var/www/html/` inside the container. So you just need to save your code and can refresh the browser to pick up the changes.
