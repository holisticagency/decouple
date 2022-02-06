<?php

namespace HolisticAgency\Frozen\Tests;

use DateTimeImmutable;
use HolisticAgency\Frozen\FrozenClock;
use PHPUnit\Framework\TestCase;

/**
 * @covers HolisticAgency\Frozen\FrozenClock
 */
class FrozenClockTest extends TestCase
{
    public function testRandom()
    {
        // Given
        $clock = new FrozenClock(new DateTimeImmutable('1971-11-05 19:40:12 CET'));

        // When
        $actual = $clock->now()->format('Y-m-d H:i:s T');

        // Then
        $this->assertEquals('1971-11-05 19:40:12 CET', $actual);
    }
}