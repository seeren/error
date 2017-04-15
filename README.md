[![Codacy Badge](https://api.codacy.com/project/badge/Grade/6b16197c690f49359d0b268a2eb93e47)](https://www.codacy.com/app/seeren/error?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/error&amp;utm_campaign=Badge_Grade) [![Build Status](https://travis-ci.org/seeren/error.svg?branch=master)](https://travis-ci.org/seeren/error) [![GitHub license](https://img.shields.io/badge/license-MIT-orange.svg)](https://raw.githubusercontent.com/seeren/error/master/LICENSE) [![Packagist](https://img.shields.io/packagist/v/seeren/error.svg)](https://packagist.org/packages/seeren/error) [![Packagist](https://img.shields.io/packagist/dt/seeren/error.svg)](https://packagist.org/packages/seeren/error/stats)

# Seeren\Error\
Handle and log errors.
Create logger and use log level. LogLevelInterface provide method for determine level of errors.

## Seeren\Error\ErrorLogger
```php
$errorLogger = new ErrorLogger(new Daily, new LogLevel);
$errorLogger->register();
// Log is written for triggered error
trigger_error("message", E_USER_ERROR);
$errorLogger->unregister();
```

## Installation
Require this package with composer
```
composer require seeren/error dev-master
```

## Run the tests
Run with phpunit after install dependencies
```
composer update
phpunit
```

## Authors
* **Cyril Ichti** - [www.seeren.fr](http://www.seeren.fr)