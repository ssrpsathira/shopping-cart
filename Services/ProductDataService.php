<?php

namespace Services;

/**
 * Implements the service functions related to the available products
 *
 * Class ProductDataService
 * @package Services
 */
class ProductDataService
{
    /** @var array Products array */
    protected $products;

    /**
     * ProductDataService constructor.
     */
    public function __construct()
    {
        // ######## please do not alter the following code ########
        $this->products = [
            ["name" => "Sledgehammer", "price" => 125.75],
            ["name" => "Axe", "price" => 190.50],
            ["name" => "Bandsaw", "price" => 562.131],
            ["name" => "Chisel", "price" => 12.9],
            ["name" => "Hacksaw", "price" => 18.45],
        ];
        // ########################################################
    }

    /**
     * Get products
     *
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Get product details by the product name
     *
     * @param $productName
     * @return bool|array
     */
    public function getProductByProductName($productName)
    {
        foreach ($this->products as $product) {
            if ($product['name'] === $productName) {

                return $product;
            }
        }

        return false;
    }
}
