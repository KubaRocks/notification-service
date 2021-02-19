<?php
declare(strict_types = 1);

namespace Infrastructure\Notifier;

use Domain\Exception\SendingMessageException;
use Domain\Message;
use Domain\Notifier\EmailNotifier;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

final class MailerEmailNotifier implements EmailNotifier
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(Message $message): void
    {
        $email = (new Email())
            ->from('test@example.com')
            ->to((string) $message->getRecipient()->getEmail())
            ->subject($message->getSubject())
            ->text($message->getContent())
        ;

        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            // should also be logged
            throw SendingMessageException::createWithChannelAndMessage('email', $message);
        }
    }
}
