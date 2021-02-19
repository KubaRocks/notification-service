<?php
declare(strict_types = 1);

namespace Domain\Exception;

use Domain\Message;
use RuntimeException;

final class SendingMessageException extends RuntimeException
{
    public static function createWithChannelAndMessage(string $channel, Message $message): self
    {
        return new static(
            sprintf(
                'Message "%s" could not be delivered to %s over %s',
                $message->getSubject(),
                (string) $message->getRecipient(),
                $channel
            )
        );
    }
}
