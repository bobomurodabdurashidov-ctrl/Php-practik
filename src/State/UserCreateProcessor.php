<?php

declare(strict_types=1);

namespace App\State;

use App\Component\User\UserFactory;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Component\User\UserManager;
use App\Entity\User;


class UserCreateProcessor implements ProcessorInterface
{
    public function __construct(
        private UserFactory $userFactory,
        private readonly UserManager $userManager,
    ) {}

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): mixed
    {
        /** @var User $data */
        $user = $this->userFactory->create(
            $data->getEmail(),
            $data->getPassword(),
            $data->getAge(),
            $data->getGender(),
            $data->getPhone()
        );

        $this->userManager->save($user, true);


//        print_r($user);
        return $user;
    }
}


