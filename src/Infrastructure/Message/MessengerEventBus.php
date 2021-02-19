<?php
declare(strict_types = 1);

namespace Infrastructure\Message;

use Application\Message\Event;
use Application\Message\EventBus;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerEventBus implements EventBus
{
    private MessageBusInterface $eventBus;

    public function __construct(MessageBusInterface $eventBus)
    {
        $this->eventBus = $eventBus;
    }

    public function dispatch(Event $event): void
    {
        $this->eventBus->dispatch($event);
    }
}
