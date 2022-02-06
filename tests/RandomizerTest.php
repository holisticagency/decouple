<?php

namespace HolisticAgency\Frozen\Tests;

use HolisticAgency\Frozen\Randomizer;
use PHPUnit\Framework\TestCase;

/**
 * @covers HolisticAgency\Frozen\Randomizer
 */
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