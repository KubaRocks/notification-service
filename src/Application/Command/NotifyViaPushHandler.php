<?php
declare(strict_types = 1);

namespace Application\Command;

use Application\CQRS\CommandHandler;
use Domain\Notifier\PushNotifier;

final class NotifyViaPushHandler implements CommandHandler
{
    private PushNotifier $notifier;

    public function __construct(PushNotifier $notifier)
    {
        $this->notifier = $notifier;
    }

    public function __invoke(NotifyViaPush $command)
    {
        $this->notifier->send($command->getMessage());
    }
}
