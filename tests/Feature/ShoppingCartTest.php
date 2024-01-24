<?php

use Eworkssk\ZadaniePhp\ShoppingCartItem;
use Eworkssk\ZadaniePhp\ShoppingCart;

test('add item to cart', function() {

    $shoppingCartItem = new ShoppingCartItem(10, "Tv LG", 550, 2);
    $shoppingCart = new ShoppingCart();

    $shoppingCart->add($shoppingCartItem);
    $shoppingCartItems = $shoppingCart->getItems();
    
    expect($shoppingCartItems)
        ->toBeArray()
        ->toHaveKey(10);

    // test if added item name equals Tv LG
    expect($shoppingCartItems[10]->name === "Tv LG")->toBeTrue();

    // test if added item price equals 550
    expect($shoppingCartItems[10]->price === 550.0)->toBeTrue();

    // test if added item quantity equals 2
    expect($shoppingCartItems[10]->quantity === 2)->toBeTrue();

});


test('remove item from cart', function() {

    $shoppingCartId = 10;

    $shoppingCartItem = new ShoppingCartItem($shoppingCartId, "Tv LG", 550, 2);
    $shoppingCart = new ShoppingCart();

    $shoppingCart->add($shoppingCartItem);
    $shoppingCart->remove($shoppingCartId);

    $shoppingCartItems = $shoppingCart->getItems();
    
    expect($shoppingCartItems)
        ->toBeEmpty()
        ->not->toHaveKey(10);
    
});


test('remove item from cart that does not exist in the cart, test throw exception', function() {

    $shoppingCartId = 10;

    $shoppingCart = new ShoppingCart();
    $shoppingCartItem = new ShoppingCartItem($shoppingCartId, "Tv LG", 550, 2);

    $shoppingCart->add($shoppingCartItem);
    $shoppingCart->remove(11);
  
    
})->throws(Exception::class, 'shoppingCartItemID input not found in the cart items');;


test('test cart total calculation', function() {

    $shoppingCart = new ShoppingCart();

    $shoppingCartItem1 = new ShoppingCartItem(12, "iPhone 12", 700, 2);
    $shoppingCartItem2 = new ShoppingCartItem(1, "Tv LG", 550, 2);
    $shoppingCartItem3 = new ShoppingCartItem(12, "iPhone 12", 700, 1);
    $shoppingCartItem4 = new ShoppingCartItem(7, "Sneakers Reebok", 50, 2);

    $shoppingCart->add($shoppingCartItem1);
    $shoppingCart->add($shoppingCartItem2);
    $shoppingCart->add($shoppingCartItem3);
    $shoppingCart->add($shoppingCartItem4);
    $shoppingCart->remove(7);

    $cartTotal = $shoppingCart->total();

    expect($cartTotal)
        ->toBeFloat()
        ->toEqual(3200);
    
});