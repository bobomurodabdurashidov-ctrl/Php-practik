<?php

declare(strict_types=1);

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\MediaObject;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class MediaObjectCreateProcessor implements ProcessorInterface
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly RequestStack $requestStack,
    ) {}

    public function process(
        mixed $data,
        Operation $operation,
        array $uriVariables = [],
        array $context = []
    ): MediaObject {
        $request = $this->requestStack->getCurrentRequest();

        if (!$request) {
            throw new BadRequestHttpException('Request not found');
        }

        $uploadedFile = $request->files->get('file');

        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        // 🔥 ENG MUHIM JOY
        $mediaObject = new MediaObject();
        $mediaObject->file = $uploadedFile;

        $this->em->persist($mediaObject);
        $this->em->flush();

        return $mediaObject;
    }
}
