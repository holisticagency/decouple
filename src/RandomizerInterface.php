<?php

declare(strict_types=1);

namespace HolisticAgency\Frozen;

interface RandomizerInterface
{
    public function random(): int;
}
