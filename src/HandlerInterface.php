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
 * @version 1.0.2
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
       * @var string
       */
      CONTEXT = "context",

      /**
       * @var string
       */
      FILE    = "file",

      /**
       * @var string
       */
      LINE    = "line",

      /**
       * @var string
       */
      MESSAGE = "message",

      /**
       * @var string
       */
      TYPE    = "type";

   /**
    * @param int $type
    * @param string $message
    * @param string $file
    * @param int $line
    * @param array $context
    */
   public function handle(
       int $type,
       string $message,
       string $file,
       int $line,
       array $context = []);

   /**
    * @return null
    */
   public function shutdown();

   /**
    * @return HandlerInterface static
    */
   public function register(): self;
   
   /**
    * @return HandlerInterface static
    */
   public function unregister(): self;

}
