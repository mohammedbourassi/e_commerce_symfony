<?php

namespace App\Service;

interface CategoryServiceInterface
{
    public function getAllCategories(): array;
    public function getCategoryWithProducts(int $id): array;
}