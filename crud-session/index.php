<?php
session_start();

// Inisialisasi session tasks jika belum ada
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Handle tambah tugas
if (isset($_POST['action']) && $_POST['action'] === 'add') {
    $_SESSION['tasks'][] = [
        'name' => $_POST['name'],
        'time' => $_POST['time']
    ];
    header("Location: index.php");
    exit;
}

// Handle edit tugas
if (isset($_POST['action']) && $_POST['action'] === 'edit') {
    $id = $_POST['id'];
    $_SESSION['tasks'][$id] = [
        'name' => $_POST['name'],
        'time' => $_POST['time']
    ];
    header("Location: index.php");
    exit;
}

// Handle hapus tugas
if (isset($_GET['delete'])) {
    unset($_SESSION['tasks'][$_GET['delete']]);
    $_SESSION['tasks'] = array_values($_SESSION['tasks']); // reset index
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Sesi PHP</title>
</head>
<body>

<h2>Daftar Tugas</h2>
<div>
    <ol>
        <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
            <li>
                <?= htmlspecialchars($task['name']) ?> - <?= htmlspecialchars($task['time']) ?> jam
                <a href="?edit=<?= $index ?>">✏️</a>
                <a href="?delete=<?= $index ?>" onclick="return confirm('Hapus tugas ini?')">🗑️</a>
            </li>
        <?php endforeach; ?>
    </ol>
</div>

<?php
// Form tambah/edit tugas
if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];
    $task = $_SESSION['tasks'][$editId];
    $formAction = 'edit';
    $buttonLabel = 'Simpan Perubahan';
} else {
    $editId = '';
    $task = ['name' => '', 'time' => ''];
    $formAction = 'add';
    $buttonLabel = 'Tambah Tugas';
}
?>

<div>
    <h2><?= $formAction === 'add' ? 'Tambah Tugas' : 'Edit Tugas' ?></h2>
    <form method="post">
        <input type="hidden" name="action" value="<?= $formAction ?>">
        <input type="hidden" name="id" value="<?= $editId ?>">
        <input type="text" name="name" placeholder="Nama Tugas" value="<?= htmlspecialchars($task['name']) ?>" required>
        <input type="number" name="time" placeholder="Lama Waktu (jam)" value="<?= htmlspecialchars($task['time']) ?>" required>
        <button type="submit"><?= $buttonLabel ?></button>
    </form>
</div>

</body>
</html>

