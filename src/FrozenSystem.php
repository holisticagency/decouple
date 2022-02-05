<?php

declare(strict_types=1);

namespace HolisticAgency\Frozen;

class FrozenSystem implements SystemInterface
{
    /** @param array<string, string> $remotes */
    public function __construct(
        protected string $sapi,
        protected string $hostname,
        protected string $ipV4,
        protected string $httpHost,
        protected array $remotes
    ) {
    }

    public function sapi(): string
    {
        return $this->sapi;
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

    public function resolve(string $remote): string
    {
        return array_key_exists($remote, $this->remotes) ? $this->remotes[$remote] : '';
    }
}
