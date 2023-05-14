<?php

namespace App\Lib\Sms\Service\Provider;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailSmsProvider implements SmsProviderInterface
{

    public function __construct(
        private MailerInterface $mailer,
    ) {
    }

    public function send(string $email, string $text): void
    {
        $emailMessage = new Email();
        $emailMessage
            ->from('fizzymarket.vintage@gmail.com')
            ->to($email)
            ->subject('Код подтверждения')
            ->text($text)
        ;
        $this->mailer->send($emailMessage);
    }

    public function getAlias(): string
    {
        return 'email';
    }
}
