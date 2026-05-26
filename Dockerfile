FROM php:8.2-cli

# Install packages
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    zip \
    libzip-dev \
    sqlite3 \
    libsqlite3-dev

# PHP extensions
RUN docker-php-ext-install pdo pdo_sqlite zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# App directory
WORKDIR /app

# Copy composer files first
COPY composer.json composer.lock ./

# Install dependencies
RUN composer install --no-dev --prefer-dist --no-interaction

# Copy all project files
COPY . .

# SQLite database
RUN mkdir -p database && touch database/database.sqlite

# Laravel setup
RUN cp .env.example .env || true
RUN php artisan key:generate || true

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000
