<?php

namespace App\Auth\EventListener;

use App\Auth\Event\WrongConfirmationCodeEvent;
use App\Auth\Repository\BannedEmailRepository;
use App\Auth\Repository\ConfirmationTokenRepository;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener]
class WrongConfirmationCodeEventListener
{
    public function __construct(
        private ConfirmationTokenRepository $confirmationTokenRepository,
        private BannedEmailRepository       $bannedEmailRepository,
    ) {
    }

    public function __invoke(WrongConfirmationCodeEvent $event)
    {
        if ($event->confirmationToken->getRetries() === 0) {
            $this->bannedEmailRepository->banEmail($event->confirmationToken->getEmail());
            return;
        }
        $event->confirmationToken->decreaseRetries();
        $this->confirmationTokenRepository->save($event->confirmationToken);
    }
}
