<?php

namespace Seeren\Error;

/**
 * Interface to Handle errors
 *
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @package Seeren\Error
 */
interface HandlerInterface
{

    const CONTEXT = "context";

    /**
     * @var string
     */
    const FILE = 'file';

    /**
     * @var string
     */
    const LINE = 'line';

    /**
     * @var string
     */
    const MESSAGE = 'message';

    /**
     * @var string
     */
    const TYPE = 'type';

    /**
     * @return $this
     */
    public function register(): self;

    /**
     * @return $this
     */
    public function unregister(): self;

    /**
     * @return void
     */
    public function shutdown(): void;

}
