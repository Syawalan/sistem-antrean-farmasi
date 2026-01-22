FROM dunglas/frankenphp:php8.2-bookworm

# Install PHP extensions
RUN install-php-extensions pdo_mysql gd mbstring xml curl zip bcmath

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Set working directory
WORKDIR /app

# Copy composer files first
COPY composer.json composer.lock ./

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy package files
COPY package*.json ./

# Install Node dependencies and build
RUN npm ci && npm run build && rm -rf node_modules

# Copy the rest of the application
COPY . .

# Set permissions
RUN mkdir -p storage/framework/{sessions,views,cache,testing} storage/logs bootstrap/cache && \
    chmod -R 777 storage bootstrap/cache

# Run composer scripts after copying all files
RUN composer dump-autoload --optimize

# Create Caddyfile for FrankenPHP
RUN echo ':${PORT:-8080} {\n\
    root * /app/public\n\
    php_server\n\
}' > /etc/caddy/Caddyfile

# Expose port
EXPOSE 8080

# Start command
CMD php artisan migrate --force && frankenphp run --config /etc/caddy/Caddyfile
