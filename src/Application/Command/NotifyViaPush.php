<?php
declare(strict_types = 1);

namespace Application\Command;

use Application\CQRS\Command;
use Domain\Message;

final class NotifyViaPush implements Command
{
    private Message $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }
}
