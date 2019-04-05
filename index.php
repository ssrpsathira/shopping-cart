<?php require_once("Autoloader.php"); ?>

<?php

use Services\ProductDataService;
use Services\CartService;

$productService = new ProductDataService();
$products = $productService->getProducts();
$cart = Cart::getInstance();
$cartItems = $cart->getCartItems();
$cartService = new CartService();

?>

<html>

<head>
    <title>Shopping Cart</title>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="Resources/js/main.js"></script>

    <link rel="stylesheet" type="text/css" href="Resources/styles/main.css">
</head>

<body>
<h1>Products</h1>
<table>
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php foreach($products as $product): ?>
        <tr>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo number_format((float)$product['price'], 2, '.', ''); ?></td>
            <td>
                <button type="button" onclick="addProductToCart('<?php echo $product['name']; ?>')">Add</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h1>Shopping Cart</h1>
<table>
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Sub Total</th>
        <th>Action</th>
    </tr>
    <?php foreach($cartItems as $cartItem): ?>
        <tr>
            <td><?php echo $cartItem['name']; ?></td>
            <td><?php echo number_format((float)$cartItem['price'], 2, '.', ''); ?></td>
            <td><?php echo $cartItem['quantity']; ?></td>
            <td><?php echo number_format((float)$cartItem['price'] * $cartItem['quantity'], 2, '.', ''); ?></td>
            <td>
                <button type="reset" onclick="removeProductFromCart('<?php echo $cartItem['name']; ?>')">Remove</button>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Total&nbsp;&ndash;&nbsp;<?php echo number_format((float)$cartService->getTotalValue(), 2, '.', ''); ?></strong></td>
        <td></td>
    </tr>
</table>
</body>

</html>
