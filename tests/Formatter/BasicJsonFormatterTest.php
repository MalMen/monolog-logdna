<?php
namespace Fusions\Test\Monolog\LogDna\Formatter;

use Fusions\Monolog\LogDna\Formatter\BasicJsonFormatter;
use Fusions\Test\Monolog\LogDna\TestHelperTrait;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Fusions\Monolog\LogDna\Formatter\BasicJsonFormatter
 */
class BasicJsonFormatterTest extends TestCase
{
    use TestHelperTrait;

    /** @covers ::format */
    public function test_format(): void
    {
        $record = $this->getRecord(Logger::INFO, 'This is a test message', ['FOO' => 'BAR']);

        $this->assertJsonStringEqualsJsonFile(
            __DIR__ . '/../fixtures/basic-json-formatter-format.json',
            (new BasicJsonFormatter)->format($record)
        );
    }
}
