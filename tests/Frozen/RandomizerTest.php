<?php

/*
 * This file is part of holisticagency/decouple.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Test\Decouple\Frozen;

use HolisticAgency\Decouple\Frozen\Randomizer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Randomizer::class)]
class RandomizerTest extends TestCase
{
    public function testRandom()
    {
        // Given
        $randomizer = new Randomizer(1);

        // When
        $actual = $randomizer->random();

        // Then
        $this->assertEquals(1, $actual); // :-D
    }

    public function testMultipleRandom()
    {
        // Given
        $randomizer = new Randomizer(1, 2);

        // When
        $actual = [$randomizer->random(), $randomizer->random(), $randomizer->random()];

        // Then
        $this->assertEquals([1, 2, 1], $actual);
    }
}
