<?php
declare(strict_types = 1);

namespace Domain\Exception;

use InvalidArgumentException;

final class InvalidPhoneNumberException extends InvalidArgumentException
{
    public static function createWhenEmpty(): self
    {
        return new static('Phone Number can\'t be empty');
    }
}
