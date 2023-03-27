<?php
require('../script/function.php');


if (isset($_POST["submit"])) {
    if (insertProduct($_POST) > 0) {
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
            <label for="productCode" class="form-label">Product Code</label>
            <input type="text" class="form-control" name="productCode" id="ProductCode" placeholder="">
        </div>
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="productName" id="productName" placeholder="">
        </div>
        <div class="mb-3">
            <label for="productLine" class="form-label">Product Line</label>
            <select class="form-select" name="productLine" id="productLine">
                <option selected>Pilih salah satu</option>
                <option value="Classic Cars">Classic Cars</option>
                <option value="Motorcycles">Motorcycles</option>
                <option value="Planes">Planes</option>
                <option value="Ships">Ships</option>
                <option value="Trains">Trains</option>
                <option value="Trucks and Buses">Trucks and Buses</option>
                <option value="Vintage Cars">Vintage Cars</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="productScale" class="form-label">Product Scale</label>
            <input type="text" class="form-control" name="productScale" id="productScale" placeholder="">
        </div>
        <div class="mb-3">
            <label for="productVendor" class="form-label">Product Vendor</label>
            <input type="text" class="form-control" name="productVendor" id="productVendor" placeholder="">
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Product Description</label>
            <textarea class="form-control" name="productDescription" id="productDescription" aria-label="With textarea"></textarea>
        </div>
        <div class="mb-3">
            <label for="quantityInStock" class="form-label">Quantity in Stock</label>
            <input type="text" class="form-control" name="quantityInStock" id="quantityInStock" placeholder="">
        </div>
        <div class="mb-3">
            <label for="buyPrice" class="form-label">Buy Price</label>
            <input type="text" class="form-control" name="buyPrice" id="buyPrice" placeholder="">
        </div>
        <div class="mb-3">
            <label for="MSRP" class="form-label">MSRP</label>
            <input type="text" class="form-control" name="MSRP" id="MSRP" placeholder="">
        </div>
        <button type="submit" name="submit" class="btn btn-success" style="margin-bottom: 100px;">Insert</button>
    </form>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>