<?php

declare(strict_types=1);

/*
 * This file is part of holisticagency/frozen.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Frozen;

interface SystemInterface
{
    public function sapi(): string;

    public function version(): string;

    /**
     * @return string[]
     */
    public function extensions(): array;

    public function hostname(): string;

    public function ipV4(): string;

    public function httpHost(): string;

    public function resolve(string $remote): string;

    public function freeSpace(string $directory): float;
}
