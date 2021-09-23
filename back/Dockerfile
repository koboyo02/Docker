FROM php:7.4-cli
RUN apt-get update \
&& apt-get -y upgrade
RUN docker-php-ext-install mysqli pdo pdo_mysql
COPY ./server.php ./
CMD php -S 0.0.0.0:7777
EXPOSE 7777