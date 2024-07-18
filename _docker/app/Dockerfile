FROM php:8.3-fpm

ARG user
ARG uid

RUN apt-get update && apt-get install -y \
      apt-utils \
      curl \
      libmemcached-dev \
      libz-dev \
      libpq-dev \
      libjpeg-dev \
      libpng-dev \
      libfreetype6-dev \
      libssl-dev \
      libwebp-dev \
      libxpm-dev \
      libmcrypt-dev \
      libonig-dev \
      libzip-dev \
      git \
      libjpeg62-turbo-dev \
      libxml2-dev \
      openssh-server \
      zip \
      unzip \
      libicu-dev

RUN docker-php-ext-configure intl; \
      docker-php-ext-install intl; \
      docker-php-ext-configure zip \
            --with-libzip; \
      docker-php-ext-install zip; \
      docker-php-ext-install pdo_mysql; \
      docker-php-ext-configure gd \
            --prefix=/usr \
            --with-jpeg \
            --with-webp \
            --with-xpm \
            --with-freetype; \
      docker-php-ext-install gd;

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/usr/local/bin

RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY ./_docker/app/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm -f /var/log/lastlog /var/log/faillog

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && chown -R $user:$user /home/$user

WORKDIR /var/www

USER $user
