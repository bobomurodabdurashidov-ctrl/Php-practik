<?php

declare(strict_types=1);

namespace App\Component\Category;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;

class CategoryManager
{
    public function __construct(private EntityManagerInterface $em)
    {

    }

    public function save(Category $category, bool $flush = false): void
    {
        $this->em->persist($category);
        if ($flush) {
            $this->em->flush();
        }
    }

    public  function remove(Category $category, bool $flush = false): void
    {
        $this->em->remove($category);
        if ($flush) {
            $this->em->flush();
        }
    }
}