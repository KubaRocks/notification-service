<?php
declare(strict_types = 1);

namespace Domain;

use Domain\Exception\InvalidDeviceTokenException;

final class Device
{
    private string $token;

    public function __construct(string $token)
    {
        if (empty($token)) {
            throw InvalidDeviceTokenException::createWhenEmpty();
        }
        $this->token = $token;
    }

    public function __toString(): string
    {
        return $this->token;
    }
}
