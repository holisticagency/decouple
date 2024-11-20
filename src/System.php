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

class System implements SystemInterface
{
    public function freeSpace(string $directory): float
    {
        return (float) \disk_free_space($directory);
    }

    public function documentRoot(): string
    {
        return $_SERVER['DOCUMENT_ROOT'] ?? '';
    }

    public function pid(): int
    {
        return \getmypid() ?: 0;
    }

    public function umask(?int $mask = \null): int
    {
        return \umask($mask);
    }
}
