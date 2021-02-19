<?php
declare(strict_types = 1);

namespace App\Tests\Domain;

use Domain\Email;
use Domain\Exception\InvalidEmailException;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    public function test_it_should_throw_exception_while_providing_invalid_email(): void
    {
        // Then
        $this->expectException(InvalidEmailException::class);

        // When
        new Email('invalid_email_value');
    }
}
