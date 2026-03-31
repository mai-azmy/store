<?php
include '../inc/db.php';
include '../inc/header.php';
?>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // حفظ البيانات في ملف
    $data = "Name: $name | Email: $email | Message: $message\n";
    file_put_contents("messages.txt", $data, FILE_APPEND);

    $success = "Message sent successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2>Contact Us</h2>

  <?php if (!empty($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

  <form method="POST" action="">
    
    <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>

    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

    <textarea name="message" class="form-control mb-3" placeholder="Message" required></textarea>

    <button class="btn btn-primary">Send</button>

  </form>
</div>
<script src="../js/contact.js"></script>
</body>
</html>
<?php include '../inc/footer.php'; ?>