# Blog

Simple blog optimized for SEO.

## Installation

You can install the package via composer:

``` bash
composer require atsys/blog
```

Add the service provider to `config\app.php`:

``` php
...
Atsys\Blog\BlogServiceProvider::class
...
```

Run the migrations and publish the package files:

``` bash
php artisan migrate
php artisan vendor:publish
```

This will be copy the configuration file `config/blog.php` where you can add or remove languages and change the pagination number. Also the views will be available in `resources/views/vendor/blog` if you want to customize them.

## Usage

To create categories and posts got to `admin/post_categories` or `admin/posts`. Be logged is required for that! You'll see them in `blog` route.

## Contributing

Contributions are welcome!

## Security

If you discover any security related issues, please email soporte@atsys.es instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
