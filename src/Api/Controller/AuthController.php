<?php

namespace App\Api\Controller;

use App\Api\Controller\BaseController;
use App\Api\Request\Auth\ConfirmCodeRequest;
use App\Api\Request\Auth\SendConfirmCodeRequest;
use App\Auth\UseCase\UserConfirmation\ConfirmCodeUseCase;
use App\Auth\UseCase\UserConfirmation\SendConfirmationCodeUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends BaseController
{
    #[Route('/send-code', methods: ['POST'])]
    public function sendConfirmationCode(
        SendConfirmCodeRequest $body,
        SendConfirmationCodeUseCase $useCase,
    ): JsonResponse {
        $this->validator->validate($body);
        $useCase->send($body->email);
        return $this->json([
            'success' => true
        ]);
    }

    #[Route('/confirm-code', methods: ['POST'])]
    public function confirmCode(
        ConfirmCodeRequest $body,
        ConfirmCodeUseCase $useCase,
    ): JsonResponse {
        $result = $useCase->confirm($body->email, $body->code);
        return $this->json($result);
    }
}
