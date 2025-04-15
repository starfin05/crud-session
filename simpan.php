<?php
session_start();

$nama = $_POST['nama'];
$waktu = $_POST['waktu'];

$_SESSION['tugas'][] = [
    'nama' => $nama,
    'waktu' => $waktu
];

header("Location: index.php");
exit;
?>
