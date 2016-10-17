## Seeren\Error\

Handle and log errors.

#### Code Example

Create logger and use log level. LogLevelInterface provide method for determine level of erros.

### Seeren\Error\ErrorLogger

```php
$errorLogger = new ErrorLogger(new Daily, new LogLevel);
$errorLogger->register();

// Daily will write log for triggered error
trigger_error("message", E_USER_ERROR);

$errorLogger->unregister();
```

#### Running the tests

Running tests with phpunit in the test folder.

```
$ phpunit test/ErrorLoggerTest.php
```

