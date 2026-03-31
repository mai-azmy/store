<?php 
include '../inc/db.php';
include '../inc/header.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container my-5">
    <h2 class="text-center mb-4">Your Cart 🛒</h2>

    <!-- المنتجات -->
    <div id="cartContainer" class="row"></div>

    <!-- الإجمالي -->
    <div class="text-end mt-4">
        <h4>Total: <span id="cartTotal">0</span> EGP</h4>
        <a href="checkout.php" class="btn btn-success mt-3">Proceed to Checkout</a>
    </div>
</div>

<script src="../js/cart.js"></script>
</body>
</html>

<?php include '../inc/footer.php'; ?>