<?php
$host = "mysql-cch1.railway.internal";  // Ganti dengan host dari Railway
$user = "root";   // Ganti dengan username Railway
$pass = "uoDAMioFYzRWiXQiWjpuXXnnvvRVYkrN";   // Ganti dengan password Railway
$db   = "railway";   // Ganti dengan nama database di Railway
$port = "3306";       

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

function query($query) {
    global $conn;
    $result = $conn->query($query);
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword) {
    global $conn;
    $query = "SELECT * FROM produk WHERE nama LIKE '%$keyword%'";
    return query($query);
}
?>