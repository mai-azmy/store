<?php
include '../inc/db.php';
include '../inc/header.php';

// جلب ID المنتج من الرابط
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];

    // PDO Prepared Statement لجلب بيانات المنتج
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$product){
        echo "<div class='container my-5'><h3>Product not found!</h3></div>";
        exit;
    }

    // التعامل مع ِامتداد الصورة
    $base_name = pathinfo($product['image'], PATHINFO_FILENAME);
    $found_image = '';
    $extensions = ['jpg','png','jpeg','webp','gif','avif'];
    foreach($extensions as $ext){
        if(file_exists("../images/$base_name.$ext")){
            $found_image = "$base_name.$ext";
            break;
        }
    }
    if(!$found_image) $found_image = 'default.png';

} else {
    echo "<div class='container my-5'><h3>Invalid Product!</h3></div>";
    exit;
}
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
    <div class="row">
        <!-- صورة المنتج -->
        <div class="col-12 col-md-6 mb-4">
            <div class="product-image text-center">
                <img src="../images/<?php echo $found_image; ?>" class="img-fluid rounded shadow-lg" style="max-height:400px; object-fit:cover;">
            </div>
        </div>

        <!-- تفاصيل المنتج -->
        <div class="col-12 col-md-6">
            <h2 class="mb-3"><?php echo $product['name']; ?></h2>
            <h4 class="text-primary mb-3"><?php echo $product['price']; ?> EGP</h4>
            <p class="mb-4"><?php echo $product['description']; ?></p>

            <button class="btn btn-success btn-lg"
                onclick="addToCart(<?php echo $product['id']; ?>,'<?php echo $product['name']; ?>',<?php echo $product['price']; ?>)">
                Add to Cart
            </button>
        </div>
    </div>
</div>

<!-- Optional: Related Products / Animation -->
<div class="container my-5">
    <h4 class="mb-4">Related Products</h4>
    <div class="row">
        <?php
        $stmt2 = $pdo->prepare("SELECT * FROM products WHERE category = ? AND id != ? LIMIT 4");
        $stmt2->execute([$product['category'], $product['id']]);
        $related = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        foreach($related as $r){
            $base = pathinfo($r['image'], PATHINFO_FILENAME);
            $img = '';
            foreach(['jpg','png','jpeg','webp','gif'] as $ext){
                if(file_exists("../images/$base.$ext")){
                    $img = "$base.$ext"; break;
                }
            }
            if(!$img) $img='default.png';
        ?>
        <div class="col-6 col-md-3 mb-4">
            <div class="card h-100 hover-shadow">
                <img src="../images/<?php echo $img; ?>" class="card-img-top" style="height:150px; object-fit:cover;">
                <div class="card-body text-center">
                    <h6><?php echo $r['name']; ?></h6>
                    <p class="text-primary"><?php echo $r['price']; ?> EGP</p>
                    <a href="product-details.php?id=<?php echo $r['id']; ?>" class="btn btn-outline-dark btn-sm">View</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>


<?php include '../inc/footer.php'; ?>
   <script src="../js/cart.js"></script> 
</body>
</html>