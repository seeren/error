## Seeren\Error\

Handle and log errors and fatal error.

### Code Example

Create logger and use log of different level. LogLevelInterface provide method for determine level off an error type.

#### Seeren\Error\ErrorLogger

```php
 
use Seeren\Error\ErrorLogger;
use Seeren\Log\{Daily, LogLevel};

$handler = new ErrorLogger(new Daily, new LogLevel);
$handler->register();

// Daily will write the log for the error triggered 
trigger_error("message", E_USER_ERROR);

$handler->unregister();
```

### Running the tests

Running tests with phpunit in the test folder.

```
$ phpunit seeren/src/error/test/ErrorLoggerTest.php
```

### License

* [MIT](https://github.com/Seeren/Seeren/blob/master/LICENSE)
