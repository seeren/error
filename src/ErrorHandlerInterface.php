<?php

namespace Seeren\Error;

interface ErrorHandlerInterface
{

    const FILE = 'file';

    const LINE = 'line';

    const MESSAGE = 'message';

    const TYPE = 'type';

    public function register(): self;

    public function unregister(): self;

    public function shutdown(): void;

}
