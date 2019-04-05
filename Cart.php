<?php

use \Services\SessionService;

/**
 * Singleton Shopping Cart
 *
 * Class Cart
 */
class Cart
{
    const SESSION_VAR_CART_ITEMS = 'cartItems';

    private static $instance;

    protected $sessionService;

    /**
     * Private Cart constructor so `new` operator can not be used on this outside this class
     */
    private function __construct()
    {
        $this->sessionService = new SessionService();
    }

    /**
     * Get the single instance of cart
     *
     * @return Cart
     */
    public static function getInstance()
    {
        if (!is_object(self::$instance)) {
            self::$instance = new Cart();
        }

        return self::$instance;
    }

    /**
     * @return array
     */
    public function getCartItems()
    {
        return $this->sessionService->get(self::SESSION_VAR_CART_ITEMS, []);
    }

    /**
     * Set cart items into the session
     *
     * @param array $cartItems
     */
    public function setCartItems($cartItems = [])
    {
        $this->sessionService->set(self::SESSION_VAR_CART_ITEMS, $cartItems);
    }
}
