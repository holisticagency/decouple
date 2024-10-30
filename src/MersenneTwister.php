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

namespace HolisticAgency\Decouple;

class MersenneTwister implements NumberGeneratorInterface
{
    public function __construct(
        public readonly int $min = 0,
        public readonly int $max = \PHP_INT_MAX,
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function draw(): int
    {
        if ($this->min > $this->max) {
            throw new RangeException('max value is not greater than or equal to min value');
        }

        return \mt_rand($this->min, $this->max);
    }
}
