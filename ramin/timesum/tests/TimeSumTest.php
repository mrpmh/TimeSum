<?php

use PHPUnit\Framework\TestCase;
use Ramin\TimeSum\TimeSum;

class TimeSumTest extends TestCase
{
    public function testSum()
    {
        $times = ['00:02:50', '00:52:00', '01:10:10'];
        $this->assertEquals('02:05:00', TimeSum::sum($times));
    }

    public function testInvalidFormat()
    {
        $this->expectException(\InvalidArgumentException::class);
        TimeSum::sum(['invalid']);
    }
}
