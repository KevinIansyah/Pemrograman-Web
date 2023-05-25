<?php
$fileName = 'book.txt';
$reads = file($fileName);

if (isset($_GET['kodeBuku'])) {
    $index = -1; // Inisialisasi index dengan -1
    $kodeBuku = $_GET['kodeBuku']; // Nomor baris yang ingin diupdate

    foreach ($reads as $lineIndex => $read) {
        $data = explode("-", $read);
        if ($data[0] == $kodeBuku) {
            $index = $lineIndex; // Set index dengan lineIndex jika ditemukan
            $kodeBuku = $data[0];
            $judulBuku = $data[1];
            $pengarang = $data[2];
            $tahunTerbit = $data[3];
            $jumlahHalaman = $data[4];
            $penerbit = $data[5];
            $kategori = $data[6];
            $cover = $data[7];
            break; // Keluar dari loop setelah baris ditemukan
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Buku</title>

    <!-- CSS-->
    <link rel="stylesheet" href="app.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="book-container">
        <h1>Ubah Data Buku</h1>
        <div class="alert-box">
            <?php
            if (isset($_GET["statusUpdate"])) {
                $status = $_GET["statusUpdate"];
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

        <div style="width: 40rem;" class="alert alert-success" role="alert">
            <h4 class="alert-heading">Panduan!</h4>
            <p>Jika hasil update mengalami masalah pada saat ditampilkan, pergi ke file book.txt dan tekan ctrl+s, maka data akan kembali normal.</p>
            <p>Jika Anda tidak ingin mengubah gambar cover, jangan unggah kembali gambar cover. Namun, jika Anda ingin mengubah gambar cover, silakan unggah gambar yang baru sesuai dengan keinginan Anda.</p>
            <hr>
            <p class="mb-0">Terimakasih sudah menyempatkan waktu membaca.</p>
        </div>

        <form class="form-box" action="writeUpdate.php" method="post" enctype="multipart/form-data">
            <!-- Input cover jika tidak mengganti cover -->
            <input type="hidden" name="lineIndex" value="<?php echo $lineIndex; ?>">
            <input type="hidden" name="coverLama" value="<?php echo $cover; ?>">
            <div class=" mb-3">
                <label for="kodeBuku" class="form-label">Kode Buku</label>
                <input value="<?php echo $kodeBuku ?>" type="text" class="form-control" id="kodeBuku" name="kodeBuku" placeholder="A01">
            </div>
            <div class="mb-3">
                <label for="judulBuku" class="form-label">Judul Buku</label>
                <input value="<?php echo $judulBuku ?>" type="text" class="form-control" id="judulBuku" name="judulBuku" placeholder="Tentang Kamu">
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input value="<?php echo $pengarang ?>" type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Tere Liye">
            </div>
            <div class="mb-3">
                <label for="tahunTerbit" class=" form-label">Tahun Terbit</label>
                <input value="<?php echo $tahunTerbit ?>" type="text" class="form-control" id="tahunTerbit" name="tahunTerbit" placeholder="2023">
            </div>
            <div class="mb-3">
                <label for="jumlahHalaman" class="form-label">Jumlah Halaman</label>
                <input value="<?php echo $jumlahHalaman ?>" type="text" class="form-control" id="jumlahHalaman" name="jumlahHalaman" placeholder="503">
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input value="<?php echo $penerbit ?>" type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Sabakgrip">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input value="<?php echo $kategori ?>" type="text" class="form-control" id="kategori" name="kategori" placeholder="Novel">
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <img class="form-control" src='cover/<?php echo $cover ?>' style='width: 100px;'>
                <input value="<?php echo $cover ?>" type="file" class="form-control" id="cover" name="cover" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>