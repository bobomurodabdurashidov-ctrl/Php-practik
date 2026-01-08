<?php

declare(strict_types=1);

namespace App\State\Category;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Component\Category\CategoryFactory;
use App\Component\Category\CategoryManager;

class CategoryCreateProcessor implements ProcessorInterface
{
    public function __construct(
        private CategoryFactory $categoryFactory,
        private readonly CategoryManager $categoryManager,
    ) {}
    public function process(mixed $data, Operation $operation,array $uriVariables = [],array $context = []): mixed
    {
        $category = $this->categoryFactory->create($data->getName());
        $this->categoryManager->save($category, true);
        return $category;
    }
}
