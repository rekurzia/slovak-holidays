FROM php:7.2
ARG DEBIAN_FRONTEND=noninteractive
ENV COMPOSER_ALLOW_SUPERUSER 1

COPY composer-install.sh /tmp/composer-install.sh

RUN apt-get update -q \
  && apt-get install unzip git wget -y --no-install-recommends \
  && /tmp/composer-install.sh \
  && rm /tmp/composer-install.sh \
  && mv composer.phar /usr/local/bin/composer

COPY . /code

WORKDIR /code/

RUN composer install --prefer-dist --no-interaction
