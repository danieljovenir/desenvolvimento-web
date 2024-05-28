# Usando a imagem base do PHP com Apache
FROM php:8.2-apache

# Instalando extensões PHP necessárias para o PostgreSQL
RUN apt-get update \
&& apt-get install -y libpq-dev \
&& docker-php-ext-install pdo pdo_pgsql