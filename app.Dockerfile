FROM php:8.1-cli

# PHP deps
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip

# Installing Microsoft deps
RUN apt-get update
RUN apt-get install curl gnupg -y

RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/ubuntu/20.04/prod.list | tee /etc/apt/sources.list.d/msprod.list

RUN apt-get update
RUN ACCEPT_EULA=y apt-get install mssql-tools unixodbc-dev -y

# DB deps
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install sqlsrv-5.10.0 pdo_sqlsrv-5.10.0
RUN docker-php-ext-enable sqlsrv pdo_sqlsrv

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY . /var/www
