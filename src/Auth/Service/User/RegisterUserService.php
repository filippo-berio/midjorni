<?php

namespace App\Auth\Service\User;

use App\Auth\Command\User\Save\SaveUser;
use App\Auth\Entity\User;
use App\Lib\CQRS\Bus\CommandBusInterface;

class RegisterUserService
{
    public function __construct(
        private CommandBusInterface $commandBus
    ) {
    }

    public function register(string $email): User
    {
        $user = new User($email);
        return $this->commandBus->execute(new SaveUser($user));
    }
}
