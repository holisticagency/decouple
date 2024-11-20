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

namespace HolisticAgency\Decouple\Frozen;

use HolisticAgency\Decouple\SystemInterface;

class System implements SystemInterface
{
    public function __construct(
        protected float $freeSpace,
        protected string $documentRoot,
        protected int $pid,
        protected int $umask,
    ) {
    }

    /**
     * @param array{documentRoot?:string,freeSpace?:float,pid?:int,umask?:int} $frozenParameters
     * @param SystemInterface|null $system
     *
     * @return self
     */
    public static function createFromArray(
        array $frozenParameters = [],
        ?SystemInterface $system = \null,
    ): self {
        return new self(
            $frozenParameters['freeSpace'] ?? $system?->freeSpace($system->documentRoot()) ?? 0,
            $frozenParameters['documentRoot'] ?? $system?->documentRoot() ?? '',
            $frozenParameters['pid'] ?? $system?->pid() ?? 0,
            $frozenParameters['umask'] ?? $system?->umask() ?? 0022,
        );
    }

    public function freeSpace(string $directory): float
    {
        return $this->freeSpace;
    }

    public function documentRoot(): string
    {
        return $this->documentRoot;
    }

    public function pid(): int
    {
        return $this->pid;
    }

    public function umask(?int $mask = \null): int
    {
        return $this->umask;
    }
}
