# Docker / PHP Demo


## Getting Started

```
docker build -t docker-php-example .
docker run -d -p 8080:80 --name testapp docker-php-example
```

Open a web browser to: http://localhost:8080


## How it works

We start with the Docker image `php:7.3-apache`. This container source code can be found here:
https://github.com/docker-library/php/blob/5992cb02fa5b3d76baffad60d94052a805958553/7.3/buster/apache/Dockerfile

Docker will take the code from `src/` and put it inside the container in `/var/www/html/`. 
