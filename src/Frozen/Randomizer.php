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

namespace HolisticAgency\Frozen\Frozen;

use HolisticAgency\Frozen\RandomizerInterface;

class Randomizer implements RandomizerInterface
{
    public function __construct(protected int $rand)
    {
    }

    public function random(): int
    {
        return $this->rand;
    }
}
