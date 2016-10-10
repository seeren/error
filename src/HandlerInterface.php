<?php

/**
 * This file contain Seeren\Error\HandlerInterface interface
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

/**
 * Interface for handle error
 * 
 * @category Seeren
 * @package Error
 */
interface HandlerInterface
{

   const
      /**
       * @var string context key
       */
      CONTEXT = "context",
      /**
       * @var string file key
       */
      FILE = "file",
      /**
       * @var string line key
       */
      LINE = "line",
      /**
       * @var string message key
       */
      MESSAGE = "message",
      /**
       * @var string type key
       */
      TYPE = "type";

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
   public function handle(
       int $type,
       string $message,
       string $file,
       int $line,
       array $context = []);

   /**
    * Shutdown method
    *
    * @return null
    */
   public function shutdown();

   /**
    * Register
    *
    * @return HandlerInterface static
    */
   public function register(): self;
   
   /**
    * Unregister
    *
    * @return HandlerInterface static
    */
   public function unregister(): self;

}
