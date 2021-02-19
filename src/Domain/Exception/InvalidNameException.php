<?php
declare(strict_types = 1);

namespace Domain\Exception;

use InvalidArgumentException;

final class InvalidNameException extends InvalidArgumentException
{
    public static function createWhenEmpty(): self
    {
        return new static('First Name can\'t be empty');
    }
}
