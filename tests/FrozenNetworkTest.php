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

use HolisticAgency\Frozen\FrozenNetwork;
use PHPUnit\Framework\TestCase;

/**
 * @covers HolisticAgency\Frozen\FrozenNetwork
 */
class FrozenNetworkTest extends TestCase
{
    private FrozenNetwork $network;

    protected function setUp(): void
    {
        $this->network = new FrozenNetwork(
            'localhost',
            '127.0.0.1',
            'frozen.tld',
            [
                'frozen.tld' => '1.2.3.4',
            ],
        );
    }

    public function testCreateFromArray()
    {
        // Given
        // $this->network

        // When
        $actual = FrozenNetwork::createFromArray([
            'hostname' => 'localhost',
            'ipV4' => '127.0.0.1',
            'httpHost' => 'frozen.tld',
            'remotes' => [
                'frozen.tld' => '1.2.3.4',
            ],
        ]);

        // Then
        $this->assertEquals($this->network, $actual);
    }

    public function testHostname()
    {
        // Given
        // $this->network

        // When
        $actual = $this->network->hostname();

        // Then
        $this->assertEquals('localhost', $actual);
    }

    public function testIpV4()
    {
        // Given
        // $this->network

        // When
        $actual = $this->network->ipV4();

        // Then
        $this->assertEquals('127.0.0.1', $actual);
    }

    public function testHttpHost()
    {
        // Given
        // $this->network

        // When
        $actual = $this->network->httpHost();

        // Then
        $this->assertEquals('frozen.tld', $actual);
    }

    public function testRemotes()
    {
        // Given
        // $this->network

        // When
        $actual = $this->network->remotes();

        // Then
        $this->assertEquals(['frozen.tld' => '1.2.3.4'], $actual);
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
        // $this->network

        // When
        $actual = $this->network->resolve($remote);

        // Then
        $this->assertEquals($expected, $actual);
    }
}
