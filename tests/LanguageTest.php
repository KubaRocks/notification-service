<?php
declare(strict_types = 1);

namespace App\Tests;

use Domain\Exception\InvalidLanguageException;
use Domain\Language;
use PHPUnit\Framework\TestCase;

final class LanguageTest extends TestCase
{
    public function test_it_should_throw_exception_while_providing_not_supported_language(): void
    {
        // Then
        $this->expectException(InvalidLanguageException::class);

        // When
        new Language('invalid_language');
    }
}
