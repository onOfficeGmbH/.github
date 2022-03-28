FROM php:8.1-cli

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN mkdir /application
COPY . /application/
RUN cd /application && composer install -o --no-dev

ENTRYPOINT [ "php", "/application/entrypoint.php" ]
