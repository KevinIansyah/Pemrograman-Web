<?php
require('../script/conn.php');

//menangkap nilai
$productCode = $_GET["productCode"];

$statusDelete = "";
//query SQL
$query = $conn->prepare("DELETE FROM products WHERE productCode = :productCode");

//binding data
$query->bindParam(':productCode', $productCode);

//ekesekusi
if ($query->execute()) {
  $statusDelete = "ok";
} else {
  $statusDelete = "err";
}

header('Location: ../display/product.php?statusDelete=' . $statusDelete);
