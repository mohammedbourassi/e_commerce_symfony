<?php

namespace App\Service;

use App\Repository\CategoryRepository;
use App\Service\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    public function __construct(private CategoryRepository $categoryRepository) {}
    public function getAllCategories(): array
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function getCategoryWithProducts(int $id): array
    {
        return $this->categoryRepository->findCategoryWithProductById($id);
    }


}