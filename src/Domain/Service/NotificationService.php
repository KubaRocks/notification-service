<?php
declare(strict_types = 1);

namespace Domain\Service;

use Application\Command\NotifyViaEmail;
use Application\Command\NotifyViaPush;
use Application\CQRS\CommandBus;
use Domain\Customer;
use Domain\Message;

final class NotificationService
{
    private const CHANNEL_EMAIL = 'email';
    private const CHANNEL_PUSH = 'push';
    private const CHANNEL_SMS = 'sms';

    private const CHANNELS = [
        self::CHANNEL_EMAIL => true,
        self::CHANNEL_PUSH => true,
        self::CHANNEL_SMS => false,
    ];

    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function sendMessage(Message $message): void
    {
        if ($this->canSendViaEmail()) {
            $this->commandBus->dispatch(new NotifyViaEmail($message));
        }

        $recipient = $message->getRecipient();

        if ($this->canSendViaPush($recipient)) {
            $this->commandBus->dispatch(new NotifyViaPush($message));
        }
    }

    private function canSendViaPush(Customer $recipient): bool
    {
        return $recipient->canNotifyViaPush() && self::CHANNELS[self::CHANNEL_PUSH];
    }

    private function canSendViaEmail(): bool
    {
        return self::CHANNELS[self::CHANNEL_EMAIL];
    }

    private function canSendViaSms(Customer $recipient): bool
    {
        return $recipient->canNotifyViaSms() && self::CHANNELS[self::CHANNEL_SMS];
    }
}
