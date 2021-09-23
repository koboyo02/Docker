FROM php:8.0-apache
RUN apt-get update
CMD php -S 0.0.0.0:8080
COPY ./index.php /var/www/html/
EXPOSE 8080
