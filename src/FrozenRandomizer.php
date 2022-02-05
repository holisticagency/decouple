<?php

declare(strict_types=1);

namespace HolisticAgency\Frozen;

class FrozenRandomizer implements RandomizerInterface
{
    public function __construct(protected int $rand)
    {
    }

    public function random(): int
    {
        return $this->rand;
    }
}
