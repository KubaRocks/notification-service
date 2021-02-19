<?php
declare(strict_types = 1);

namespace Infrastructure\Pushy;

interface PushyClientInterface
{
    public function sendPushNotification(array $data, string $to, array $options): void;
}
