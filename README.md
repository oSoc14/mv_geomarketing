
marketing
===============

Geomarketing application for the citylife platform.

The application consists of a laraval backend processing REST requests from an AngularJS frontend.

To run this project you should have installed a php server with mcrypt extension and composer.
> [Install composer](https://getcomposer.org/doc/00-intro.md)

To run this laravel project.

Begin by installing the required packages through Composer.

    composer update
    
The php artisan commands should be ran from the terminal in the project directory.

After that check if the routes are defined with :

    php artisan routes
    
There should be two resources defined.

Configure your database credentials in `/app/config/database.php`

Then run:

    php artisan migrate
    
This will generate the database schema and seed the tables with dummy data.

Start the application

    php artisan serve

Open your browser on [localhost:8000](http://localhost:8000)


Credit
===========
Created for #oSoc14 Hackaton by team Mobile Vikings.

Copyright 2014 OKFN Belgium

