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

class System implements SystemInterface
{
    public function sapi(): string
    {
        return PHP_SAPI;
    }

    public function hostname(): string
    {
        return gethostname() ?: '';
    }

    public function ipV4(): string
    {
        return gethostbyname($this->hostname());
    }

    public function httpHost(): string
    {
        return $_SERVER['HTTP_HOST'] ?? '';
    }

    public function resolve(string $remote): string
    {
        $ip = gethostbyname($remote);

        return $ip !== $remote ? $ip : '';
    }
}
