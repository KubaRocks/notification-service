<?php
declare(strict_types = 1);

namespace Domain;

use Domain\Exception\InvalidPhoneNumberException;

final class PhoneNumber
{
    private string $phoneNumber;

    public function __construct(string $phoneNumber)
    {
        if (empty($phoneNumber)) {
            throw InvalidPhoneNumberException::createWhenEmpty();
        }

        $this->phoneNumber = $phoneNumber;
    }
}
