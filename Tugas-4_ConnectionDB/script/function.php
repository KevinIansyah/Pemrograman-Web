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
