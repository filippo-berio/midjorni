<?php

namespace App\Api\Request\Auth;

use App\Api\Request\RequestInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class ConfirmCodeRequest implements RequestInterface
{
    #[NotBlank]
    public ?string $email;

    #[NotBlank]
    public ?string $code;
}
