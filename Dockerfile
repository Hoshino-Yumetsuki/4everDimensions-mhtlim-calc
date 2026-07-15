# mhtlim-calc — PHP + Apache (PDO MySQL)
FROM php:8.2-apache-bookworm

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libzip-dev \
        unzip \
        git \
    && docker-php-ext-install pdo_mysql \
    && a2enmod rewrite deflate expires headers \
    && rm -rf /var/lib/apt/lists/*

# Large cloud saves (postSave allows up to ~15MB payload)
RUN { \
      echo 'upload_max_filesize = 32M'; \
      echo 'post_max_size = 32M'; \
      echo 'memory_limit = 256M'; \
      echo 'max_execution_time = 120'; \
    } > /usr/local/etc/php/conf.d/mhtlim.ini

# .htaccess (gzip, expires)
RUN sed -ri 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

WORKDIR /var/www/html

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=40s --retries=3 \
    CMD php -r "exit(file_get_contents('http://127.0.0.1/') === false ? 1 : 0);" || exit 1