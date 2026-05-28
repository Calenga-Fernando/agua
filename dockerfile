FROM php:8.2-apache

# Instalar extensão PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copiar os ficheiros para o servidor Apache
COPY . /var/www/html/

# Permissões
RUN chown -R www-data:www-data /var/www/html

# Expor a porta que o Railway usa
EXPOSE 80