<?php

/*
 * This file is part of holisticagency/frozen.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Test\Decouple\Frozen;

use HolisticAgency\Decouple\Frozen\Clock;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Clock::class)]
class FrozenClockTest extends TestCase
{
    public function testNow()
    {
        // Given
        $clock = new Clock(new \DateTimeImmutable('1971-11-05 19:40:12 CET'));

        // When
        $actual = $clock->now()->format('Y-m-d H:i:s T');

        // Then
        $this->assertEquals('1971-11-05 19:40:12 CET', $actual);
    }
}
