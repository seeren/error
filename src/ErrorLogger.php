<?php

namespace Seeren\Error;

use Psr\Log\LoggerInterface;
use Seeren\Log\Level;
use Seeren\Log\LevelInterface;
use Seeren\Log\Logger\Daily;

/**
 * Class to log errors
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Error
 */
class ErrorLogger extends AbstractHandler
{

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var LevelInterface
     */
    private LevelInterface $level;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->level = new Level();
    }

    /**
     * {@inheritDoc}
     * @see HandlerInterface::handle()
     */
    public final function handle(
        int $type,
        string $message,
        string $file,
        int $line,
        array $context = []
    ): void
    {
        $context[self::FILE] = $file;
        $context[self::LINE] = (string)$line;
        $this->logger->{$this->level->level($type)}(
            $message
            . ' in ' . self::FILE . ' {' . self::FILE . '}'
            . ' at ' . self::LINE . ' {' . self::LINE . '}',
            $context
        );
    }

}
