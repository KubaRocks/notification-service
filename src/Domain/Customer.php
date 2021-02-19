<?php
declare(strict_types = 1);

namespace Domain;

use Domain\Exception\InvalidNameException;

final class Customer
{
    private string $name;

    private Email $email;

    private ?PhoneNumber $phoneNumber;

    /** @var Device[] */
    private ?array $devices;

    private Language $languagePreference;

    public function __construct(
        string $name,
        Email $email,
        ?Language $language,
        ?PhoneNumber $phoneNumber,
        ?Device ...$devices
    ) {
        if (empty($name)) {
            throw InvalidNameException::createWhenEmpty();
        }

        $this->name = $name;
        $this->email = $email;
        $this->languagePreference = $language ?? new Language(Language::LANGUAGE_ENGLISH);
        $this->phoneNumber = $phoneNumber;
        $this->devices = $devices;
    }
}
