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

use HolisticAgency\Frozen\FrozenRandomizer;
use PHPUnit\Framework\TestCase;

/**
 * @covers HolisticAgency\Frozen\FrozenRandomizer
 */
class FrozenRandomizerTest extends TestCase
{
    public function testRandom()
    {
        // Given
        $randomizer = new FrozenRandomizer(1);

        // When
        $actual = $randomizer->random();

        // Then
        $this->assertEquals(1, $actual); // :-D
    }
}
