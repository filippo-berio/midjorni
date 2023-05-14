<?php

namespace App\Lib\Sms\Service\Provider;

interface SmsProviderInterface
{
    public function send(string $email, string $text): void;

    public function getAlias(): string;
}
