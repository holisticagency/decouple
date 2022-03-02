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

interface PlatformInterface
{
    public function sapi(): string;

    public function version(): string;

    /**
     * @return string[]
     */
    public function extensions(): array;

    public function memory(): string;
}
