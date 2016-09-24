<?php

/**
 * This file contain Seeren\Error\ErrorLogger class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */

namespace Seeren\Error;

use Seeren\Log\Logger;
use Seeren\Log\LogLevelInterface;

/**
 * Class for log error
 * 
 * @category Seeren
 * @package Error
 * @final
 */
final class ErrorLogger extends Handler implements HandlerInterface
{

   protected
       /**
        * @var Logger logger
        */
       $logger,
       /**
        * @var LogLevelInterface log level
        */
       $logLevel;

    /**
     * Construct ErrorLogger
     * 
     * @param Logger $logger logger
     * @param LogLevelInterface $logLevel log level
     * @return null
     */
    public final  function __construct(
        Logger $logger,
        LogLevelInterface $logLevel)
    {
        parent::__construct();
        $this->logger = $logger;
        $this->logLevel = $logLevel;
    }

    /**
     * Template method Handle
     *
     * @param int $type error code
     * @param string $message error message
     * @param string $file error file
     * @param int $line error line
     * @param array $context error context
     * @return null
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
