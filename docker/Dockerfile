FROM php:7.2-apache

# Instala as extensões necessárias para o PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copia o código-fonte para o diretório padrão do Apache no contêiner
COPY ./src /var/www/html


