<?php

declare(strict_types=1);

/*
 * This file is part of holistic-agency/decouple.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Decouple;

interface SystemInterface
{
    public function freeSpace(string $directory): float;

    public function documentRoot(): string;

    public function pid(): int;

    public function umask(?int $mask = null): int;
}
