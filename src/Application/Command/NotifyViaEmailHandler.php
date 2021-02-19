<?php
declare(strict_types = 1);

namespace Application\Command;

use Application\CQRS\CommandHandler;
use Domain\Notifier\EmailNotifier;

final class NotifyViaEmailHandler implements CommandHandler
{
    private EmailNotifier $notifier;

    public function __construct(EmailNotifier $notifier)
    {
        $this->notifier = $notifier;
    }

    public function __invoke(NotifyViaEmail $command)
    {
        $this->notifier->send($command->getMessage());
    }
}
