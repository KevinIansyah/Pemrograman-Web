<?php
$file = 'book.txt';
$book = file($file);

if (isset($_GET['kodeBuku'])) {
    $kodeBuku = $_GET['kodeBuku']; // Kode buku yang ingin dihapus
    $index = 0;
    $status = "err"; // Inisialisasi status dengan "err"

    foreach ($book as $lineIndex => $read) {
        $data = explode("-", $read);
        if ($data[0] == $kodeBuku) {
            // Hapus baris dari array
            unset($book[$lineIndex]);
            $status = "ok"; // Set status menjadi "ok" jika ditemukan dan dihapus
            break; // Keluar dari loop setelah baris ditemukan dan dihapus
        }
    }

    // Tulis ulang data ke file
    file_put_contents($file, implode("", $book));

    header('Location: read.php?status=' . $status);
}
