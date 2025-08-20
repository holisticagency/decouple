<?php

/*
 * This file is part of holistic-agency/decouple.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Test\Decouple\Frozen;

use HolisticAgency\Decouple\Frozen\System;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(System::class)]
class SystemTest extends TestCase
{
    private System $system;

    protected function setUp(): void
    {
        $this->system = new System(
            7,
            __DIR__,
            1234,
            0,
        );
    }

    public function testCreateFromArray()
    {
        // Given
        // $this->system

        // When
        $actual = System::createFromArray([
            'freeSpace' => 7,
            'documentRoot' => __DIR__,
            'pid' => 1234,
            'umask' => 0,
        ]);

        // Then
        $this->assertEquals($this->system, $actual);
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

    public function testDocumentRoot()
    {
        // Given
        // $this->system

        // When
        $actual = $this->system->documentRoot();

        // Then
        $this->assertEquals(__DIR__, $actual);
    }

    public function testPid()
    {
        // Given
        // $this->system

        // When
        $actual = $this->system->pid();

        // Then
        $this->assertEquals(1234, $actual);
    }

    public function testUmask()
    {
        // Given
        // $this->system

        // When
        $actual = $this->system->umask();

        // Then
        $this->assertEquals(0, $actual);
    }
}
