<?php

namespace App\Mapper;

use App\Cart\Model\CartItem;
use App\Entity\Product;

class CartItemMapper
{
    public static function ProductToCartItem(Product $product, int $quantity): CartItem
    {
        $cartItem = new CartItem(
            $product,
            $quantity,
            (float) $product->getPrice()
        );
        return $cartItem;
    }
}
