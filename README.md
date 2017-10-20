Auth0 module for Zend Framework
===============================

Module to integrate Auth0 with Zend Framework projects.

[![Build Status](https://img.shields.io/travis/RiskioFr/auth0-module.svg?style=flat-square)](http://travis-ci.org/RiskioFr/auth0-module)
[![Latest Stable Version](http://img.shields.io/packagist/v/riskio/auth0-module.svg?style=flat-square)](https://packagist.org/packages/riskio/auth0-module)
[![Build Status](https://img.shields.io/travis/RiskioFr/auth0-module.svg?style=flat-square)](http://travis-ci.org/RiskioFr/auth0-module)
[![Total Downloads](http://img.shields.io/packagist/dt/riskio/auth0-module.svg?style=flat-square)](https://packagist.org/packages/riskio/auth0-module)

## Requirements

* PHP 7.0+
* [auth0/auth0-php ^5.0.5](https://github.com/auth0/auth0-php)
* [container-interop/container-interop ^1.0](https://github.com/container-interop/container-interop)
* [riskio/zf-authentication-auth0 ^1.0](https://github.com/riskio/zf-authentication-auth0)
* [zendframework/zend-stdlib ^3.1](https://github.com/zendframework/zend-stdlib)

## Installation

Auth0 module only officially supports installation through Composer. For Composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

You can install the module from command line:

```sh
$ composer require riskio/auth0-module
```

Enable the module by adding `Auth0Module` key to your `application.config.php` file.

## Default configuration

```php
<?php
return [
    'auth0' => [
        'account' => null,
        'token' => null,
        'client_id' => null,
        'client_secret' => null,
        'redirect_uri' => null,
    ],
];
```

## Testing

``` bash
$ vendor/bin/phpunit
```

## Credits

- [Nicolas Eeckeloo](https://github.com/neeckeloo)
- [All Contributors](https://github.com/RiskioFr/idempotency-module/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/RiskioFr/auth0-module/blob/master/LICENSE) for more information.
