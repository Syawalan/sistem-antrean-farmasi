FROM dunglas/frankenphp:php8.2-bookworm

# Install PHP extensions
RUN install-php-extensions pdo_mysql gd mbstring xml curl zip bcmath

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Set working directory
WORKDIR /app

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy all application files first (needed for Vite build)
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Install Node dependencies and build assets
RUN npm ci && npm run build && rm -rf node_modules

# Set permissions
RUN mkdir -p storage/framework/{sessions,views,cache,testing} storage/logs bootstrap/cache && \
    chmod -R 777 storage bootstrap/cache

# Run composer scripts
RUN composer dump-autoload --optimize

# Expose port
EXPOSE 8080

# Use php artisan serve instead of FrankenPHP for simplicity
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080
