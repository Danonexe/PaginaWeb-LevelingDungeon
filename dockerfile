FROM php:8.1-apache

# Instalar dependencias mínimas
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensión MongoDB
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos
COPY . .

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html