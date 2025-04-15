<?php
session_start();

if (!isset($_SESSION['tugas'])) {
    $_SESSION['tugas'] = [];
}

$daftarTugas = $_SESSION['tugas'];
?>

<h2>Daftar Tugas</h2>
<ol>
<?php foreach ($daftarTugas as $index => $tugas): ?>
    <li>
        <?= htmlspecialchars($tugas['nama']) ?> - <?= htmlspecialchars($tugas['waktu']) ?> jam
        <a href="edit.php?index=<?= $index ?>">✏️</a>
        <a href="hapus.php?index=<?= $index ?>">🗑️</a>
    </li>
<?php endforeach; ?>
</ol>

<h2>Tambah Tugas</h2>
<form action="simpan.php" method="POST">
    <input type="text" name="nama" placeholder="Nama Tugas" required>
    <input type="number" name="waktu" placeholder="Lama Waktu (jam)" required>
    <button type="submit">Tambah Tugas</button>
</form>
