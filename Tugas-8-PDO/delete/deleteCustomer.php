<?php
require('../script/conn.php');

$customerNumber = $_GET["customerNumber"];

$statusDelete = "";
//query SQL
$query = $conn->prepare("DELETE FROM customers WHERE customerNumber = :customerNumber");

//binding data
$query->bindParam(':customerNumber', $customerNumber);

//ekesekusi
if ($query->execute()) {
    $statusDelete = "ok";
} else {
    $statusDelete = "err";
}

header('Location: ../display/customer.php?statusDelete=' . $statusDelete);
