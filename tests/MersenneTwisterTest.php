<?php

/*
 * This file is part of holistic-agency/decouple.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Test\Decouple;

use HolisticAgency\Decouple\MersenneTwister;
use HolisticAgency\Decouple\RangeException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MersenneTwister::class)]
class MersenneTwisterTest extends TestCase
{
    public function testDraw()
    {
        // Given
        $generator = new MersenneTwister(1, 6);

        // When
        $actual = $generator->draw();

        // Then
        $this->assertGreaterThanOrEqual(1, $actual);
        $this->assertLessThanOrEqual(6, $actual);
    }

    public function testRangeException()
    {
        // Given
        $this->expectException(RangeException::class);
        $this->expectExceptionMessage('max value is not greater than or equal to min value');

        // When
        (new MersenneTwister(2, 1))->draw();

        // Then
        // An exception is thrown
    }
}
