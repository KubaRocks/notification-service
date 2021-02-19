<?php
declare(strict_types = 1);

namespace App\Tests;

use Domain\Exception\InvalidPhoneNumberException;
use Domain\PhoneNumber;
use PHPUnit\Framework\TestCase;

final class PhoneNumberTest extends TestCase
{
    public function test_it_should_throw_exception_when_providing_empty_string(): void
    {
        // Then
        $this->expectException(InvalidPhoneNumberException::class);

        // When
        new PhoneNumber('');
    }
}
