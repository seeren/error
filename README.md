# error
 [![Build Status](https://travis-ci.org/seeren/error.svg?branch=master)](https://travis-ci.org/seeren/error) [![Coverage Status](https://coveralls.io/repos/github/seeren/error/badge.svg?branch=master)](https://coveralls.io/github/seeren/error?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/error.svg)](https://packagist.org/packages/seeren/error/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/4a0463fb5a084be5bda68e4e36d7c7ac)](https://www.codacy.com/app/seeren/error?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/error&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/error.svg)](https://packagist.org/packages/seeren/error#) [![Packagist](https://img.shields.io/packagist/l/seeren/log.svg)](LICENSE)

**Handle and log errors**

## Features
* Log errors
## Installation
Require this package with [composer](https://getcomposer.org/)
```
composer require seeren/error dev-master
```

## Handler Usage

#### `Seeren\Error\ErrorLogger`
Errors and fatal error can be handled and logged. After registration, default php error handler is no more fired and errors are not displayed.
```php
$handler = (new ErrorLogger(new Daily, new LogLevel))->register();
trigger_error("message", E_USER_ERROR);
$handler->unregister();
```

## Run Unit tests
Install dependencies
```
composer update
```
Run [phpunit](https://phpunit.de/) with [Xdebug](https://xdebug.org/) enabled and [OPcache](http://php.net/manual/fr/book.opcache.php) disabled for coverage
```
./vendor/bin/phpunit
```
## Run Coverage
Install dependencies
```
composer update
```
Run [coveralls](https://coveralls.io/) for check coverage
```
./vendor/bin/coveralls -v
```

##  Contributors
* **Cyril Ichti** - *Initial work* - [seeren](https://github.com/seeren)

## License
This project is licensed under the **MIT License** - see the [license](LICENSE) file for details.