<?php

namespace PhpAss\Tests\Model;

use PhpAss\Model\Duration;
use PHPUnit\Framework\TestCase;

class DurationTest extends TestCase
{
    public function testFromString(): void
    {
        $duration = Duration::fromString('01:02:03.456');

        $this->assertEquals([
            'hours' => 1,
            'minutes' => 2,
            'seconds' => 3,
            'tenth' => 456,
        ], [
            'hours' => $duration->getHours(),
            'minutes' => $duration->getMinutes(),
            'seconds' => $duration->getSeconds(),
            'tenth' => $duration->getTenths(),
        ]);
    }

    public function testFromSeconds(): void
    {
        $duration = Duration::fromSeconds(3723.456);

        $this->assertEquals([
            'hours' => 1,
            'minutes' => 2,
            'seconds' => 3,
            'tenth' => 4,
        ], [
            'hours' => $duration->getHours(),
            'minutes' => $duration->getMinutes(),
            'seconds' => $duration->getSeconds(),
            'tenth' => $duration->getTenths(),
        ]);
    }
}