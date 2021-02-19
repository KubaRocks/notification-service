<?php
declare(strict_types = 1);

namespace Infrastructure\Notifier;

use Domain\Device;
use Domain\Exception\SendingMessageException;
use Domain\Message;
use Domain\Notifier\PushNotifier;
use Infrastructure\Pushy\PushyApiException;
use Infrastructure\Pushy\PushyClientInterface;

final class PushyPushNotifier implements PushNotifier
{
    private PushyClientInterface $client;

    public function __construct(PushyClientInterface $client)
    {
        $this->client = $client;
    }

    public function send(Message $message): void
    {
        $devices = $message->getRecipient()->getDevices();

        try {
            array_walk(
                $devices,
                fn (Device $device) => $this->client->sendPushNotification(
                    ['message' => $message->getContent()],
                    (string) $device,
                    []
                )
            );
        } catch (PushyApiException $apiException) {
            // should be also logged
            throw SendingMessageException::createWithChannelAndMessage('push', $message);
        }
    }
}
