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

namespace HolisticAgency\Decouple\Frozen;

use HolisticAgency\Decouple\PlatformInterface;

class Platform implements PlatformInterface
{
    /**
     * @param string[] $extensions
     */
    public function __construct(
        protected string $sapi,
        protected string $version,
        protected array $extensions,
        protected string $memory,
    ) {
    }

    /**
     * @param array{sapi?:string,version?:string,memory?:string,extensions?:string[]} $frozenParameters
     * @param PlatformInterface|null $platform
     *
     * @return self
     */
    public static function createFromArray(
        array $frozenParameters = [],
        ?PlatformInterface $platform = null,
    ): self {
        return new self(
            $frozenParameters['sapi'] ?? $platform?->sapi() ?? '',
            $frozenParameters['version'] ?? $platform?->version() ?? '',
            $frozenParameters['extensions'] ?? $platform?->extensions() ?? [],
            $frozenParameters['memory'] ?? $platform?->memory() ?? '',
        );
    }

    public function sapi(): string
    {
        return $this->sapi;
    }

    public function version(): string
    {
        return $this->version;
    }

    public function extensions(): array
    {
        return $this->extensions;
    }

    public function memory(): string
    {
        return $this->memory;
    }
}
