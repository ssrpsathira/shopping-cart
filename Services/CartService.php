<?php

namespace Services;

use Cart;

/**
 * Implements the service functions related to the Cart object
 *
 * Class CartService
 * @package Services
 */
class CartService
{
    protected $productService;
    protected $cart;

    /**
     * CartService constructor.
     */
    public function __construct()
    {
        $this->productService = new ProductDataService();
        $this->cart = Cart::getInstance();
    }

    /**
     * Add single product into the cart by product name
     *
     * @param $productName
     * @return bool
     * @throws \Exception
     */
    public function addProductToCart($productName)
    {
        $product = $this->isValidProduct($productName);

        $cartItemUpdated = false;
        $cartItems = $this->cart->getCartItems();

        foreach ($cartItems as &$cartItem) {
            if ($cartItem['name'] === $productName) {
                $cartItem['quantity'] += 1;
                $cartItemUpdated = true;

                break;
            }
        }

        if (!$cartItemUpdated) {
            $product['quantity'] = 1;
            $cartItems[] = $product;
        }

        $this->cart->setCartItems($cartItems);

        return true;
    }

    /**
     * Remove a product from the cart by the product name
     *
     * @param $productName
     * @return bool
     * @throws \Exception
     */
    public function removeProductFromCart($productName)
    {
        $this->isValidProduct($productName);

        $cartItems = $this->cart->getCartItems();

        foreach ($cartItems as $key => $cartItem) {
            if ($cartItem['name'] === $productName) {
                unset($cartItems[$key]);

                break;
            }
        }

        $this->cart->setCartItems($cartItems);

        return true;
    }

    /**
     * Get the total value of the cart content
     *
     * @return float
     */
    public function getTotalValue()
    {
        $totalValue = 0.0;
        $cartItems = $this->cart->getCartItems();

        foreach ($cartItems as $cartItem) {
            $totalValue += $cartItem['price'] * $cartItem['quantity'];
        }

        return $totalValue;
    }

    /**
     * Validate the product by the product name and return the product details if found
     *
     * @param $productName
     * @return bool|mixed
     * @throws \Exception
     */
    protected function isValidProduct($productName)
    {
        if (!($product = $this->productService->getProductByProductName($productName))) {

            throw new \Exception('Product not found');
        }

        return $product;
    }
}
