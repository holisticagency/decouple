<?php

/*
 * This file is part of holisticagency/frozen.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Test\Decouple;

use HolisticAgency\Decouple\Randomizer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Randomizer::class)]
class RandomizerTest extends TestCase
{
    public function testRandom()
    {
        // Given
        $randomizer = new Randomizer(1, 6);

        // When
        $actual = $randomizer->random();

        // Then
        $this->assertGreaterThanOrEqual(1, $actual);
        $this->assertLessThanOrEqual(6, $actual);
    }
}
