<?php

namespace Seeren\Error;

abstract class AbstractErrorHandler implements ErrorHandlerInterface
{

    abstract public function handle(
        int $type,
        string $message,
        string $file,
        int $line,
        array $context = []
    ): void;

    public final function register(): self
    {
        set_error_handler([$this, 'handle']);
        register_shutdown_function([$this, 'shutdown']);
        return $this;
    }

    public final function unregister(): self
    {
        restore_error_handler();
        register_shutdown_function(fn() => null);
        return $this;
    }

    public function shutdown(array $error = null): void
    {
        if ($error || ($error = error_get_last())) {
            $this->handle($error[self::TYPE], $error[self::MESSAGE], $error[self::FILE], $error[self::LINE]);
        }
    }

}
