<?php
session_start();

$index = $_POST['index'];

if (isset($_SESSION['tugas'][$index])) {
    $_SESSION['tugas'][$index] = [
        'nama' => $_POST['nama'],
        'waktu' => $_POST['waktu']
    ];
}

header("Location: index.php");
exit;
?>
