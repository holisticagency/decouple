<?php

/*
 * This file is part of holisticagency/frozen.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Frozen\Tests;

use DateTimeImmutable;
use HolisticAgency\Frozen\Clock;
use PHPUnit\Framework\TestCase;

/**
 * @covers HolisticAgency\Frozen\Clock
 */
class ClockTest extends TestCase
{
    public function testNow()
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
