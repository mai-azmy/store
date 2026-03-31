<?php
include '../inc/db.php';
include '../inc/header.php';
?>

<div class="container my-5">
    <h2 class="text-center mb-4">Checkout 🛒</h2>

    <table class="checkout-table table table-bordered w-100">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price (EGP)</th>
                <th>Quantity</th>
                <th>Subtotal (EGP)</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody id="checkoutBody"></tbody>
    </table>

    <div class="text-end mt-3">
        <h4>Total: <span id="checkoutTotal">0</span> EGP</h4>
        <button id="placeOrder" class="btn btn-success mt-3">Place Order</button>
    </div>
</div>

<link rel="stylesheet" href="../css/style.css">
<script src="../js/checkout.js"></script>

<?php include '../inc/footer.php'; ?>