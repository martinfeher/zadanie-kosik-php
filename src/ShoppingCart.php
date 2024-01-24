<?php

namespace Eworkssk\ZadaniePhp;

class ShoppingCart implements ShoppingCartInterface
{
    private array $cartItems = array();

    /**
     * Add ShoppingCartItem instance to cart
     */
    public function add(ShoppingCartItem $shoppingCartItem) : void {

        if (!isset($this->cartItems[$shoppingCartItem->id])) {
            $this->cartItems[$shoppingCartItem->id] = $shoppingCartItem;
        } else {
            $this->cartItems[$shoppingCartItem->id]->quantity += $shoppingCartItem->quantity;
        }
    }
    
    /**
     * Remove ShoppingCartItem from cart by ID
     * Throws exception if item not found in cart
     */
    public function remove(int $shoppingCartItemID) : void {

        if (isset($this->cartItems[$shoppingCartItemID])) {
            unset($this->cartItems[$shoppingCartItemID]);
        } else {
            throw new \Exception('shoppingCartItemID input not found in the cart items');
        }
      
    }

    /**
     * Return total price of all items in cart
     */
    public function total() : float {

        $totalSum = 0;
        foreach ($this->cartItems as $cartItem) {
            $totalSum += $cartItem->quantity * $cartItem->price;
        }
        return $totalSum;
    }
    
    /**
     * Return array of all cart items
     * @return ShoppingCartItem[]
     */
    public function getItems() : array {
        return $this->cartItems;
    }

}