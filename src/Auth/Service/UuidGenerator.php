<?php

namespace App\Auth\Service;

use Symfony\Component\Uid\Uuid;

class UuidGenerator
{
    public function generate(): string
    {
        return Uuid::v4()->toRfc4122();
    }

    public function generateShort(): string
    {
        $parts = explode('-', $this->generate());
        return array_pop($parts);
    }
}
