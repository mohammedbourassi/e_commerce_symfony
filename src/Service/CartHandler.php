<?php

namespace App\Service;

use App\Cart\Contract\CartInterface;
use App\Cart\Model\Cart;
use App\Cart\Model\CartItem;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class CartHandler implements CartHandlerInterface
{
    public function __construct(
        #[Autowire(service: 'App\Cart\Service\SessionCart')]
        private CartInterface $cartService
    ) {}

    public function addItem(CartItem $item, string $identifier): Cart
    {
        $cart = $this->cartService->getCart($identifier);
        $cart = $this->cartService->add($item, $cart);
        $this->cartService->saveCart($cart, $identifier);
        return $cart;
    }

    public function removeItem(CartItem $item, string $identifier): Cart
    {
        $cart = $this->cartService->getCart($identifier);
        $cart = $this->cartService->remove($item, $cart);
        $this->cartService->saveCart($cart, $identifier);
        return $cart;
    }

    public function clearCart(string $identifier): void
    {
        $this->cartService->clearCart($identifier);
    }

    public function getCart(string $identifier): Cart
    {
        return $this->cartService->getCart($identifier);
    }
}
