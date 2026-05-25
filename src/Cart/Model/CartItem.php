<?php

namespace App\Cart\Model;

use App\Entity\Product;

class CartItem
{
    public function __construct(
        private Product $product,
        private int $quantity,
        private float $price
    ) {}

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }
    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function increaseQuantity(int $quantity = 1): void
    {
        $this->quantity += $quantity;
    }

    public function getTotal(): float
    {
        return $this->price * $this->quantity;
    }
}
