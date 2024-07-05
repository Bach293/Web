# Sử dụng PHP 8.0-fpm image chính thức từ Docker Hub
FROM php:8.0-fpm

# Cài đặt các extension PHP cần thiết
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql zip

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Thiết lập thư mục làm việc là /var/www
WORKDIR /var/www

# Copy mã nguồn Laravel vào thư mục /var/www
COPY . .

# Cài đặt các package PHP thông qua Composer
RUN composer install

# Thiết lập quyền cho thư mục storage
RUN chmod -R 777 storage

# Mở cổng 9000 để PHP-FPM lắng nghe
EXPOSE 9000

# Khởi động PHP-FPM
CMD ["php-fpm"]
