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

use HolisticAgency\Frozen\System;
use PHPUnit\Framework\TestCase;

/**
 * @covers HolisticAgency\Frozen\System
 */
class SystemTest extends TestCase
{
    public function testSapi()
    {
        // Given
        $system = new System();

        // When
        $actual = $system->sapi();

        // Then
        $this->assertEquals(PHP_SAPI, $actual);
    }

    public function testVersion()
    {
        // Given
        $system = new System();

        // When
        $actual = $system->version();

        // Then
        $this->assertEquals(PHP_VERSION, $actual);
    }

    public function testHostname()
    {
        // Given
        $system = new System();

        // When
        $actual = $system->hostname();

        // Then
        $this->assertEquals(gethostname(), $actual);
    }

    public function testIpV4()
    {
        // Given
        $system = new System();

        // When
        $actual = $system->ipV4();

        // Then
        $this->assertEquals(gethostbyname(gethostname()), $actual);
    }

    public function testHttpHost()
    {
        // Given
        $system = new System();

        // When
        $actual = $system->httpHost();

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
                gethostbyname(gethostname()),
                gethostname(),
            ],
        ];
    }

    /**
     * @dataProvider dataResolve
     */
    public function testResolve($expected, $remote)
    {
        // Given
        $system = new System();

        // When
        $actual = $system->resolve($remote);

        // Then
        $this->assertEquals($expected, $actual);
    }
}
