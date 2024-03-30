# Use an official PHP runtime as a parent image
FROM php:8.2.12-apache   

# Set the working directory in the container to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install any needed PHP extensions. For example, here's how you might install mysqli:
RUN docker-php-ext-install mysqli

# Make port 80 available to the world outside this container
EXPOSE 80

# Run apache2-foreground when the container launches
CMD ["apache2-foreground"]