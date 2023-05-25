<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>

    <!-- CSS-->
    <link rel="stylesheet" href="app.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="book-container">
        <h1>Data Buku</h1>
        <a class="btn btn-primary" href="addBook.php">Tambah Data</a>

        <!-- Alert delete -->
        <div class="alert-box-delete">
            <?php
            if (@$_GET["status"] !== NULL) {
                $status = $_GET["status"];
                if ($status == "ok") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Berhasil!</strong> Menghapus data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                } elseif ($status == "err") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Gagal!</strong> Menghapus data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                }
            }
            // Akhir alert delete

            // Alert update
            if (@$_GET["statusUpdate"] !== NULL) {
                $status = $_GET["statusUpdate"];
                if ($status == "ok") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Berhasil!</strong> Mengubah data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                } elseif ($status == "err") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Gagal!</strong> Mengubah data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                }
            }
            ?>
        </div>
        <!-- Akhir alert update -->

        <!-- Table -->
        <div class="table-box">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Jumlah Halaman</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    $file = "book.txt";
                    $reads = file($file);
                    foreach ($reads as $read) {
                        $data = explode("-", $read);
                        echo "<tr>";
                        echo "<td>$data[0]</td>";
                        echo "<td>$data[1]</td>";
                        echo "<td>$data[2]</td>";
                        echo "<td>$data[3]</td>";
                        echo "<td>$data[4]</td>";
                        echo "<td>$data[5]</td>";
                        echo "<td>$data[6]</td>";
                        echo "<td><img src='cover/$data[7]' style='width: 100px;'></td>";
                    ?>
                        <td class='aksi'>
                            <a href="update.php?kodeBuku=<?php echo $data[0]; ?>"><i class='fa-solid fa-pen'></i></a>
                            <a href="delete.php?kodeBuku=<?php echo $data[0]; ?>" onclick="return confirm('Apakah anda yakin?');""><i class='fa-solid fa-trash'></i></a>
                            </td>
                        <?php
                        echo "</tr>";
                    }
                    echo "</tbody>
            </table>";
                        ?>
        </div>
        <!-- Akhir table -->
    </div>

     <!-- Bootstrap -->
     <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

                                <!-- Fontawsome -->
                                <script src="https://kit.fontawesome.com/ee9e0f07f2.js" crossorigin="anonymous"></script>
</body>

</html>