<?php
include '../inc/db.php';
include '../inc/header.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container my-5">
    <h2 class="mb-4 text-center">All Products</h2>
    
    <!-- Search Bar -->
    <div class="row mb-4 justify-content-center">
        <div class="col-12 col-md-6">
            <input type="text" id="searchInput" class="form-control" placeholder="Search products...">
        </div>
    </div>

    <!-- Products Grid -->
    <div class="row" id="productsGrid">
        <?php
        $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($products as $row){
            // التعامل مع امتداد الصورة
            $base_name = pathinfo($row['image'], PATHINFO_FILENAME);
            $found_image = '';
            foreach(['jpg','png','jpeg','webp','gif','avif'] as $ext){
                if(file_exists("../images/$base_name.$ext")){
                    $found_image = "$base_name.$ext"; break;
                }
            }
            if(!$found_image) $found_image='default.png';
        ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 product-card-wrapper">
            <div class="card h-100 shadow-sm hover-shadow">
                <img src="../images/<?php echo $found_image; ?>" class="card-img-top" style="height:200px; object-fit:cover;">
                <div class="card-body text-center">
                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                    <p class="text-primary"><?php echo $row['price']; ?> EGP</p>
                    <a href="product-details.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-dark btn-sm mb-2">View Details</a>
                    <button class="btn btn-success btn-sm"
                        onclick="addToCart(<?php echo $row['id']; ?>,'<?php echo $row['name']; ?>',<?php echo $row['price']; ?>)">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<script src="../js/products.js"></script>
<script src="../js/cart.js"></script>

</body>
</html>
<?php
include '../inc/footer.php';
?>