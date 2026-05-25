<?php

namespace App\Cart\Service;

use App\Cart\Contract\CartInterface;
use App\Cart\Model\Cart;
use App\Cart\Model\CartItem;

class ApiCart implements CartInterface
{
    public function add(CartItem $item, Cart $cart): Cart
    {
        dd('API add', $item, $cart);
    }

    public function remove(CartItem $item, Cart $cart): Cart
    {
        dd('API remove', $item, $cart);
    }

    public function getCart(string $identifier): Cart
    {
        dd('API get cart', $identifier);
    }

    public function clearCart(string $identifier): void
    {
        dd('API clear cart', $identifier);
    }

    public function saveCart(Cart $cart, string $identifier): void
    {
        dd('API save cart', $cart, $identifier);
    }
}
