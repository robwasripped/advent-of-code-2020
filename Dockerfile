FROM php:8.0-cli

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./composer.* ./
RUN composer install --prefer-dist

COPY . ./
