FROM php:8.1-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    git \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar extensión MongoDB versión compatible (1.19.3)
RUN pecl install mongodb-1.19.3 && docker-php-ext-enable mongodb

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Configurar Composer para contenedores
ENV COMPOSER_ALLOW_SUPERUSER=1

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar composer.json
COPY composer.json ./

# Instalar dependencias
RUN composer install \
    --no-dev \
    --no-scripts \
    --no-interaction \
    --optimize-autoloader

# Copiar el resto de archivos
COPY . .

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html