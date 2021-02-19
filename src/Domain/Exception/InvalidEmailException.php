<?php
declare(strict_types = 1);

namespace Domain\Exception;

use InvalidArgumentException;

final class InvalidEmailException extends InvalidArgumentException
{
    public static function createWithEmail(string $email): self
    {
        return new static(
            sprintf("'%s' is not valid email address", $email)
        );
    }
}
