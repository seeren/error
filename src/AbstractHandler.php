<?php

namespace Seeren\Error;

/**
 * Class to Handle errors
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Error
 */
abstract class AbstractHandler implements HandlerInterface
{

    /**
     * @param int $type
     * @param string $message
     * @param string $file
     * @param int $line
     * @param array $context
     * @return void
     */
    abstract public function handle(
        int $type,
        string $message,
        string $file,
        int $line,
        array $context = []
    ): void;

    /**
     * {@inheritDoc}
     * @see HandlerInterface::register()
     */
    public final function register(): self
    {
        set_error_handler([$this, 'handle']);
        register_shutdown_function([$this, 'shutdown']);
        return $this;
    }

    /**
     * {@inheritDoc}
     * @see HandlerInterface::unregister()
     */
    public final function unregister(): self
    {
        restore_error_handler();
        register_shutdown_function(function () {
        });
        return $this;
    }

    /**
     * {@inheritDoc}
     * @see HandlerInterface::shutdown()
     */
    public final function shutdown(array $error = null): void
    {
        if ($error || ($error = error_get_last())) {
            $this->handle(
                $error[self::TYPE],
                $error[self::MESSAGE],
                $error[self::FILE],
                $error[self::LINE]
            );
        }
    }

}
