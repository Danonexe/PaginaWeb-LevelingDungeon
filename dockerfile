FROM php:8.1-apache

# Instalar dependencias necesarias para SSL
RUN apt-get update && apt-get install -y \
    libssl-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libsasl2-dev \
    unzip \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensión MongoDB con soporte SSL
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Verificar que OpenSSL está disponible
RUN php -m | grep openssl

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos
COPY . .

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html

# Exponer puerto
EXPOSE 80