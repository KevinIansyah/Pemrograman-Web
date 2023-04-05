<?php
require('../script/function.php');

$kondektur = query("SELECT b.id_kondektur, b.nama,SUM(t.jumlah_km) AS jumlah_km, tanggal,SUM(t.jumlah_km * 1500) AS gaji
                    FROM kondektur b
                    JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
                    GROUP BY b.id_kondektur;");

if (isset($_POST["submitFilter"])) {
    $kondektur = query(filterGajiKondektur($_POST));
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
        <h2 class="header">Data Gaji Kondektur</h2>

        <form action="" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
            <div class="mb-3 d-flex" style="width: 300px;">
                <select class="form-select me-2" name="bulan" id="bulan">
                    <option selected>Plih</option>
                    <option value="0" selected>All</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <button type="submit" id="submitFilter" name="submitFilter" class="btn btn-primary">Filter</button>
            </div>
        </form>
    </div>
    <!-- Akhir header -->

    <!-- Main content -->
    <div class="container scrollable d-flex justify-content-start" style="width: 900px;">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr class="text-center fw-medium">
                    <th scope="col">No</th>
                    <th scope="col">Id Kondektur</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah Km</th>
                    <th scope="col">Gaji</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kondektur as $row) : ?>
                    <tr class="text-center">
                        <td scope=" col" class=""><?php echo $i; ?></td>
                        <td><?php echo $row["id_kondektur"]; ?></td>
                        <td><?php echo $row["nama"]; ?></td>
                        <td><?php echo $row["tanggal"]; ?></td>
                        <td><?php echo $row["jumlah_km"]; ?></td>
                        <td><?php echo $row["gaji"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Akhir main content -->

    <!-- Box icons -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>