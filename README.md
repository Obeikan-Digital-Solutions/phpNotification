# This is php   notifications package that will use in all php system

[![Latest Version on Packagist](https://img.shields.io/packagist/v/obeikan-digital-solutions/phpnotification.svg?style=flat-square)](https://packagist.org/packages/obeikan-digital-solutions/phpnotification)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/obeikan-digital-solutions/phpnotification/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/obeikan-digital-solutions/phpnotification/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/obeikan-digital-solutions/phpnotification/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/obeikan-digital-solutions/phpnotification/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/obeikan-digital-solutions/phpnotification.svg?style=flat-square)](https://packagist.org/packages/obeikan-digital-solutions/phpnotification)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.


## Installation

You can install the package via composer:

```bash
composer require obeikan-digital-solutions/phpnotification
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="phpnotification-migrations"
php artisan migrate
```

to use notification in view you can use :

```php
 @include('phpnotification::notifications')

```

You can publish the view file with:

```bash
php artisan vendor:publish --tag="phpnotification-views"
```
then use
```php
 @include('vendor.phpnotification.notifications')

```
You can publish the config file with:

```bash
php artisan vendor:publish --tag="phpnotification-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="phpnotification-views"
```

## Usage

```php
// in includes/header.blade.php we add this to show notifications
 @include('phpnotification::notifications')
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Osama Al-mamari](https://github.com/Obeikan-Digital-Solutions)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
