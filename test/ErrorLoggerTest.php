<?php

namespace Seeren\Error\Test;

use PHPUnit\Framework\TestCase;
use Seeren\Error\ErrorLogger;
use Seeren\Log\Logger\Daily;

class ErrorLoggerTest extends TestCase
{

    /**
     * @covers \Seeren\Error\ErrorLogger::__construct
     * @covers \Seeren\Error\ErrorLogger::handle
     */
    public function testHandle(): void
    {
        $includePath = __DIR__ . DIRECTORY_SEPARATOR . 'log';
        $loggerMock = (new \ReflectionClass(Daily::class))->newInstance($includePath);
        $mock = (new \ReflectionClass(ErrorLogger::class))->newInstance($loggerMock);
        $mock->handle(0, 'message', 'file', 0);
        $filename = $includePath . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log';
        $this->assertTrue(is_file($filename));
        unlink($filename);
    }

}
