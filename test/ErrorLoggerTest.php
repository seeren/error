<?php

/**
 * This file contain Seeren\Error\Test\ErrorLoggerTest class
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

namespace Seeren\Error\Test;

use Seeren\Error\ErrorLogger;
use Seeren\Log\Daily;
use Seeren\Log\LogLevel;
use ReflectionClass;

/**
 * Class for test ErrorLogger
 * 
 * @category Seeren
 * @package Error
 * @subpackage Test
 */
class ErrorLoggerTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Test Handler::handle
    */
   public final function testHandle()
   {
       $logger = (new ReflectionClass(Daily::class))->newInstanceArgs([__DIR__]);
       $logLevel = (new ReflectionClass(LogLevel::class))->newInstanceArgs([]);
       $error = (new ReflectionClass(ErrorLogger::class))
                ->newInstanceArgs([$logger, $logLevel]);
       $nLogs = count($logger->getLogs());
       $error->handle(E_USER_ERROR, "message", "file", 44);
       $this->assertTrue(++$nLogs  === count($logger->getLogs()));
   }

}
