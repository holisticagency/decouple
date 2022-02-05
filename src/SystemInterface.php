<?php

declare(strict_types=1);

namespace HolisticAgency\Frozen;

interface SystemInterface
{
    public function sapi(): string;

    public function hostname(): string;

    public function ipV4(): string;

    public function httpHost(): string;

    public function resolve(string $remote): string;
}
