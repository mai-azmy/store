
<?php
$db_username = 'root';
$db_password = '';
$db_name = 'my_store';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=$db_name;charset=utf8", $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Fatal Error: Connection Failed! " . $e->getMessage());
}
?>