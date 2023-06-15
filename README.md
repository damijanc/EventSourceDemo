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

This will open a connection to the server and start listening to event coming from it. 


Open http://localhost:8080/pooling

This is a similar page, but it will close and reopen connection after the message has been received (aka pooling). 
Due to our simple server implementation this means that message with id 0 will always be returned.


# Standalone client demo:

```
docker-compose run php php cliClient.php
```

# Considerations
if you are running a PHP_FPM website you are limited with number of processes you can run on a server. 
With long running requests that event stream is you need to make sure that you have enough capacity to serve
all the consumers. With pooling approach you can mitigate that quite efficiently. Another thing to consider
is session locking, if you are using file session. This means that event source connection will basically 
block all other request as they will need to wait for session lock to be released.  
