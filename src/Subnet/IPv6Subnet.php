<?php

namespace Littledev\IPTools\Subnet;

use Littledev\IPTools\Address\IPv6Address;
use Littledev\IPTools\Errors\InvalidPrefixArgumentException;

class IPv6Subnet implements SubnetInterface
{
    public static function fromPrefix(int $prefix): self
    {
        if ($prefix < 0 || $prefix > self::MAX_IPv6) {
            throw InvalidPrefixArgumentException::invalidInput($prefix);
        }

        $subnet = new self();
        $subnet->prefix = $prefix;

        $binIP = str_repeat('1', $prefix) . str_repeat('0', self::MAX_IPv6 - $prefix);
        $subnet->subnet = IPv6Address::fromBinary($binIP);

        return $subnet;
    }

    private $prefix;
    private IPv6Address $subnet;

    private function __construct()
    { }

    public function prefix(): int
    {
        return $this->prefix;
    }

    public function inAddr(): string
    {
        return $this->subnet->inAddr();
    }

    public function byteArray(): array
    {
        return $this->subnet->byteArray();
    }

    public function __toString(): string
    {
        return (string)$this->subnet;
    }
}
