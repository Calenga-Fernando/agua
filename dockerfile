# Usa uma imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala extensões necessárias para Postgres
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

RUN a2enmod rewrite

# Copia o código para dentro do container
COPY . /var/www/html/

# Define o diretório de trabalho
WORKDIR /var/www/html/

# Expõe a porta padrão do Apache
EXPOSE 80
