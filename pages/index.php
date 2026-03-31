<?php
include '../inc/db.php';
include '../inc/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <!-- Hero Section -->
<section class="hero text-white text-center d-flex align-items-center">
  <div class="container">
    <h1>Welcome to My Store</h1>
    <p>Best Clothes, Accessories & Mobiles</p>
  </div>
</section>

<!-- Products Grid -->
<div class="container my-5">
  <div class="row">
    <?php
    // PDO query
    $stmt = $pdo->query("SELECT * FROM products LIMIT 8");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($products as $row){
    ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card product-card h-100">
        <!-- <img src="../images/<?php echo $row['image']; ?>" class="card-img-top"> -->
         <?php
// اسم الصورة بدون امتداد
$base_name = pathinfo($row['image'], PATHINFO_FILENAME);
$found_image = '';

// جربنا الامتدادات الممكنة
$extensions = ['jpg','png','jpeg','webp','gif','avif'];

foreach($extensions as $ext){
    if(file_exists("../images/$base_name.$ext")){
        $found_image = "$base_name.$ext";
        break;
    }
}

// إذا ما لاقاش الصورة ممكن تحطي صورة افتراضية
if(!$found_image) $found_image = 'default.png';
?>

<img src="../images/<?php echo $found_image; ?>" class="card-img-top">
        <div class="card-body text-center">
          <h5><?php echo $row['name']; ?></h5>
          <p><?php echo $row['price']; ?> EGP</p>
          <a href="product-details.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-dark btn-sm">View Details</a>
          <button class="btn btn-primary btn-sm mt-2"
            onclick="addToCart(<?php echo $row['id']; ?>,'<?php echo $row['name']; ?>',<?php echo $row['price']; ?>)">
            Add to Cart
          </button>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<script src="../js/cart.js"></script>
</body>
</html>

<?php include '../inc/footer.php'; ?>