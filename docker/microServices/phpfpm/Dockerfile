FROM cyberduck/php-fpm-laravel:8.1

RUN apt-get update \
    && apt-get install -y git zlib1g-dev zip unzip \
    && php -r "readfile('http://getcomposer.org/installer');" | \
      php -- --install-dir=/usr/bin/ --filename=composer \
    && docker-php-ext-install pdo_mysql zip \
    && apt-get -y autoremove && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /var/www/html/*
