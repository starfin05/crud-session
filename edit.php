<?php
session_start();
$index = $_GET['index'];
$tugas = $_SESSION['tugas'][$index] ?? null;

if (!$tugas) {
    echo "Tugas tidak ditemukan.";
    exit;
}
?>

<h2>Edit Tugas</h2>
<form action="update.php" method="POST">
    <input type="hidden" name="index" value="<?= $index ?>">
    <input type="text" name="nama" value="<?= htmlspecialchars($tugas['nama']) ?>" required>
    <input type="number" name="waktu" value="<?= htmlspecialchars($tugas['waktu']) ?>" required>
    <button type="submit">Simpan Perubahan</button>
</form>
