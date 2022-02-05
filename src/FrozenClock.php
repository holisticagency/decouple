<?php

declare(strict_types=1);

namespace HolisticAgency\Frozen;

use DateTimeInterface;

class FrozenClock implements ClockInterface
{
    public function __construct(protected DateTimeInterface $now)
    {
    }

    public function now(): DateTimeInterface
    {
        return $this->now;
    }
}
