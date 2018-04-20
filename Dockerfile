
FROM php:7.1

MAINTAINER Olivier Revollat <revollat@gmail.com>

ENV DEBIAN_FRONTEND noninteractive
RUN echo "Europe/Paris" > /etc/timezone; dpkg-reconfigure tzdata

RUN apt-get update -y
RUN apt-get install --no-install-recommends -y libpng-dev zlib1g-dev git ca-certificates

RUN docker-php-ext-install gd
RUN docker-php-ext-install opcache
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install zip
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install pcntl


RUN echo 'opcache.memory_consumption=256' >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
RUN echo 'opcache.max_accelerated_files=20000' >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

#RUN pecl install xdebug-2.6.0 && docker-php-ext-enable xdebug
#RUN echo 'xdebug.remote_enable=On' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#RUN echo 'xdebug.remote_connect_back=On' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#RUN echo 'xdebug.remote_port=9000 ' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#RUN echo 'xdebug.remote_host=localhost' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#RUN echo 'xdebug.idekey=idekey' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

#RUN version=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") \
#    && curl -A "Docker" -o /tmp/blackfire-probe.tar.gz -D - -L -s https://blackfire.io/api/v1/releases/probe/php/linux/amd64/$version \
#    && tar zxpf /tmp/blackfire-probe.tar.gz -C /tmp \
#    && mv /tmp/blackfire-*.so $(php -r "echo ini_get('extension_dir');")/blackfire.so \
#    && printf "extension=blackfire.so\nblackfire.agent_socket=tcp://blackfire:8707\n" >  /usr/local/etc/php/conf.d/blackfire.ini

WORKDIR /var/www

EXPOSE 8000