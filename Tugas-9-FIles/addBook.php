<?php
require('upload.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = "book.txt";

    $kodeBuku = $_POST["kodeBuku"];
    $judulBuku = $_POST["judulBuku"];
    $pengarang = $_POST["pengarang"];
    $tahunTerbit = $_POST["tahunTerbit"];
    $jumlahHalaman = $_POST["jumlahHalaman"];
    $penerbit = $_POST["penerbit"];
    $kategori = $_POST["kategori"];

    // upload gambar cover
    $cover = upload();
    // jika bukan gambar yang di unggah, return false
    if (!$cover) {
        return false;
    }

    $book =  $kodeBuku . "-" . $judulBuku . "-" . $pengarang . "-" . $tahunTerbit . "-" . $jumlahHalaman . "-" . $penerbit . "-" . $kategori . "-" . $cover . "\n";

    $file = "book.txt";
    if (file_put_contents($file, $book, FILE_APPEND) > 0) {
        $status = "ok";
    } else {
        $status = "err";
    }

    header('Location: addBook.php?status=' . $status);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add book</title>

    <!-- CSS-->
    <link rel="stylesheet" href="app.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="book-container">
        <h1>Tambah Data Buku</h1>
        <a class="btn btn-primary" href="read.php">lihat data</a>

        <!-- Alert -->
        <div class="alert-box">
            <?php
            if (@$_GET["status"] !== NULL) {
                $status = $_GET["status"];
                if ($status == "ok") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Berhasil!</strong> Menambahkan data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                } elseif ($status == "err") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Gagal!</strong> Menambahkan data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                }
            }
            ?>
        </div>
        <!-- Akhir alert -->

        <!-- Form -->
        <form class="form-box" action="addBook.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="kodeBuku" class="form-label">Kode Buku</label>
                <input type="text" class="form-control" id="kodeBuku" name="kodeBuku" placeholder="A01">
            </div>
            <div class="mb-3">
                <label for="judulBuku" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judulBuku" name="judulBuku" placeholder="Tentang Kamu">
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Tere Liye">
            </div>
            <div class="mb-3">
                <label for="tahunTerbit class=" form-label">Tahun Terbit</label>
                <input type="text" class="form-control" id="tahunTerbit" name="tahunTerbit" placeholder="2023">
            </div>
            <div class="mb-3">
                <label for="jumlahHalaman" class="form-label">Jumlah Halaman</label>
                <input type="text" class="form-control" id="jumlahHalaman" name="jumlahHalaman" placeholder="503">
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Sabakgrip">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Novel">
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="file" class="form-control" id="cover" name="cover" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- Akhir form -->
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>