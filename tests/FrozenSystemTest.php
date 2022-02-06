<?php

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
            'localhost',
            '127.0.0.1',
            'frozen.tld',
            [
                'frozen.tld' => '1.2.3.4',
            ]
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
}