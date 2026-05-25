<?php

namespace App\Cart\Model;

class Cart
{
    private array $items = [];

    public function addItem(CartItem $item): void
    {
        $id = $item->getProduct()->getId();

        if (isset($this->items[$id])) {
            $this->items[$id]->increaseQuantity($item->getQuantity());
            return;
        }

        $this->items[$id] = $item;
    }

    public function removeItem(CartItem $item): void
    {
        $id = $item->getProduct()->getId();
        unset($this->items[$id]);
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotal(): float
    {
        return array_sum(
            array_map(fn($item) => $item->getTotal(), $this->items)
        );
    }
}
