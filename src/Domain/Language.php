<?php
declare(strict_types = 1);

namespace Domain;

use Domain\Exception\InvalidLanguageException;

final class Language
{
    public const LANGUAGE_ENGLISH = 'en';
    public const LANGUAGE_RUSSIAN = 'ru';
    public const LANGUAGE_POLISH = 'pl';

    public const SUPPORTED_LANGUAGES = [
        self::LANGUAGE_ENGLISH,
        self::LANGUAGE_RUSSIAN,
        self::LANGUAGE_POLISH,
    ];

    private string $language;

    public function __construct(string $language)
    {
        if (!in_array($language, self::SUPPORTED_LANGUAGES, true)) {
            throw InvalidLanguageException::createWithLanguage($language);
        }
        $this->language = $language;
    }
}
