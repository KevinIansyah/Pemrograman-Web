<?php
require('../script/function.php');

$bus = query("SELECT * FROM bus;");

if (isset($_POST["search"])) {
  $bus = searchBus($_POST["keyword"]);
}

if (isset($_POST['submitClose'])) {
  header("Location: bus.php");
}

if (isset($_POST["submitFilter"])) {
  $bus = query(filterBus($_POST));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>

  <link rel="stylesheet" href="../style/reset.css" />
  <link rel="stylesheet" href="../style/style.css" />


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container">
      <a href="../index.php" class="nav-item d-flex align-items-center" style="
            text-decoration: none;
            font-size: 20px;
            color: rgb(36, 36, 32);
            font-weight: 700;
          ">
        <img class="nav-link" src="../assets/image/logo-png.png" alt="" />
        <span class="nav-link">TransUPN</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Dashboard</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Display
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="bus.php">Bus</a></li>
              <li><a class="dropdown-item" href="driver.php">Driver</a></li>
              <li>
                <a class="dropdown-item" href="kondektur.php">Kondektur</a>
              </li>
              <li>
                <a class="dropdown-item" href="transUpn.php">Trans UPN</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Gaji
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="gajiDriver.php">Driver</a></li>
              <li>
                <a class="dropdown-item" href="gajiKondektur.php">Kondektur</a>
              </li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search" method="post">
          <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary" name="search" type="submit">Search</button>
        </form>
        </form>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Header -->
  <div class="container">
    <h2 class="header">Data Bus</h2>
  </div>
  <!-- Akhir header -->

  <!-- Button trigger modal insert -->
  <div class="container">
    <button type="button" class="btn btn-success insert-button text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Tambah Data
    </button>

    <form action="" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
      <div class="mb-3 d-flex" style="width: 300px;">
        <select class="form-select me-2" name="status" id="status">
          <option selected>Plih</option>
          <option value="0">Rusak</option>
          <option value="1">Beroperasi</option>
          <option value="2">Maintenance</option>
          <option value="3" selected>All</option>
        </select>
        <button type="submit" id="submitFilter" name="submitFilter" class="btn btn-primary">Filter</button>
      </div>
    </form>

    <a href="totalJarakBus.php" type="button" class="btn btn-success text-center" style="margin-top: 5px;">
      Cek Total Jarak
    </a>
  </div>
  <!-- Akhir button trigger modal insert -->


  <!-- Alert insert -->
  <div class="container">
    <?php
    if (isset($_POST["submitInsert"])) {
      if (insertBus($_POST) > 0) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px;">
                      <strong>Berhasil!</strong> Menyimpan data bus.
                      <form method="POST" action=""><button type="submit" name="submitClose" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></form>
                  </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 20px;">
                      <strong>Gagal!</strong> Menyimpan data bus.
                      <form method="POST" action=""><button type="button" name="submitClose" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></form>
                  </div>';
      }
    }
    ?>
  </div>
  <!-- Akhir alert insert -->

  <!-- Alert update -->
  <div class="container">
    <?php
    if (isset($_POST["submitUpdate"])) {
      if (updateBus($_POST) > 0) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px;">
                      <strong>Berhasil!</strong> Memperbarui data bus.
                      <form method="POST" action=""><button type="submit" name="submitClose" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></form>
                  </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 20px;">
                      <strong>Gagal!</strong> Memperbarui data bus.
                      <form method="POST" action=""><button type="button" name="submitClose" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></form>
                  </div>';
      }
    }
    ?>
  </div>
  <!-- Akhir alert update -->

  <!-- ALert delete -->
  <div class="container">
    <?php
    if (isset($_POST["submitDelete"])) {
      if (deleteBus($_POST) > 0) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px;">
                      <strong>Berhasil!</strong> Menghapus data bus.
                      <form method="POST" action=""><button type="submit" name="submitClose" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></form>
                  </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 20px;">
                      <strong>Gagal!</strong> Menghapus data bus.
                      <form method="POST" action=""><button type="button" name="submitClose" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></form>
                  </div>';
      }
    }
    ?>
  </div>
  <!-- Akhir alert delete -->

  <!-- Main content -->
  <div class="container scrollable d-flex justify-content-start" style="width: 700px;">
    <table class="table table-bordered">
      <thead class="table-primary">
        <tr class="text-center fw-medium">
          <th scope="col">No</th>
          <th>Action</th>
          <th scope="col">Id Bus</th>
          <th scope="col">Plat</th>
          <th scope="col">Status</th>
          <th id="td-jarak" scope="col" style="display: none;">Total Jarak</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($bus as $row) : ?>
          <?php if ($row["status"] == 0) {
            $warna = "bg-danger";
          } elseif ($row["status"] == 1) {
            $warna = "bg-success";
          } elseif ($row["status"] == 2) {
            $warna = "bg-warning";
          }
          ?>
          <tr class="text-center">
            <td scope=" col" class=""><?php echo $i; ?></td>
            <td class="d-flex justify-content-center">
              <a class="btn btn-warning btn-sm" style="margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modalUpdate<?php echo $row["id_bus"]; ?>">Update</a>
              <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete<?php echo $row["id_bus"]; ?>">Delete</a>
            </td>
            <td><?php echo $row["id_bus"]; ?></td>
            <td><?php echo $row["plat"]; ?></td>
            <td class="<?php echo $warna; ?>"><?php echo $row["status"]; ?></td>
            <td id="td-jarak" style="display: none;"><?php echo $row["total_jarak"]; ?></td>
          </tr>

          <!-- Modal update data -->
          <div class="modal fade" id="modalUpdate<?php echo $row["id_bus"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?php
            $idBus = $row["id_bus"];
            $busUpdate = query("SELECT * FROM bus WHERE id_bus = $idBus")[0];
            ?>

            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <!-- Form input -->
                  <form class="container" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="id_bus" class="form-label">Id Bus</label>
                      <input value="<?php echo $busUpdate["id_bus"]; ?>" type="text" class="form-control" name="id_bus" id="id_bus" placeholder="" readonly="readonly">
                    </div>
                    <div class="mb-3">
                      <label for="plat" class="form-label">Plat</label>
                      <input value="<?php echo $busUpdate["plat"]; ?>" type="text" class="form-control" name="plat" id="plat" placeholder="">
                    </div>
                    <div class="mb-3">
                      <label for="status" class="form-label">Status</label>
                      <select class="form-select" name="status" id="status">
                        <option selected><?php echo $busUpdate["status"]; ?></option>
                        <option value="0">0 (rusak)</option>
                        <option value="1">1 (aktif)</option>
                        <option value="2">2 (cadangan)</option>
                      </select>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" name="submitUpdate" class="btn btn-primary">Update</button>
                </div>
                </form>
                <!-- Akhir form input -->
              </div>
            </div>
          </div>
          <!-- Akhir modal update data -->

          <!-- Modal hapus data-->
          <div class="modal fade" id="modalDelete<?php echo $row["id_bus"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <?php
            $idBus = $row["id_bus"];
            $busDelete = query("SELECT * FROM bus WHERE id_bus = $idBus")[0];
            ?>

            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="container" action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    Apakah anda yakin menghapus data ini?
                    <div class="mb-3" style="margin-top: 20px;">
                      <label for="id_bus" class="form-label">Id Bus</label>
                      <input value="<?php echo $busDelete["id_bus"]; ?>" type="text" class="form-control" name="id_bus" id="id_bus" placeholder="" readonly="readonly">
                    </div>
                    <div class="mb-3">
                      <label for="plat" class="form-label">Plat</label>
                      <input value="<?php echo $busDelete["plat"]; ?>" type="text" class="form-control" name="plat" id="plat" placeholder="">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="submitDelete" class="btn btn-primary">Delete</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- AKhir modal hapus data -->

          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- Akhir main content -->

  <!-- Modal insert -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <!-- Form input -->
          <form class="container" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="plat" class="form-label">Plat</label>
              <input type="text" class="form-control" name="plat" id="plat" placeholder="">
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" name="status" id="status">
                <option selected>Open this status</option>
                <option value="0">0 (rusak)</option>
                <option value="1">1 (aktif)</option>
                <option value="2">2 (cadangan)</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" name="submitInsert" class="btn btn-primary">Tambah</button>
        </div>
        </form>
        <!-- Akhir form input -->
      </div>
    </div>
  </div>
  <!-- Akhir modal insert -->

  <!-- Box icons -->
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>