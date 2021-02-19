<?php
declare(strict_types = 1);

namespace App\Tests\Infrastructure\Notifier;

use Domain\Customer;
use Domain\Device;
use Domain\Email;
use Domain\Language;
use Domain\Message;
use Infrastructure\Notifier\PushyPushNotifier;
use Infrastructure\Pushy\PushyClientInterface;
use PHPUnit\Framework\TestCase;

class PushyPushNotifierTest extends TestCase
{
    public function test_it_should_send_push_notification(): void
    {
        // Given
        $pushyClient = $this->getMockBuilder(PushyClientInterface::class)->getMock();
        $notifier = new PushyPushNotifier($pushyClient);
        $customer = $this->provideCustomer();
        $message = new Message(
            $customer,
            'subject',
            'content'
        );

        // Then
        $pushyClient->expects(self::once())
            ->method('sendPushNotification');

        // When
        $notifier->send($message);
    }

    private function provideCustomer(): Customer
    {
        return new Customer(
            'Test Customer',
            new Email('test@example.com'),
            Language::createRussianLanguage(),
            null,
            ...[
                new Device('c01984bf-e6c5-4560-9dfc-e1cd468cb8d4')
            ]
        );
    }
}
