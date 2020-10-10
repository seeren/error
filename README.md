# Seeren\Error

[![Build Status](https://travis-ci.org/seeren/error.svg?branch=master)](https://travis-ci.org/seeren/error) [![Coverage Status](https://coveralls.io/repos/github/seeren/error/badge.svg?branch=master)](https://coveralls.io/github/seeren/error?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/error.svg)](https://packagist.org/packages/seeren/error/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/4a0463fb5a084be5bda68e4e36d7c7ac)](https://www.codacy.com/app/seeren/error?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/error&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/error.svg)](https://packagist.org/packages/seeren/error#) [![Packagist](https://img.shields.io/packagist/l/seeren/log.svg)](LICENSE)

Handle and log errors

___

## Installation

```bash
composer require seeren/error
```

___

### Seeren\Error\ErrorLogger

Provide a `Psr\Log\LoggerInterface` at construction

```php
use Seeren\Error\ErrorLogger;
use Seeren\Log\Logger\Daily;

$error = new ErrorLogger(new Daily);
```

Register error handler

```php
$error->register();
```

Default PHP error handler will not display messages and ever `debug`, `info`, `notice`, `warning`, `errors` will be logged

___

## License
This project is licensed under the MIT License