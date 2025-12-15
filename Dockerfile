# Sử dụng PHP kèm Apache
FROM php:8.1-apache

# Cài đặt extension để PHP kết nối được với MySQL
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy toàn bộ code vào thư mục web của container
COPY . /var/www/html/

# Cấp quyền cho thư mục (để tránh lỗi permission)
RUN chown -R www-data:www-data /var/www/html