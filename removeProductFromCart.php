<?php

require_once('Autoloader.php');

use Services\CartService;

$productName = $_POST['product'] ?? '';
$cartService = new CartService();
$cartService->removeProductFromCart($productName);