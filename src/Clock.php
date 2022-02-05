<?php

declare(strict_types=1);

namespace HolisticAgency\Frozen;

use DateTimeImmutable;
use DateTimeInterface;

class Clock implements ClockInterface
{
    public function now(): DateTimeInterface
    {
        return new DateTimeImmutable();
    }
}
