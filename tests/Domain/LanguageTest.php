<?php
declare(strict_types = 1);

namespace App\Tests\Domain;

use Domain\Exception\InvalidLanguageException;
use Domain\Language;
use PHPUnit\Framework\Assert;
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

    public function test_it_should_create_object_from_factory_methods(): void
    {
        // When
        $english = Language::createEnglishLanguage();
        $russian = Language::createRussianLanguage();
        $polish = Language::createPolishLanguage();

        // Then
        Assert::assertInstanceOf(Language::class, $english);
        Assert::assertInstanceOf(Language::class, $russian);
        Assert::assertInstanceOf(Language::class, $polish);
    }
}
