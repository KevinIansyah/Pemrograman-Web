<?php
require('upload.php');

$fileName = 'book.txt';
$fileData = file($fileName);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $index = $_POST["lineIndex"];
    $kodeBuku = $_POST["kodeBuku"];
    $judulBuku = $_POST["judulBuku"];
    $pengarang = $_POST["pengarang"];
    $tahunTerbit = $_POST["tahunTerbit"];
    $jumlahHalaman = $_POST["jumlahHalaman"];
    $penerbit = $_POST["penerbit"];
    $kategori = $_POST["kategori"];
    $coverLama = $_POST["coverLama"];

    if ($_FILES["cover"]["error"] === 4) {
        $cover = $coverLama;
    } else {
        $cover = upload();
    }

    $dataBaru = $kodeBuku . "-" . $judulBuku . "-" . $pengarang . "-" . $tahunTerbit . "-" . $jumlahHalaman . "-" . $penerbit . "-" . $kategori . "-" . $cover . "\n";

    if ($index >= 0) {
        $fileData[$index] = rtrim($dataBaru, "\n"); // Ganti baris dengan data baru



        file_put_contents($fileName,  implode("", $fileData));

        $statusUpdate = "ok";
    } else {
        $statusUpdate = "err";
    }
    header('Location: read.php?statusUpdate=' . $statusUpdate);
}
