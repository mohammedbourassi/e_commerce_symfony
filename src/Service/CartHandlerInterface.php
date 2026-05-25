<?php

namespace App\Service;

use App\Cart\Model\Cart;
use App\Cart\Model\CartItem;

interface CartHandlerInterface
{
    public function addItem(CartItem $item, string $identifier): Cart;
    public function removeItem(CartItem $item, string $identifier): Cart;
    public function clearCart(string $identifier): void;
    public function getCart(string $identifier): Cart;
}