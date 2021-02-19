<?php
declare(strict_types = 1);

namespace Domain;

class Message
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
}
