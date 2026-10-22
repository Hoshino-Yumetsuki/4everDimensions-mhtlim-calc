FROM php:8.3-fpm-alpine

RUN apk add --no-cache apache2 apache2-proxy git supervisor ca-certificates \
    && docker-php-ext-install pdo_mysql \
    && mkdir -p /run/apache2 \
    && sed -i \
        -e 's/^User .*/User www-data/' \
        -e 's/^Group .*/Group www-data/' \
        -e 's/^#\(LoadModule \(rewrite\|deflate\|expires\|headers\)_module .*\)/\1/' \
        /etc/apache2/httpd.conf

RUN { \
      echo 'file_uploads = Off'; \
      echo 'upload_max_filesize = 32M'; \
      echo 'post_max_size = 32M'; \
      echo 'memory_limit = 256M'; \
      echo 'max_execution_time = 120'; \
    } > /usr/local/etc/php/conf.d/mhtlim.ini

COPY docker/apache.conf /etc/apache2/conf.d/mhtlim.conf
COPY docker/supervisord.conf /etc/supervisord.conf

WORKDIR /var/www/html

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=40s --retries=3 \
    CMD php -r "exit(file_get_contents('http://127.0.0.1/') === false ? 1 : 0);" || exit 1

CMD ["supervisord", "-c", "/etc/supervisord.conf"]