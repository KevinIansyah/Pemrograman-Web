<?php
require('../script/function.php');


if (isset($_POST["submit"])) {
    if (insertCustomer($_POST) > 0) {
        echo "
          <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'product.php'
          </script>
        ";
    } else {
        echo "
        <script>
          alert('Data gagal ditambahkan!');
          document.location.href = 'product.php'
        </script>
      ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <nav class="navbar fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DATA PERUSAHAAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Display
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="../display/product.php">product</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../display/customer.php">customer</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Insert
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="../insert/product.php">product</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../insert/customer.php">customer</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 style="margin-top: 80px;">Insert Data Product</h2>
    </div>

    <form class="container" action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="customerNumber" class="form-label">Customer Number</label>
            <input type="text" class="form-control" name="customerNumber" id="customerNumber" placeholder="">
        </div>
        <div class="mb-3">
            <label for="customerName" class="form-label">Customer Name</label>
            <input type="text" class="form-control" name="customerName" id="customerName" placeholder="">
        </div>
        <div class="mb-3">
            <label for="contactLastName" class="form-label">Contact Last Name</label>
            <input type="text" class="form-control" name="contactLastName" id="contactLastName" placeholder="">
        </div>
        <div class="mb-3">
            <label for="contactFirstName" class="form-label">Contact First Name</label>
            <input type="text" class="form-control" name="contactFirstName" id="contactFirstName" placeholder="">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="">
        </div>
        <div class="mb-3">
            <label for="addresLine1" class="form-label">Addres Line 1</label>
            <input type="text" class="form-control" name="addresLine1" id="addresLine1" placeholder="">
        </div>
        <div class="mb-3">
            <label for="addresLine2" class="form-label">Addres Line 2</label>
            <input type="text" class="form-control" name="addresLine2" id="addresLine2" placeholder="">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="">
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" name="state" id="state" placeholder="">
        </div>
        <div class="mb-3">
            <label for="postalCode" class="form-label">Postal Code</label>
            <input type="text" class="form-control" name="postalCode" id="postalCode" placeholder="">
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" name="country" id="country" placeholder="">
        </div>
        <div class="mb-3">
            <label for="salesRepEmployeeNumber" class="form-label">Sales Rep Employee Number</label>
            <select class="form-select" name="salesRepEmployeeNumber" id="salesRepEmployeeNumber">
                <option selected>Choose Sales Rep Employee Number</option>
                <option value="1002">1002</option>
                <option value="1056">1056</option>
                <option value="1076">1611</option>
                <option value="1088">1504</option>
                <option value="1102">1165</option>
                <option value="1143">1143</option>
                <option value="1165">1165</option>
                <option value="1166">1401</option>
                <option value="1188">1337</option>
                <option value="1216">1621</option>
                <option value="1286">1286</option>
                <option value="1323">1323</option>
                <option value="1337">1337</option>
                <option value="1370">1370</option>
                <option value="1401">1401</option>
                <option value="1501">1501</option>
                <option value="1504">1504</option>
                <option value="1611">1611</option>
                <option value="1612">1612</option>
                <option value="1619">1619</option>
                <option value="1621">1621</option>
                <option value="1625">1625</option>
                <option value="1702">1702</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="creditLimit" class="form-label">Credit Limit</label>
            <input type="text" class="form-control" name="creditLimit" id="creditLimit" placeholder="">
        </div>
        <button type="submit" name="submit" class="btn btn-success" style="margin-bottom: 100px;">Insert</button>
    </form>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>