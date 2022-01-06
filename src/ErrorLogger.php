<?php

namespace Seeren\Error;

use Psr\Log\LoggerInterface;
use Seeren\Log\LevelResolver;
use Seeren\Log\LevelResolverInterface;
use Seeren\Log\Logger\Daily;

class ErrorLogger extends AbstractErrorHandler
{

    private LoggerInterface $logger;

    private LevelResolverInterface $level;

    public function __construct( LoggerInterface $logger = null)
    {
        $this->logger = $logger ?? new Daily();
        $this->level = new LevelResolver();
        $this->register();
    }

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
        $this->logger->{$this->level->getLevel($type)}(
            $message
            . ' in ' . self::FILE . ' "{' . self::FILE . '}"'
            . ' at ' . self::LINE . ' "{' . self::LINE . '}"',
            $context
        );
    }

}
