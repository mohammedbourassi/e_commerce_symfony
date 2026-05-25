<?php

namespace App\Service;

use App\Entity\Product;

interface ProductServiceInterface
{
    public function getAllProducts(): array;

    public function getProductById(int $id): Product;
}
