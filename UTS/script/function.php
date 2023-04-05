<?php
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "transupn");

// Query
function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Search data bus
function searchBus($keyword)
{
    $query =  "SELECT * FROM bus WHERE id_bus LIKE '%$keyword%' OR 
    plat LIKE '%$keyword%' OR status LIKE '%$keyword%'";

    return query($query);
}

// Search data driver
function searchDriver($keyword)
{
    $query =  "SELECT * FROM driver WHERE id_driver LIKE '%$keyword%' OR 
    nama LIKE '%$keyword%' OR no_sim LIKE '%$keyword%' OR alamat LIKE '%$keyword%'";

    return query($query);
}

// Search data kondektur
function searchKondektur($keyword)
{
    $query =  "SELECT * FROM kondektur WHERE id_kondektur LIKE '%$keyword%' OR 
    nama LIKE '%$keyword%'";

    return query($query);
}

// Search data trans UPN
function searchTransUpn($keyword)
{
    $query =  "SELECT * FROM trans_upn WHERE id_trans_upn LIKE '%$keyword%' OR 
    id_kondektur LIKE '%$keyword%' OR id_bus LIKE '%$keyword%' OR id_driver LIKE '%$keyword%' OR 
    jumlah_km LIKE '%$keyword%' OR tanggal LIKE '%$keyword%'";

    return query($query);
}

