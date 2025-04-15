<?php
session_start();
$index = $_GET['index'];

if (isset($_SESSION['tugas'][$index])) {
    unset($_SESSION['tugas'][$index]);
    $_SESSION['tugas'] = array_values($_SESSION['tugas']); // reset index
}

header("Location: index.php");
exit;
?>
