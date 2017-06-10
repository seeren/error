<?php

/**
 * This file contain Seeren\Error\AbstractHandler class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.2
 */

namespace Seeren\Error;

/**
 * Class for handle error
 * 
 * @category Seeren
 * @package Error
 * @abstract
 */
abstract class AbstractHandler
{

   /**
    * Construct Handler
    * 
    * @return null
    */
   protected function __construct()
   {
   }

   /**
    * Shutdown method
    *
    * @param array $error last error
    * @return null
    */
   public final function shutdown(array $error = null)
   {
       if ($error
        || ($error = error_get_last())) {
           $this->handle(
               $error[static::TYPE],
               $error[static::MESSAGE],
               $error[static::FILE],
               $error[static::LINE]
           );
       }
   }

   /**
    * Register
    *
    * @return HandlerInterface static
    */
   public final function register(): HandlerInterface
   {
       set_error_handler([$this, "handle"]);
       register_shutdown_function([$this, "shutdown"]);
       return $this;
   }

   /**
    * Unregister
    *
    * @return HandlerInterface static
    */
   public final function unregister(): HandlerInterface
   {
       restore_error_handler();
       register_shutdown_function(function () {});
       return $this;
   }

}
