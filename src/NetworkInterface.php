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

interface NetworkInterface
{
    public function hostname(): string;

    public function ipV4(): string;

    public function httpHost(): string;

    /**
     * @return array<string,string>
     */
    public function remotes(): array;

    public function resolve(string $remote): string;
}
