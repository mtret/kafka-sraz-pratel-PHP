FROM php:7.3-alpine

RUN curl -o /usr/local/bin/composer https://getcomposer.org/composer.phar \
    && chmod +x /usr/local/bin/composer

COPY . /symfony

WORKDIR /symfony

RUN apk -U add ca-certificates
RUN apk update && apk upgrade && apk add git bash build-base sudo autoconf libsodium gcc g++ openssh

RUN git clone https://github.com/edenhill/librdkafka.git && cd librdkafka && ./configure --prefix /usr && make && make install

RUN pecl channel-update pecl.php.net \
    && pecl install rdkafka-stable \
    && docker-php-ext-enable rdkafka

RUN docker-php-ext-install pcntl \
    && docker-php-ext-enable pcntl

