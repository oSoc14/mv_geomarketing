Geomarketing
===============

Geomarketing application for the citylife platform.

To run this project you should have installed a php server with mcrypt extension and composer.
> [Install composer](https://getcomposer.org/doc/00-intro.md)

To run this laravel project.

Begin by installing the required packages through Composer.

    composer update
    
The php artisan commands should be ran from the terminal in the project directory.

After that check if the routes are defined with :

    php artisan routes
    
There should be two resources defined.

Then run:

    php artisan migrate
  
  
This will generate the database schema and seed the tables with dummy data.
This is all to get started.
