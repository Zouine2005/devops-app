# 🐘 المرحلة 1: نستخدم PHP image Build image PHP
FROM php:8.2-fpm

# 🧰 المرحلة 2: تثبيت المتطلبات ديال Laravel
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    vim \
    libzip-dev \
    libmcrypt-dev \
    mariadb-client

# 📦 تثبيت PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# 🌍 تحديد مجلد العمل
WORKDIR /var/www

# 📥 نسخ الملفات للمجلد داخل الحاوية
COPY . .

# 💿 تثبيت composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# 🛠️ تثبيت dependances ديال Laravel
RUN composer install

# ⚙️ نسخ ملف env وتوليد المفتاح
RUN cp .env.example .env && php artisan key:generate
