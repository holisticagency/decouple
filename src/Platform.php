<?php

declare(strict_types=1);

/*
 * This file is part of holisticagency/decouple.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Decouple;

class Platform implements PlatformInterface
{
    public function sapi(): string
    {
        return \PHP_SAPI;
    }

    public function version(): string
    {
        return \PHP_VERSION;
    }

    public function extensions(): array
    {
        return \get_loaded_extensions();
    }

    public function memory(): string
    {
        return \ini_get('memory_limit') ?: '';
    }
}
