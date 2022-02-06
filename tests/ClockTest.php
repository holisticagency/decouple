<?php

namespace HolisticAgency\Frozen\Tests;

use DateTimeImmutable;
use HolisticAgency\Frozen\Clock;
use PHPUnit\Framework\TestCase;

/**
 * @covers HolisticAgency\Frozen\Clock
 */
class ClockTest extends TestCase
{
    public function testRandom()
    {
        // Given
        $clock = new Clock();

        // When
        $beforeActual = new DateTimeImmutable('now');
        $actual = $clock->now();
        $afterActual = new DateTimeImmutable('now');

        // Then
        $this->assertGreaterThanOrEqual($beforeActual, $actual);
        $this->assertLessThanOrEqual($afterActual, $actual);
    }
}