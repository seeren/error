<?php

/**
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @author (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/cache
 * @version 1.0.2
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
     * @return HandlerInterface
     */
   abstract protected function getHandler(): HandlerInterface;

    /**
     * Get errors
     *
     * @return array
     */
   abstract protected function getErrors(): array;

   /**
    * Test handle
    */
   public function testHandle()
   {
       $handler = $this->getHandler();
       $nErrors = count($this->getErrors());
       $handler->handle(E_USER_ERROR, "message", "file", 44);
       $this->assertTrue(++$nErrors  === count($this->getErrors()));
   }

}
