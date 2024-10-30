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

namespace HolisticAgency\Decouple\Frozen;

use HolisticAgency\Decouple\RandomizerInterface;

class Randomizer implements RandomizerInterface
{
    /** @var int[] */
    private array $numbers;

    /** @var int[] */
    private array $reset;

    public function __construct(int ...$numbers)
    {
        $this->numbers = $numbers;
        $this->reset = $this->numbers;
    }

    public function random(): int
    {
        if (empty($this->numbers)) {
            $this->numbers = $this->reset;
        }

        return (int) \array_shift($this->numbers);
    }
}
