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

use HolisticAgency\Frozen\FrozenPlatform;
use PHPUnit\Framework\TestCase;

/**
 * @covers HolisticAgency\Frozen\FrozenPlatform
 */
class FrozenPlatformTest extends TestCase
{
    private FrozenPlatform $platform;

    protected function setUp(): void
    {
        $this->platform = new FrozenPlatform(
            'apache2handler',
            '8.1.3',
            ['zip', 'curl'],
            '128M',
        );
    }

    public function testCreateFromArray()
    {
        // Given
        // $this->platform

        // When
        $actual = FrozenPlatform::createFromArray([
            'sapi' => 'apache2handler',
            'version' => '8.1.3',
            'extensions' => ['zip', 'curl'],
            'memory' => '128M',
        ]);

        // Then
        $this->assertEquals($this->platform, $actual);
    }

    public function testSapi()
    {
        // Given
        // $this->platform

        // When
        $actual = $this->platform->sapi();

        // Then
        $this->assertEquals('apache2handler', $actual);
    }

    public function testVersion()
    {
        // Given
        // $this->platform

        // When
        $actual = $this->platform->version();

        // Then
        $this->assertEquals('8.1.3', $actual);
    }

    public function testExtensions()
    {
        // Given
        // $this->platform

        // When
        $actual = $this->platform->extensions();

        // Then
        $this->assertEquals(['zip', 'curl'], $actual);
        $this->assertNotContains('xml', $actual);
    }

    public function testMemory()
    {
        // Given
        // $this->platform

        // When
        $actual = $this->platform->memory();

        // Then
        $this->assertEquals('128M', $actual);
    }
}
