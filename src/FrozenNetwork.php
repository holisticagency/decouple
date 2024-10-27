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

class FrozenNetwork implements NetworkInterface
{
    /**
     * @param array<string,string> $remotes
     */
    public function __construct(
        protected string $hostname,
        protected string $ipV4,
        protected string $httpHost,
        protected array $remotes,
    ) {
    }

    /**
     * @param array{'hostname'?:string,'ipV4'?:string,'httpHost'?:string,'remotes'?:array<string,string>} $frozenParameters
     * @param NetworkInterface|null $network
     *
     * @return self
     */
    public static function createFromArray(
        array $frozenParameters = [],
        ?NetworkInterface $network =  null,
    ): self {
        return new self(
            $frozenParameters['hostname'] ?? $network?->hostname() ?? '',
            $frozenParameters['ipV4'] ?? $network?->ipV4() ?? '',
            $frozenParameters['httpHost'] ?? $network?->httpHost() ?? '',
            $frozenParameters['remotes'] ?? $network?->remotes() ?? [],
        );
    }

    public function hostname(): string
    {
        return $this->hostname;
    }

    public function ipV4(): string
    {
        return $this->ipV4;
    }

    public function httpHost(): string
    {
        return $this->httpHost;
    }

    public function remotes(): array
    {
        return $this->remotes;
    }

    public function resolve(string $remote): string
    {
        return array_key_exists($remote, $this->remotes) ? $this->remotes[$remote] : '';
    }
}
