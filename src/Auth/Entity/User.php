<?php

namespace App\Auth\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;
use JsonSerializable;
use Symfony\Component\Security\Core\User\UserInterface;

#[Entity]
#[Table('users')]
class User implements UserInterface, JsonSerializable
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private ?int $id = null;

    #[Column(unique: true)]
    private string $email;

    #[OneToOne(mappedBy: 'user', cascade: ['persist'])]
    private ?RefreshToken $refreshToken = null;

    private string $accessToken;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getRefreshToken(): ?RefreshToken
    {
        return $this->refreshToken;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'email' => $this->getEmail(),
        ];
    }

    public function eraseCredentials()
    {
    }

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }
}
