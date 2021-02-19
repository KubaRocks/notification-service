<?php
declare(strict_types = 1);

namespace Domain;

final class Message
{
    private Customer $recipient;

    private string $subject;

    private string $content;

    public function __construct(Customer $recipient, string $subject, string $content)
    {
        $this->recipient = $recipient;
        $this->subject = $subject;
        $this->content = $content;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getRecipient(): Customer
    {
        return $this->recipient;
    }
}
