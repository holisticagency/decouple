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

use HolisticAgency\Decouple\System;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(System::class)]
class SystemTest extends TestCase
{
    public function testFreeSpace()
    {
        // Given
        $system = new System();

        // When
        $actual = $system->freeSpace(__DIR__);

        // Then
        $this->assertEquals(\disk_free_space(__DIR__), $actual);
    }

    public function testDocumentRoot()
    {
        // Given
        $system = new System();

        // When
        $actual = $system->documentRoot();

        // Then
        $this->assertEquals('/var/www/html', $actual);
    }

    public function testPid()
    {
        // Given
        $system = new System();

        // When
        $actual = $system->pid();

        // Then
        $this->assertEquals(\getmypid(), $actual);
    }

    public function testUmask()
    {
        // Given
        $system = new System();
        $currentUmask = \umask();

        // When
        $previous = $system->umask(0);
        $actual = $system->umask($currentUmask);

        // Then
        $this->assertEquals($currentUmask, $previous);
        $this->assertEquals(0, $actual);
    }
}
