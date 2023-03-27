<?php
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "classicmodels");



// query
function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// search data
function searchCustomer($keyword)
{
    $query = "SELECT * FROM customers WHERE customerNumber LIKE '%$keyword%' OR 
    customerName LIKE '%$keyword%' OR contactLastName LIKE '%$keyword%' OR 
    contactFirstName LIKE '%$keyword%' OR phone LIKE '%$keyword%' OR addressLine1 LIKE '%$keyword%' OR 
    addressLine2 LIKE '%$keyword%' OR city LIKE '%$keyword%' OR 
    state LIKE '%$keyword%' OR postalCode LIKE '%$keyword%' OR 
    country LIKE '%$keyword%' OR salesRepEmployeeNumber LIKE '%$keyword%' OR 
    creditLimit LIKE '%$keyword%'";

    return query($query);
}

function searchProduct($keyword)
{
    $query =  "SELECT * FROM products WHERE productCode LIKE '%$keyword%' OR 
    productName LIKE '%$keyword%' OR productLine LIKE '%$keyword%' OR 
    productScale LIKE '%$keyword%' OR productVendor LIKE '%$keyword%' OR 
    productDescription LIKE '%$keyword%' OR quantityInStock LIKE '%$keyword%' 
    OR buyPrice LIKE '%$keyword%' OR MSRP LIKE '%$keyword%'";

    return query($query);
}


function insertProduct($data)
{
    global $conn;
    $productCode = htmlspecialchars($data["productCode"]);
    $productName = htmlspecialchars($data["productName"]);
    $productLine = htmlspecialchars($data["productLine"]);
    $productScale = htmlspecialchars($data["productScale"]);
    $productVendor = htmlspecialchars($data["productVendor"]);
    $productDescription = htmlspecialchars($data["productDescription"]);
    $quantityInStock = htmlspecialchars($data["quantityInStock"]);
    $buyPrice = htmlspecialchars($data["buyPrice"]);
    $MSRP = htmlspecialchars($data["MSRP"]);


    $query = "INSERT INTO products VALUES ('$productCode', '$productName', '$productLine','$productScale', '$productVendor','$productDescription',$quantityInStock,$buyPrice,$MSRP)";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function insertCustomer($data)
{
    global $conn;
    $customerNumber = htmlspecialchars($data["customerNumber"]);
    $customerName = htmlspecialchars($data["customerName"]);
    $contactLastName = htmlspecialchars($data["contactLastName"]);
    $contactFirstName = htmlspecialchars($data["contactFirstName"]);
    $phone = htmlspecialchars($data["phone"]);
    $addresLine1 = htmlspecialchars($data["addresLine1"]);
    $addresLine2 = htmlspecialchars($data["addresLine2"]);
    $city = htmlspecialchars($data["city"]);
    $state = htmlspecialchars($data["state"]);
    $postalCode = htmlspecialchars($data["postalCode"]);
    $country = htmlspecialchars($data["country"]);
    $salesRepEmployeeNumber = htmlspecialchars($data["salesRepEmployeeNumber"]);
    $creditLimit = htmlspecialchars($data["creditLimit"]);



    $query = "INSERT INTO customers VALUES ($customerNumber, '$customerName', '$contactLastName','$contactFirstName', '$phone','$addresLine1','$addresLine2','$city','$state','$postalCode','$country', $salesRepEmployeeNumber,$creditLimit)";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
