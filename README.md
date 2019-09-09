# Vue Base Scaffolding Package

*built by Fashionphile*


## Purpose
This is to build a very simple boilerplate structure for vue instances if you are going to need several in your site. 

## Install
Run `composer install fashionphile/vue-base`;

## Set up
create a `vue-base.php` file in you configs folder in your base laravel install. In the file you will add an array with the path to where you want the vue base to install your instances.

```php
<?php

return [
    'path' => 'path/to/folder',
];
```

After add the following path to your `app/Console/Kernel.php` in your commands array

```php
    protected $commands = [
        \VueBase\VueBaseCommand::class
    ];
```

## Running the command
To run the command enter this in your command line:
`php artisan vue-base:create`

After it will create your directory in wherever you designated in your config. You will need to add the app.js file from that directory to your mix-manifest (or whatever compiler you are using) to use the component.

Contact me:

*Author Dano Gillette* 

https://twitter.com/danodev

http://danogillette.com
