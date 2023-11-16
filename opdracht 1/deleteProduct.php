<?php
require_once('classes/product.php');
$pro = new Product();
$p = $pro->deleteProduct($_GET['id']);
header('location: products.php');
?>