// Insert data bus
function insertBus($data)
{
    global $conn;
    $plat = htmlspecialchars($data["plat"]);
    $status = htmlspecialchars($data["status"]);

    $query = "INSERT INTO bus (`id_bus`, `plat`, `status`) VALUES (' ', '$plat', '$status')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Insert data driver
function insertDriver($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $noSIM = htmlspecialchars($data["no_sim"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "INSERT INTO driver (`id_driver`, `nama`, `no_sim`, `alamat`) VALUES (' ', '$nama', '$noSIM','$alamat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Insert data driver
function insertKondektur($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);

    $query = "INSERT INTO kondektur (`id_kondektur`, `nama`) VALUES (' ', '$nama')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Insert data trans upn
function insertTransUpn($data)
{
    global $conn;
    $idKondektur = htmlspecialchars($data["id_kondektur"]);
    $idBus = htmlspecialchars($data["id_bus"]);
    $idDriver = htmlspecialchars($data["id_driver"]);
    $jumlahKm = htmlspecialchars($data["jumlah_km"]);
    $tanggal = htmlspecialchars($data["tanggal"]);

    $query = "INSERT INTO trans_upn (`id_trans_upn`, `id_kondektur`, `id_bus`, `id_driver`, `jumlah_km`, `tanggal`) VALUES (' ', $idKondektur,$idBus,$idDriver,'$jumlahKm', '$tanggal')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Update data bus
function updateBus($data)
{
    global $conn;
    $idBus = htmlspecialchars($data["id_bus"]);
    $plat = htmlspecialchars($data["plat"]);
    $status = htmlspecialchars($data["status"]);

    $query = "UPDATE bus
            SET plat = '$plat',
                status = '$status'
            WHERE id_bus = $idBus";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Update data driver
function updateDriver($data)
{
    global $conn;
    $idDriver = htmlspecialchars($data["id_driver"]);
    $nama = htmlspecialchars($data["nama"]);
    $noSIM = htmlspecialchars($data["no_sim"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "UPDATE driver
            SET nama = '$nama',
                no_sim = '$noSIM',
                alamat= '$alamat'
            WHERE id_driver = $idDriver";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Update data kondektur
function updateKondektur($data)
{
    global $conn;
    $idKondektur = htmlspecialchars($data["id_kondektur"]);
    $nama = htmlspecialchars($data["nama"]);

    $query = "UPDATE kondektur
            SET nama = '$nama'
            WHERE id_kondektur = $idKondektur";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Update data driver
function updateTransUpn($data)
{
    global $conn;
    $idTransUpn = htmlspecialchars($data["id_trans_upn"]);
    $idKondektur = htmlspecialchars($data["id_kondektur"]);
    $idBus = htmlspecialchars($data["id_bus"]);
    $idDriver = htmlspecialchars($data["id_driver"]);
    $jumlahKm = htmlspecialchars($data["jumlah_km"]);
    $tanggal = htmlspecialchars($data["tanggal"]);


    $query = "UPDATE trans_upn
            SET id_kondektur = $idKondektur,
                id_bus = $idBus,
                id_driver = $idDriver,
                jumlah_km = '$jumlahKm',
                tanggal = '$tanggal'
            WHERE id_trans_upn = $idTransUpn";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// filter bus
// function filterBus($data)
// {
//     if ($data["status"] == 0) {
//         $query = "SELECT * FROM bus WHERE status = '0'";
//     } elseif ($data["status"] == 1) {
//         $query = "SELECT * FROM bus WHERE status = '1'";
//     } elseif ($data["status"] == 2) {
//         $query = "SELECT * FROM bus WHERE status = '2'";
//     } elseif ($data["status"] == 3) {
//         $query = "SELECT * FROM bus";
//     }

//     $bus = $query;
//     return $bus;
// }

function filterBus($data)
{
    if ($data["status"] == 0) {
        $query = "SELECT *, 0 AS jumlah_km FROM bus WHERE status = '0'";
    } elseif ($data["status"] == 1) {
        $query = "SELECT d.*, SUM(t.jumlah_km) AS jumlah_km FROM bus d
                  JOIN trans_upn t ON d.id_bus = t.id_bus
                  WHERE d.status = '1'
                  GROUP BY d.id_bus";
    } elseif ($data["status"] == 2) {
        $query = "SELECT *, 0 AS jumlah_km FROM bus WHERE status = '2'";
    } elseif ($data["status"] == 3) {
        $query = "SELECT d.*, IFNULL(SUM(t.jumlah_km), 0) AS jumlah_km FROM bus d
                  LEFT JOIN trans_upn t ON d.id_bus = t.id_bus
                  GROUP BY d.id_bus";
    }

    return $query;
}

// filter gaji driver
function filterGajiDriver($data)
{
    $yearMonth = date('Y-m', strtotime('2023-' . sprintf('%02d', $data["bulan"]) . '-01'));
    $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
              FROM driver b
              JOIN trans_upn t ON b.id_driver = t.id_driver";
    if ($data["bulan"] != 0) {
        $query .= " WHERE t.tanggal LIKE '%{$yearMonth}%'";
    }
    $query .= " GROUP BY b.id_driver, t.tanggal";
    return $query;
}

// filter gaji kondektur
function filterGajiKondektur($data)
{
    $bulan = $data['bulan'] + 1;
    $query = "SELECT b.id_kondektur, b.nama, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 1500) AS gaji 
              FROM kondektur b
              JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
              WHERE t.tanggal LIKE '%2023-$bulan%'
              GROUP BY b.id_kondektur, t.tanggal";
    return $query;
}

// function jarakbus
function totalJarak()
{
    $query = "SELECT b.id_bus, b.plat, b.status,SUM(t.jumlah_km) AS total_jarak
    FROM bus b
    JOIN trans_upn t ON b.id_bus = t.id_bus
    GROUP BY b.id_bus;";

    $bus = $query;
    return $bus;
}

// Delete data bus
function deleteBus($data)
{
    global $conn;

    $idBus = htmlspecialchars($data["id_bus"]);

    $query = "DELETE FROM bus WHERE id_bus = $idBus";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Delete data driver
function deleteDriver($data)
{
    global $conn;

    $idDriver = htmlspecialchars($data["id_driver"]);

    $query = "DELETE FROM driver WHERE id_driver = $idDriver";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Delete data kondektur
function deleteKondektur($data)
{
    global $conn;

    $idKondektur = htmlspecialchars($data["id_kondektur"]);

    $query = "DELETE FROM kondektur WHERE id_kondektur = $idKondektur";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Delete data trans upn
function deleteTransUpn($data)
{
    global $conn;

    $idTransUpn = htmlspecialchars($data["id_trans_upn"]);

    $query = "DELETE FROM trans_upn WHERE id_trans_upn = $idTransUpn";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
