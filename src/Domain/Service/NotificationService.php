<?php
declare(strict_types = 1);

namespace Domain\Service;

use Application\Command\NotifyViaEmail;
use Application\Command\NotifyViaPush;
use Application\CQRS\CommandBus;
use Domain\Message;

final class NotificationService
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function sendMessage(Message $message): void
    {
        $this->commandBus->dispatch(new NotifyViaEmail($message));
        $recipient = $message->getRecipient();

        if ($recipient->canNotifyViaPush()) {
            $this->commandBus->dispatch(new NotifyViaPush($message));
        }
    }
}
