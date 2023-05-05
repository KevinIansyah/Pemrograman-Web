<?php
require('../script/conn.php');

//proses menampilkan data dari database dengan PDO:
//siapkan query SQL
$query = "SELECT * FROM customers";
//eksekusi query
$customer = $conn->query($query);

if (isset($_GET['keyword'])) {
  $keyword = $_GET["keyword"];

  $query = "SELECT * FROM customers WHERE customerNumber LIKE '%$keyword%' OR 
  customerName LIKE '%$keyword%' OR contactLastName LIKE '%$keyword%' OR 
  contactFirstName LIKE '%$keyword%' OR phone LIKE '%$keyword%' OR addressLine1 LIKE '%$keyword%' OR 
  addressLine2 LIKE '%$keyword%' OR city LIKE '%$keyword%' OR 
  state LIKE '%$keyword%' OR postalCode LIKE '%$keyword%' OR 
  country LIKE '%$keyword%' OR salesRepEmployeeNumber LIKE '%$keyword%' OR 
  creditLimit LIKE '%$keyword%'";

  $customer = $conn->query($query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistem Informasi</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

  <!-- Css -->
  <link rel="stylesheet" href="../style/style.css">
</head>

<body>
  <!-- Navbar -->
  <div class="container-fluid">
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Insert
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="../insert/insertProduct.php">product</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../insert/insertCustomer.php">customer</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <!-- Akhir navbar -->

  <!-- Header -->
  <div class="container">
    <h2 class="h2">Data Customer</h2>
    <form class="d-flex search-box" role="search" method="get">
      <input class="form-control me-2 w-25" name="keyword" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
  </div>
  <!-- Akhir header -->


  <!-- Alert -->
  <div class="container">
    <?php
    if (@$_GET["statusDelete"] !== NULL) {
      $status = $_GET["statusDelete"];
      if ($status == "ok") {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Berhasil!</strong> Menghapus data customer.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      } elseif ($status == "err") {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Gagal!</strong> Menghapus data customer.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      }
    }
    ?>
  </div>
  <!-- Akhir Alert -->


  <!-- Main content -->
  <div class="container-fluid scrollable">
    <table class="table table-striped table-bordered">
      <thead class="table-primary">
        <tr class="text-center">
          <th scope="col">No</th>
          <th>Action</th>
          <th scope="col">Customer Number</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Contact Last Name</th>
          <th scope="col">Contact First Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Addres Line1</th>
          <th scope="col">Addres Line2</th>
          <th scope="col">City</th>
          <th scope="col">State</th>
          <th scope="col">Postal Code</th>
          <th scope="col">Country</th>
          <th scope="col">Sales Rep Employee Number</th>
          <th scope="col">Credit Limit</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php while ($data = $customer->fetch(PDO::FETCH_ASSOC)) : ?>
          <tr>
            <td scope=" col"><?php echo $i; ?></td>
            <td class="d-flex">
              <a class="btn btn-warning btn-sm" style="margin-right: 5px;" href="../update/updateCustomer.php?customerNumber=<?php echo $data["customerNumber"]; ?>">Update</a>
              <a class="btn btn-danger btn-sm" href="../delete/deleteCustomer.php?customerNumber=<?php echo $data["customerNumber"]; ?> " onclick="return confirm('Apakah anda yakin?');">Delete</a>
            </td>
            <td scope="col"><?php echo $data["customerNumber"]; ?></td>
            <td scope="col"><?php echo $data["customerName"]; ?></td>
            <td scope="col"><?php echo $data["contactLastName"]; ?></td>
            <td scope="col"><?php echo $data["contactFirstName"]; ?></td>
            <td scope="col"><?php echo $data["phone"]; ?></td>
            <td scope="col"><?php echo $data["addressLine1"]; ?></td>
            <td scope="col"><?php echo $data["addressLine2"]; ?></td>
            <td scope="col"><?php echo $data["city"]; ?></td>
            <td scope="col"><?php echo $data["state"]; ?></td>
            <td scope="col"><?php echo $data["postalCode"]; ?></td>
            <td scope="col"><?php echo $data["country"]; ?></td>
            <td scope="col"><?php echo $data["salesRepEmployeeNumber"]; ?></td>
            <td scope="col"><?php echo $data["creditLimit"]; ?></td>
          </tr>
          <?php $i++; ?>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <!-- Akhir main content -->


  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>