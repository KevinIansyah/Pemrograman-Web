<?php
function upload()
{
    $namaFile = $_FILES["cover"]["name"];
    $ukuranFile = $_FILES["cover"]["size"];
    $error = $_FILES["cover"]["error"];
    $tmpName = $_FILES["cover"]["tmp_name"];

    // Cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "
            <script>
            alert('Pilih gambar dahulu!');
            document.location.href = 'index.php'
            </script>
        ";
        return false;
    }

    // Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ["jpg", "jpeg", "png"];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
            alert('Yang anda upload bukan gambar!');
            document.location.href = 'index.php'
            </script>
        ";
        return false;
    }

    // Cek ukuran gambar max 1mb
    if ($ukuranFile > 1000000) {
        echo "
            <script>
            alert('Ukuran gambar terlalu besar!');
            document.location.href = 'index.php'
            </script>
        ";
        return false;
    }

    // Generete nama gambar baru menghindari mengunggah gambar dengan nama yang sama
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    // Lolos pengecekan, gambar siap diupload
    move_uploaded_file($tmpName, "cover/" . $namaFileBaru);
    return $namaFileBaru;
}
