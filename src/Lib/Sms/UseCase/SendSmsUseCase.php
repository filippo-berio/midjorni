<?php

namespace App\Lib\Sms\UseCase;

use App\Lib\Sms\Message\SmsMessage;
use App\Lib\Sms\Service\SmsService;
use Symfony\Component\Messenger\MessageBusInterface;

class SendSmsUseCase
{
    public function __construct(
        private readonly SmsService $smsService,
    ) {
    }

    public function send(string $phone, string $text)
    {
        $this->smsService->sendSms($phone, $text);
    }
}
