<?php

/**
 * This file contain Seeren\Error\Test\AbstractHandlerTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/cache
 * @version 1.0.1
 */

namespace Seeren\Error\Test;


use Seeren\Error\HandlerInterface;

/**
 * Class for test AbstractHandler
 * 
 * @category Seeren
 * @package Error
 * @subpackage Test
 * @abstract
 */
abstract class AbstractHandlerTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Get handler
     *
     * @return HandlerInterface pool
     */
   abstract protected function getHandler(): HandlerInterface;

    /**
     * Get errors
     *
     * @return HandlerInterface pool
     */
   abstract protected function getErrors(): array;

   /**
    * Assert handle
    */
   protected function assertHandle()
   {
       $handler = $this->getHandler();
       $nErrors = count($this->getErrors());
       $handler->handle(E_USER_ERROR, "message", "file", 44);
       $this->assertTrue(++$nErrors  === count($this->getErrors()));
   }

}
