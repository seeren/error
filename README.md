# error
 [![Build Status](https://travis-ci.org/seeren/error.svg?branch=master)](https://travis-ci.org/seeren/error) [![Coverage Status](https://coveralls.io/repos/github/seeren/error/badge.svg?branch=master)](https://coveralls.io/github/seeren/error?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/error.svg)](https://packagist.org/packages/seeren/error/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/4a0463fb5a084be5bda68e4e36d7c7ac)](https://www.codacy.com/app/seeren/error?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/error&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/error.svg)](https://packagist.org/packages/seeren/error#) [![Packagist](https://img.shields.io/packagist/l/seeren/log.svg)](LICENSE)

**Handle and log errors**

## Features
* Log errors and fatal error
## Installation
Require this package with [composer](https://getcomposer.org/)
```
composer require seeren/error dev-master
```

## Usage

#### `Seeren\Error\ErrorLogger`
Register error handler
```php
$errorLogger->register();
```

Log with Psr\Log\LoggerInterface
```php
$errorLogger = new ErrorLogger(new Daily(__DIR__), new LogLevel);
```

## Run Tests
Run [phpunit](https://phpunit.de/) with [Xdebug](https://xdebug.org/) enable and [OPcache](http://php.net/manual/fr/book.opcache.php) disable
```
./vendor/bin/phpunit
```
## Run Coverage
Run [coveralls](https://coveralls.io/)
```
./vendor/bin/php-coveralls -v
```

## License
This project is licensed under the **MIT License** - see the [license](LICENSE) file for details.