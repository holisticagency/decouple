<?php

declare(strict_types=1);

namespace HolisticAgency\Frozen;

class Randomizer implements RandomizerInterface
{
    public function __construct(
        public readonly int $min = 0,
        public readonly int $max = PHP_INT_MAX
    ) {
    }

    public function random(): int
    {
        return mt_rand($this->min, $this->max);
    }
}
