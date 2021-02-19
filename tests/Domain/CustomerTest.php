<?php
declare(strict_types = 1);

namespace App\Tests\Domain;

use Domain\Customer;
use Domain\Email;
use Domain\Exception\InvalidNameException;
use Domain\Language;
use PHPUnit\Framework\TestCase;

final class CustomerTest extends TestCase
{
    public function test_it_should_fail_when_providing_empty_name(): void
    {
        // Then
        $this->expectException(InvalidNameException::class);

        // When
        new Customer(
            '',
            new Email('test@example.com'),
            Language::createEnglishLanguage(),
            null,
            null
        );
    }
}
