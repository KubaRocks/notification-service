<?php
declare(strict_types = 1);

namespace Domain;

final class User
{
    private string $firstName;

    private string $lastName;

    private Email $email;

    private Language $languagePreference;
}
