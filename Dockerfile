FROM php:fpm

WORKDIR /usr/src/app

RUN apt-get update && apt-get install -y \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && docker-php-source delete

RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    && docker-php-ext-install curl

# RUN docker-php-ext-install fileinfo
# RUN docker-php-ext-install mbstring
# RUN docker-php-ext-install openssl
# RUN docker-php-ext-install pdo_mysql
# RUN docker-php-ext-install pdo_sqlite

COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
