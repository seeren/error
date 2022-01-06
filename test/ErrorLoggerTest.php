<?php

namespace Seeren\Error\Test;

use PHPUnit\Framework\TestCase;
use Seeren\Error\ErrorHandlerInterface;
use Seeren\Error\ErrorLogger;
use Seeren\Log\Logger\Daily;

class ErrorLoggerTest extends TestCase
{

    /**
     * @covers \Seeren\Error\ErrorLogger::__construct
     * @covers \Seeren\Error\ErrorLogger::register
     * @covers \Seeren\Error\ErrorLogger::shutdown
     * @covers \Seeren\Error\ErrorLogger::handle
     */
    public function testHandle(): void
    {
        $loggerMock = (new \ReflectionClass(Daily::class))->newInstance(__DIR__);
        $mock = (new \ReflectionClass(ErrorLogger::class))->newInstance($loggerMock);
        $mock->shutdown([
            ErrorHandlerInterface::TYPE => 0,
            ErrorHandlerInterface::MESSAGE => 'message',
            ErrorHandlerInterface::FILE => 'file',
            ErrorHandlerInterface::LINE => 0
        ]);
        $includePath = __DIR__ . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR. 'log';
        $filename = $includePath . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log';
        $this->assertTrue(is_file($filename));
        unlink($filename);
    }

}
