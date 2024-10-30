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

use HolisticAgency\Decouple\Frozen\NumberGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(NumberGenerator::class)]
class NumberGeneratorTest extends TestCase
{
    public function testDraw()
    {
        // Given
        $generator = new NumberGenerator(1);

        // When
        $actual = $generator->draw();

        // Then
        $this->assertEquals(1, $actual); // :-D
    }

    public function testMultipleRandom()
    {
        // Given
        $generator = new NumberGenerator(1, 2);

        // When
        $actual = [$generator->draw(), $generator->draw(), $generator->draw()];

        // Then
        $this->assertEquals([1, 2, 1], $actual);
    }
}
