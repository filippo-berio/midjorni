<?php

namespace App\Auth\Entity;

class ConfirmationToken
{
    public function __construct(
        private string $email,
        private string $confirmationCode,
        private int    $retries,
    ) {
    }

    public function setConfirmationCode(string $confirmationCode): self
    {
        $this->confirmationCode = $confirmationCode;
        return $this;
    }

    public function decreaseRetries()
    {
        $this->retries--;
    }

    public function getConfirmationCode(): string
    {
        return $this->confirmationCode;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRetries(): int
    {
        return $this->retries;
    }
}
