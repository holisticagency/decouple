<?php

declare(strict_types=1);

namespace HolisticAgency\Frozen;

use DateTimeInterface;

interface ClockInterface
{
    public function now(): DateTimeInterface;
}
