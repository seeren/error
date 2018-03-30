<?php

/**
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @author (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/error
 * @version 1.0.1
 */

namespace Seeren\Error;

use Psr\Log\LoggerInterface;
use Seeren\Log\LogLevelInterface;

/**
 * Class for log error
 * 
 * @category Seeren
 * @package Error
 */
class ErrorLogger extends AbstractHandler implements HandlerInterface
{

   protected
       /**
        * @var LoggerInterface
        */
       $logger,
       /**
        * @var LogLevelInterface
        */
       $logLevel;

    /**
     * @param LoggerInterface $logger logger
     * @param LogLevelInterface $logLevel log level
     */
    public  function __construct(
        LoggerInterface $logger,
        LogLevelInterface $logLevel)
    {
        parent::__construct();
        $this->logger = $logger;
        $this->logLevel = $logLevel;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Error\HandlerInterface::handle()
     */
    public final function handle(
        int $type,
        string $message,
        string $file,
        int $line,
        array $context = [])
    {
        $context[self::FILE] = $file;
        $context[self::LINE] = (string)$line;
        $this->logger->{$this->logLevel->level($type)}(
            $message
          . " " . self::FILE . " {". self::FILE . "}"
          . " " . self::LINE . " {". self::LINE . "}",
            $context);
    }

}
