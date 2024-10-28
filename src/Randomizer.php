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

namespace HolisticAgency\Decouple;

class Randomizer implements RandomizerInterface
{
    public function __construct(
        public readonly int $min = 0,
        public readonly int $max = \PHP_INT_MAX,
    ) {
    }

    public function random(): int
    {
        return \mt_rand($this->min, $this->max);
    }
}
