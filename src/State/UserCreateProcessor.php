<?php

declare(strict_types=1);

namespace App\State;

use App\Component\User\UserFactory;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\User;
//use Symfony\Component\DependencyInjection\Attribute\AsService;

//#[AsService]


use Doctrine\ORM\EntityManagerInterface;

class UserCreateProcessor implements ProcessorInterface
{
    public function __construct(
        private EntityManagerInterface $em,
        private UserFactory $userFactory
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

        $this->em->persist($user);
        $this->em->flush();

//        print_r($data);
        return $user;
    }
}


