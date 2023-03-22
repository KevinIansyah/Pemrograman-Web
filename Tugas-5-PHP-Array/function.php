<?php

function age()
{
    $tanggal_lahir = new DateTime("2003-02-20");
    $sekarang = new DateTime("today");
    if ($tanggal_lahir > $sekarang) {
        $tahun = "0";
        $bulan = "0";
        $tanggal = "0";
    }
    $tahun = $sekarang->diff($tanggal_lahir)->y;
    $bulan = $sekarang->diff($tanggal_lahir)->m;
    $tanggal = $sekarang->diff($tanggal_lahir)->d;
    echo "$tahun tahun $bulan bulan $tanggal hari";
}

$biodata = [
    "nama" => "Kevin Iansyah",
    "ttl" => "Mojokerto, 20 Feb 2003",
    "jeniskelamin" => "Laki-laki",
    "agama" => "Islam",
    "kewarganegaraan" => "Indonesia",
    "suku" => "Jawa",
    "tb" => "160",
    "bb" => "60",
    "status" => "belum menikah"
];
