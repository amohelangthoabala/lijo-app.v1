# Use an official PHP 8.2.4 runtime as a parent image
FROM php:8.2.4-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mbstring zip exif pcntl bcmath opcache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www

# Run Composer install
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Create .env.testing from .env.example
RUN cp .env.example .env.testing

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
