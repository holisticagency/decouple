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

use HolisticAgency\Frozen\Platform;
use PHPUnit\Framework\TestCase;

/**
 * @covers HolisticAgency\Frozen\Platform
 */
class PlatformTest extends TestCase
{
    public function testSapi()
    {
        // Given
        $system = new Platform();

        // When
        $actual = $system->sapi();

        // Then
        $this->assertEquals(PHP_SAPI, $actual);
    }

    public function testVersion()
    {
        // Given
        $system = new Platform();

        // When
        $actual = $system->version();

        // Then
        $this->assertEquals(PHP_VERSION, $actual);
    }

    public function testExtensions()
    {
        // Given
        $system = new Platform();

        // When
        $actual = $system->extensions();

        // Then
        $this->assertEquals(get_loaded_extensions(), $actual);
        $this->assertNotContains(md5(mt_rand()), $actual);
    }

    public function testMemory()
    {
        // Given
        $system = new Platform();

        // When
        $actual = $system->memory();

        // Then
        $this->assertEquals(ini_get('memory_limit') ?: '', $actual);
    }
}
