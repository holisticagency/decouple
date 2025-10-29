<?php

declare(strict_types=1);

/*
 * This file is part of holistic-agency/decouple.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Decouple;

interface NetworkInterface
{
    public function hostname(): string;

    public function ipV4(): string;

    public function httpHost(): string;

    /**
     * @return array<string,string>
     */
    public function remotes(): array;

    public function resolve(string $remote): string;

    /**
     * @param array<mixed>|null $authoritative_name_servers
     * @param-out mixed $authoritative_name_servers
     * @param array<mixed>|null $additional_records
     * @param-out mixed $additional_records
     *
     * @return array<mixed>|false
     */
    public function dnsGetRecord(
        string $hostname,
        int $type = \DNS_ANY,
        ?array &$authoritative_name_servers = null,
        ?array &$additional_records = null,
        bool $raw = false
    ): array|false;
}
