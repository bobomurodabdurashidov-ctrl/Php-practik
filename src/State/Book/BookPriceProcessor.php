<?php

declare(strict_types=1);

namespace App\State\Book;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Component\Book\BookPriceDto;

final class BookPriceProcessor implements ProcessorInterface
{
    public function process(
        mixed $data,
        Operation $operation,
        array $uriVariables = [],
        array $context = []
    ): BookPriceDto {
        /** @var BookPriceDto $data */

        // hozircha shunchaki qaytaramiz
        return $data;
    }
}
