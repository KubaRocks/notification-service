<?php
declare(strict_types = 1);

namespace Domain\Exception;

use InvalidArgumentException;

final class InvalidDeviceTokenException extends InvalidArgumentException
{
    public static function createWhenEmpty(): self
    {
        return new static('Device Token can\'t be empty');
    }
}
