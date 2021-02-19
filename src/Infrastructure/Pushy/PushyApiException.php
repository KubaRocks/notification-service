<?php
declare(strict_types = 1);

namespace Infrastructure\Pushy;

use RuntimeException;

final class PushyApiException extends RuntimeException
{
    public static function createWithApiResponse(string $response): self
    {
        return new static(
            sprintf('Error from PushyAPI: %s', $response)
        );
    }
}
