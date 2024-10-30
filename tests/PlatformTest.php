<?php

/*
 * This file is part of holisticagency/decouple.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Test\Decouple;

use HolisticAgency\Decouple\Platform;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Platform::class)]
class PlatformTest extends TestCase
{
    public function testSapi()
    {
        // Given
        $system = new Platform();

        // When
        $actual = $system->sapi();

        // Then
        $this->assertEquals(\PHP_SAPI, $actual);
    }

    public function testVersion()
    {
        // Given
        $system = new Platform();

        // When
        $actual = $system->version();

        // Then
        $this->assertEquals(\PHP_VERSION, $actual);
    }

    public function testExtensions()
    {
        // Given
        $system = new Platform();

        // When
        $actual = $system->extensions();

        // Then
        $this->assertEquals(\get_loaded_extensions(), $actual);
        $this->assertNotContains(md5(\mt_rand()), $actual);
    }

    public function testMemory()
    {
        // Given
        $system = new Platform();

        // When
        $actual = $system->memory();

        // Then
        $this->assertEquals(\ini_get('memory_limit') ?: '', $actual);
    }
}
