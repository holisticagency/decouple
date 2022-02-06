<?php

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
        $randomiizer = new FrozenRandomizer(1);

        // When
        $actual = $randomiizer->random();

        // Then
        $this->assertEquals(1, $actual); // :-D
    }
}