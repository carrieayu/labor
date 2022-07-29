FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .
RUN composer install

# CMD php artisan serve --host=0.0.0.0 --port=8000
# EXPOSE 8000

########################################################################
### Composer

# FROM composer:latest AS composer

# COPY composer.json /app
# COPY composer.lock /app

# RUN composer install        \
#     --ignore-platform-reqs  \
#     --no-ansi               \
#     --no-autoloader         \
#     --no-interaction        \
#     --no-scripts

# COPY . /app/
# RUN composer dump-autoload --optimize --classmap-authoritative

# ### Composer
# ########################################################################
# ### NodeJS

# FROM node:14.18.2-alpine3.14 AS node

# WORKDIR /app

# COPY package.json           /app
# COPY webpack.mix.js         /app
# COPY /resources             /app/resources

# RUN npm install && npm run dev

# ### NodeJS
# ########################################################################
# ### PHP

# FROM php:7.4-fpm-alpine

# RUN apk update && apk add --no-cache \
#     libpng-dev                       \
#     freetype-dev                     \
#     oniguruma-dev                    \
#     libxml2-dev

# RUN rm -rf /var/lib/apt/lists/* && rm -rf /var/cache/apk/*
# RUN docker-php-ext-configure gd --enable-gd --with-freetype
# RUN docker-php-ext-install pdo_mysql sockets mbstring exif pcntl bcmath gd

# COPY . /var/www
# COPY --from=composer /app/vendor                /var/www/html/vendor
# COPY --from=node     /app/public                /var/www/html/public/
# COPY --from=node     /app/mix-manifest.json     /var/www/html/mix-manifest.json


# RUN addgroup -g 1000 -S www && \
#     adduser -u 1000 -S www -G www-data

# COPY --chown=www:www-data . /var/www

# WORKDIR /var/www

# CMD php artisan serve --host=0.0.0.0 --port=8000

# EXPOSE 8000

### PHP
########################################################################