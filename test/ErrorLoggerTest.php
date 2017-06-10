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
 * @version 2.0.1
 */

namespace Seeren\Error\Test;

use Psr\Log\LoggerInterface;
use Seeren\Error\ErrorLogger;
use Seeren\Error\HandlerInterface;
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
class ErrorLoggerTest extends AbstractHandlerTest
{

    private
        /**
         * @var LoggerInterface logger
         */
        $logger;

    /**
     * Get logger
     *
     * @return HandlerInterface pool
     */
    private function getLogger(): LoggerInterface
    {
       if (!$this->logger) {
            $this->logger = (new ReflectionClass(Daily::class))
            ->newInstanceArgs([
                __DIR__ . DIRECTORY_SEPARATOR . "log"
            ]);
       }
       return $this->logger;
    }

    /**
     * Get handler
     *
     * @return HandlerInterface pool
     */
    protected final function getHandler(): HandlerInterface
    {
        return (new ReflectionClass(ErrorLogger::class))->newInstanceArgs([
            $this->getLogger(),
            (new ReflectionClass(LogLevel::class))->newInstanceArgs([]),
        ]);
    }

    /**
     * Get errors
     *
     * @return HandlerInterface pool
     */
    protected final function getErrors(): array
    {
        return $this->logger ? $this->logger->getLogs() : [];
    }

   /**
    * @covers \Seeren\Error\ErrorLogger::__construct
    * @covers \Seeren\Error\AbstractHandler::__construct
    * @covers \Seeren\Error\ErrorLogger::handle
    */
   public function testHandle()
   {
       parent::assertHandle();
   }

   /**
    * @covers \Seeren\Error\ErrorLogger::__construct
    * @covers \Seeren\Error\AbstractHandler::__construct
    * @covers \Seeren\Error\ErrorLogger::register
    * @covers \Seeren\Error\ErrorLogger::unregister
    */
   public function testRegister()
   {
       $handler = $this->getHandler();
       $handler->register();
       $this->assertTrue("handle" === set_error_handler(function () {})[1]);
       $handler->unregister();
   }

   /**
    * @covers \Seeren\Error\ErrorLogger::__construct
    * @covers \Seeren\Error\AbstractHandler::__construct
    * @covers \Seeren\Error\ErrorLogger::register
    * @covers \Seeren\Error\ErrorLogger::unregister
    */
   public function testUnregister()
   {
       $handler = $this->getHandler();
       $handler->register();
       $handler->unregister();
       $this->assertTrue("handleError" === set_error_handler(function () {
       })[1]);
   }

   /**
    * @covers \Seeren\Error\ErrorLogger::__construct
    * @covers \Seeren\Error\AbstractHandler::__construct
    * @covers \Seeren\Error\ErrorLogger::shutdown
    * @covers \Seeren\Error\ErrorLogger::handle
    */
   public function testShutdownTrue()
   {
       $handler = $this->getHandler();
       $nErrors = count($this->getErrors());
       $handler->shutdown([
           HandlerInterface::TYPE    => E_USER_ERROR,
           HandlerInterface::MESSAGE => "message",
           HandlerInterface::FILE    => "file",
           HandlerInterface::LINE    => 133,
       ]);
       $this->assertTrue(++$nLogs  === count($this->getErrors()));
   }

   /**
    * @covers \Seeren\Error\ErrorLogger::__construct
    * @covers \Seeren\Error\AbstractHandler::__construct
    * @covers \Seeren\Error\ErrorLogger::shutdown
    */
   public function testShutdownFalse()
   {

       $handler = $this->getHandler();
       $nErrors = count($this->getErrors());
       $handler->shutdown();
       $this->assertFalse(++$nLogs  === count($this->getErrors()));
   }

}
