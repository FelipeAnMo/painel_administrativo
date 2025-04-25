FROM php:8.2-apache

# Instalar extensões e dependências necessárias
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Ativar o mod_rewrite do Apache
RUN a2enmod rewrite

# Instalar o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Definir a pasta 'public' como raiz do Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Copiar o arquivo customizado de virtual host (opcional)
COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# Copiar os arquivos do projeto
WORKDIR /var/www/html
COPY . /var/www/html

# Ajustar permissões
RUN chown -R www-data:www-data /var/www/html
