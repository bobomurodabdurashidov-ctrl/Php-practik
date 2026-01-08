<?php

declare(strict_types=1);

namespace App\Component\User;

use Symfony\Component\Serializer\Annotation\Groups;

class FullNameDto
{
    public function __construct(
        #[Groups(['user:read', 'user:write'])]
        private string $firstName,
        #[Groups(['user:read', 'user:write'])]
        private string $lastName,
        #[Groups(['user:write'])]
        private string $isMarried,
    )
    {

    }

    public function getIsMarried(): string
    {
        return $this->isMarried;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }
}