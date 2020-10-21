FROM php:7.4-apache

ENV PROYECT_ROOT=/var/www/src/

WORKDIR ${PROYECT_ROOT}

# mbstring json mysqlnd xml
RUN apt-get update && \
    apt-get install -y zlib1g-dev libicu-dev g++ && \
    a2enmod rewrite && \
    docker-php-ext-configure intl && \
    docker-php-ext-install -j$(nproc) intl && \
    sed -ri -e 's!/var/www/html!${PROYECT_ROOT}public!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${PROYECT_ROOT}public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf && \
    apt-get purge

COPY --chown=www-data:www-data src/ ${PROYECT_ROOT}

#TODO: add composer  
RUN chown -R www-data:www-data ${PROYECT_ROOT}