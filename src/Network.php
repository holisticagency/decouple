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

class Network implements NetworkInterface
{
    /**
     * @var array<string,string>
     */
    protected array $remotes = [];

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

    public function remotes(): array
    {
        return $this->remotes;
    }

    public function resolve(string $remote): string
    {
        if (!array_key_exists($remote, $this->remotes)) {
            $ip =  gethostbyname($remote);
            $this->remotes[$remote] = $ip !== $remote ? $ip : '';
        }

        return $this->remotes[$remote];
    }
}
