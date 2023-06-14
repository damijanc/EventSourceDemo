# Introduction
This project is a simple demo for [Server-sent events](https://developer.mozilla.org/en-US/docs/Web/API/Server-sent_events)

If features a thin Symfony project for server side and website. It also has a simple cli client written in vanilla PHP
as alternative implementation.

# Setup

```
docker-compose up -d
docker-compose run php composer install
```

# Website demo:

Open http://localhost:8080

# Standalone client demo:

```
docker-compose run php php cliClient.php
```
