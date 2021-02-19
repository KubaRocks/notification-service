<?php
declare(strict_types = 1);

namespace Domain\Exception;

use Domain\Language;
use InvalidArgumentException;

final class InvalidLanguageException extends InvalidArgumentException
{
    public static function createWithLanguage(string $language): self
    {
        return new static(
            sprintf(
                "'%s' is not supported language in this application. Try one of this: %s",
                $language,
                implode(', ', Language::SUPPORTED_LANGUAGES)
            )
        );
    }
}
