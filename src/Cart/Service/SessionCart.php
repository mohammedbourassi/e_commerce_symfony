<?php

namespace App\Cart\Service;

use App\Cart\Contract\CartInterface;
use App\Cart\Model\Cart;
use App\Cart\Model\CartItem;
use Symfony\Component\HttpFoundation\RequestStack;

class SessionCart implements CartInterface
{
    private $session;

    public function __construct(RequestStack $requestStack)
    {
        $this->session = $requestStack->getSession();
    }

    public function add(CartItem $item, Cart $cart): Cart
    {
        $cart->addItem($item);
        return $cart;
    }

    public function remove(CartItem $item, Cart $cart): Cart
    {
        $cart->removeItem($item);
        return $cart;
    }

    public function getCart(string $identifier): Cart
    {
        return $this->session->get('cart_'.$identifier, new Cart());
    }

    public function clearCart(string $identifier): void
    {
        $this->session->remove('cart_'.$identifier);
    }

    public function saveCart(Cart $cart, string $identifier): void
    {
        $this->session->set('cart_'.$identifier, $cart);
    }
}