<?php

namespace Seeren\Error\Test;

use PHPUnit\Framework\TestCase;
use Seeren\Error\AbstractErrorHandler;
use Seeren\Error\ErrorHandlerInterface;

class AbstractErrorHandlerTest extends TestCase
{

    /**
     * @covers \Seeren\Error\AbstractErrorHandler::register
     * @covers \Seeren\Error\AbstractErrorHandler::unregister
     */
    public function testRegister(): void
    {
        $mock = $this->createMock(DummyHandler::class)->register();
        $this->assertInstanceOf(
            AbstractErrorHandler::class,
            set_error_handler(fn() => null)[0]
        );
        $mock->unregister();
    }

    /**
     * @covers \Seeren\Error\AbstractErrorHandler::register
     * @covers \Seeren\Error\AbstractErrorHandler::unregister
     */
    public function testUnregister(): void
    {
        $this->createMock(DummyHandler::class)->register()->unregister();
        $this->assertTrue(null !== set_error_handler(fn() => null));
    }

}

class DummyHandler extends AbstractErrorHandler
{

    public function handle(
        int $type,
        string $message,
        string $file,
        int $line,
        array $context = []
    ): void
    {
    }

}
