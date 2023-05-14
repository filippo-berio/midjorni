<?php

namespace App\Lib\Sms\Service\Provider;

class EmailSmsProvider implements SmsProviderInterface
{

    public function send(string $phone, string $text): void
    {
        dd($phone, $text);
    }

    public function getAlias(): string
    {
        return 'email';
    }
}
