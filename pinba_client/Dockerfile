FROM ubuntu:18.04

ARG DEBIAN_FRONTEND=noninteractive

RUN apt update -y && apt install -y wget curl git php-cli php-fpm nginx php-pinba

COPY ./pinba.ini /etc/php/7.2/mods-available/pinba.ini
COPY ./www.conf /etc/php/7.2/fpm/pool.d/www.conf
COPY ./app.conf /etc/nginx/conf.d/app.conf
COPY ./app.conf /etc/nginx/sites-available/app.conf
RUN ln -s /etc/nginx/sites-available/app.conf /etc/nginx/sites-enabled/app.conf && rm /etc/nginx/sites-enabled/default

RUN echo "\ndaemon off;" >> /etc/nginx/nginx.conf
RUN sed -i -e "s/;\?daemonize\s*=\s*yes/daemonize = no/g" /etc/php/7.2/fpm/php-fpm.conf

CMD service php7.2-fpm start && nginx

EXPOSE 9000