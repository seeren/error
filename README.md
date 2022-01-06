# Seeren\\Error

[![Build](https://app.travis-ci.com/seeren/error.svg?branch=master)](https://app.travis-ci.com/seeren/error)
[![Require](https://poser.pugx.org/seeren/error/require/php)](https://packagist.org/packages/seeren/error)
[![Coverage](https://coveralls.io/repos/github/seeren/error/badge.svg?branch=master)](https://coveralls.io/github/seeren/error?branch=master)
[![Download](https://img.shields.io/packagist/dt/seeren/error.svg)](https://packagist.org/packages/seeren/error/stats)
[![Codacy](https://app.codacy.com/project/badge/Grade/baea2fa9ba704a80a6b693921af25cbd)](https://www.codacy.com/gh/seeren/error/dashboard?utm_source=github.com&utm_medium=referral&utm_content=seeren/error&utm_campaign=Badge_Grade)
[![Version](https://img.shields.io/packagist/v/seeren/error.svg)](https://packagist.org/packages/seeren/error)

Handle and Log errors

* * *

## Installation

```bash
composer require seeren/error
```

* * *

### Seeren\\Error\\ErrorLogger

Error logger is registred at construction

```php
use Seeren\Error\ErrorLogger;

$errorHandler = new ErrorLogger();
```

Default logger is [Seeren\\Log\\Logger\\Daily](https://github.com/seeren/log), log folder is in `/var/log`

```bash
project/
└─ var/
   └─ log/
```

Prs-3 implementations can be used to log errors

```php
new \Seeren\Error\ErrorLogger($psr3Logger);
```

Default PHP error handler will not display messages and every `debug`, `info`, `notice`, `warning`, `errors` will be logged

* * *

## License

This project is licensed under the [MIT](./LICENSE) License
