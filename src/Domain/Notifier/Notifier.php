<?php
declare(strict_types = 1);

namespace Domain\Notifier;

use Domain\Message;

interface Notifier
{
    public function send(Message $message): void;
}
