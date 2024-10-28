<?php

/*
 * This file is part of holisticagency/frozen.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Test\Frozen\Frozen;

use HolisticAgency\Frozen\Frozen\Randomizer;
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
}
