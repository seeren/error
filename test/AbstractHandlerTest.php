<?php

namespace Seeren\Error\Test;

use PHPUnit\Framework\TestCase;
use Seeren\Error\AbstractHandler;

class AbstractHandlerTest extends TestCase
{

    /**
     * @covers \Seeren\Error\AbstractHandler::register
     * @covers \Seeren\Error\AbstractHandler::unregister
     */
    public function testRegister(): void
    {
        $mock = $this->createMock(DummyHandler::class);
        $mock->register();
        $this->assertInstanceOf(
            AbstractHandler::class,
            set_error_handler(function () {
            })[0]
        );
        $mock->unregister();
    }

    /**
     * @covers \Seeren\Error\AbstractHandler::register
     * @covers \Seeren\Error\AbstractHandler::unregister
     */
    public function testUnregister(): void
    {
        $mock = $this->createMock(DummyHandler::class);
        $mock->register();
        $mock->unregister();
        $this->assertTrue(null !== set_error_handler(function () {
            }));
    }

    /**
     * @covers \Seeren\Error\AbstractHandler::shutdown
     */
    public function testShutdown(): void
    {
        $mock = $this->createMock(DummyHandler::class);
        $mock->expects($this->once())->method('handle');
        $mock->shutdown([
            AbstractHandler::TYPE => 0,
            AbstractHandler::MESSAGE => 'message',
            AbstractHandler::FILE => 'file',
            AbstractHandler::LINE => 0,
        ]);
    }

}

class DummyHandler extends AbstractHandler
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
