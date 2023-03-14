<?php
require('../script/function.php');

// $query("SELECT * FROM products");

$product = query("SELECT * FROM products");

if (isset($_POST["search"])) {

  $product = searchProduct($_POST["keyword"]);
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

  <link rel="stylesheet" href="style.css">
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
                  <a class="dropdown-item" href="product.php">product</a>
                </li>
                <li>
                  <a class="dropdown-item" href="customer.php">customer</a>
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

  <div class="container-fluid">
    <h2 class="h2">Data Product</h2>
    <form class="d-flex search" role="search" method="post">
      <input class="form-control me-2 w-25" name="keyword" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" name="search" type="submit">Search</button>
    </form>
  </div>

  <div class="container-fluid scrollable">
    <table class="table table-striped table-bordered">
      <thead class="table-primary">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Product Code</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Line</th>
          <th scope="col">Product Scale</th>
          <th scope="col">Product Vendor</th>
          <th scope="col">Product Description</th>
          <th scope="col">Quantity in Stock</th>
          <th scope="col">Buy Price</th>
          <th scope="col">MRSP</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($product as $row) : ?>
          <tr>
            <td scope="row"><?php echo $i; ?></td>
            <td><?php echo $row["productCode"]; ?></td>
            <td><?php echo $row["productName"]; ?></td>
            <td><?php echo $row["productLine"]; ?></td>
            <td><?php echo $row["productScale"]; ?></td>
            <td><?php echo $row["productVendor"]; ?></td>
            <td><?php echo $row["productDescription"]; ?></td>
            <td><?php echo $row["quantityInStock"]; ?></td>
            <td><?php echo $row["buyPrice"]; ?></td>
            <td><?php echo $row["MSRP"]; ?></td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>


  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>