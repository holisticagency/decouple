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

use HolisticAgency\Frozen\FrozenSystem;
use PHPUnit\Framework\TestCase;

/**
 * @covers HolisticAgency\Frozen\FrozenSystem
 */
class FrozenSystemTest extends TestCase
{
    private FrozenSystem $system;

    protected function setUp(): void
    {
        $this->system = new FrozenSystem(
            'apache2handler',
            '8.1.3',
            ['zip', 'curl'],
            '128M',
            'localhost',
            '127.0.0.1',
            'frozen.tld',
            [
                'frozen.tld' => '1.2.3.4',
            ],
            7,
        );
    }

    public function testSapi()
    {
        // Given
        // $this->system

        // When
        $actual = $this->system->sapi();

        // Then
        $this->assertEquals('apache2handler', $actual);
    }

    public function testVersion()
    {
        // Given
        // $this->system

        // When
        $actual = $this->system->version();

        // Then
        $this->assertEquals('8.1.3', $actual);
    }

    public function testExtensions()
    {
        // Given
        // $this->system

        // When
        $actual = $this->system->extensions();

        // Then
        $this->assertEquals(['zip', 'curl'], $actual);
        $this->assertNotContains('xml', $actual);
    }

    public function testMemory()
    {
        // Given
        // $this->system

        // When
        $actual = $this->system->memory();

        // Then
        $this->assertEquals('128M', $actual);
    }

    public function testHostname()
    {
        // Given
        // $this->system

        // When
        $actual = $this->system->hostname();

        // Then
        $this->assertEquals('localhost', $actual);
    }

    public function testIpV4()
    {
        // Given
        // $this->system

        // When
        $actual = $this->system->ipV4();

        // Then
        $this->assertEquals('127.0.0.1', $actual);
    }

    public function testHttpHost()
    {
        // Given
        // $this->system

        // When
        $actual = $this->system->httpHost();

        // Then
        $this->assertEquals('frozen.tld', $actual);
    }

    public function dataResolve()
    {
        return [
            'unresolved' => [
                '',
                'www.'.md5(mt_rand()).'.'.substr(md5(mt_rand()), 0, 3),
            ],
            'resolved' => [
                '1.2.3.4',
                'frozen.tld',
            ],
        ];
    }
    /**
     * @dataProvider dataResolve
     */
    public function testResolve($expected, $remote)
    {
        // Given
        // $this->system

        // When
        $actual = $this->system->resolve($remote);

        // Then
        $this->assertEquals($expected, $actual);
    }

    public function testFreeSpace()
    {
        // Given
        // $this->system

        // When
        $actual = $this->system->freeSpace('anywhere');

        // Then
        $this->assertEquals(7, $actual);
    }
}
