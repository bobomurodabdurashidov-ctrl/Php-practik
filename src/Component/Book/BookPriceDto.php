<?php

declare(strict_types=1);

namespace App\Component\Book;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class BookPriceDto
{
    public function __construct(
        #[Groups(['book:write'])]
        #[Assert\NotNull]
        #[Assert\Positive]
        public readonly float $price
    )
    {

    }
}