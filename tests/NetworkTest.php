<?php

/*
 * This file is part of holisticagency/frozen.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Test\Decouple;

use HolisticAgency\Decouple\Network;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Network::class)]
class NetworkTest extends TestCase
{
    public function testHostname()
    {
        // Given
        $system = new Network();

        // When
        $actual = $system->hostname();

        // Then
        $this->assertEquals(\gethostname(), $actual);
    }

    public function testIpV4()
    {
        // Given
        $system = new Network();

        // When
        $actual = $system->ipV4();

        // Then
        $this->assertEquals(\gethostbyname(\gethostname()), $actual);
    }

    public function testHttpHost()
    {
        // Given
        $system = new Network();

        // When
        $actual = $system->httpHost();

        // Then
        $this->assertEquals('frozen.tld', $actual);
    }

    public function testRemotes()
    {
        // Given
        $system = new Network();

        // When
        $actual = $system->remotes();

        // Then
        $this->assertEquals([], $actual);
    }

    public static function dataResolve()
    {
        return [
            'unresolved' => [
                '',
                'www.'.md5(\mt_rand()).'.'.substr(md5(\mt_rand()), 0, 3),
            ],
            'resolved' => [
                \gethostbyname('github.com'),
                'github.com',
            ],
        ];
    }

    #[DataProvider('dataResolve')]
    public function testResolve($expected, $remote)
    {
        // Given
        $system = new Network();

        // When
        $actual = $system->resolve($remote);

        // Then
        $this->assertEquals($expected, $actual);
    }
}
