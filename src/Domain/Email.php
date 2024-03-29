<?php
declare(strict_types = 1);

namespace Domain;

use Domain\Exception\InvalidEmailException;

final class Email
{
    private string $email;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw InvalidEmailException::createWithEmail($email);
        }
        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
