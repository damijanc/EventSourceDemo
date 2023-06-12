FROM php:8.1-fpm

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libpq-dev \
        git \
        unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
