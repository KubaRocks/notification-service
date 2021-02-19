<?php
declare(strict_types = 1);

namespace App\Tests\Infrastructure\Notifier;

use Domain\Customer;
use Domain\Email;
use Domain\Message;
use Infrastructure\Notifier\MailerEmailNotifier;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Mailer\MailerInterface;

final class MailerEmailNotifierTest extends TestCase
{
    public function test_it_should_send_email(): void
    {
        // Given
        $mailer = $this->getMockBuilder(MailerInterface::class)->getMock();
        $notifier = new MailerEmailNotifier($mailer);
        $message = new Message(
            new Customer(
                'Test Customer',
                new Email('test@example.com')
            ),
            'subject',
            'content'
        );

        // Then
        $mailer->expects(self::once())
            ->method('send');

        // When
        $notifier->send($message);
    }
}
