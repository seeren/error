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
 * Class for handle error
 * 
 * @category Seeren
 * @package Error
 * @abstract
 */
abstract class AbstractHandler
{

   /**
    * @construct
    */
   protected function __construct()
   {
   }

   /**
    * {@inheritDoc}
    * @see \Seeren\Error\HandlerInterface::shutdown()
    */
   public final function shutdown(array $error = null)
   {
       if ($error || ($error = error_get_last())) {
           $this->handle(
               $error[static::TYPE],
               $error[static::MESSAGE],
               $error[static::FILE],
               $error[static::LINE]
           );
       }
   }

   /**
    * {@inheritDoc}
    * @see \Seeren\Error\HandlerInterface::register()
    */
   public final function register(): HandlerInterface
   {
       set_error_handler([$this, "handle"]);
       register_shutdown_function([$this, "shutdown"]);
       return $this;
   }

   /**
    * {@inheritDoc}
    * @see \Seeren\Error\HandlerInterface::unregister()
    */
   public final function unregister(): HandlerInterface
   {
       restore_error_handler();
       register_shutdown_function(function () {});
       return $this;
   }

}
