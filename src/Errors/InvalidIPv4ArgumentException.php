<?php

declare(strict_types=1);


namespace Littledev\IPTools\Errors;

class InvalidIPv4ArgumentException extends InvalidArgumentException
{
    public static function address(string $address): self
    {
        return new self("Invalid IPv4 address: " . $address);
    }

    public static function binary(string $binaryString)
    {
        return new self("Invalid binary string, must be 32 long: " . $binaryString);
    }
}
