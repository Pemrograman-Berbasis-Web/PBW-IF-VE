<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js" defer></script> <!-- Menyertakan file JavaScript -->
</head>
<body>
    <div class="container">
        <h1>Daftar Tugas</h1>
        <a href="index.php?action=create" class="btn-add">Tambah Tugas Baru</a>
        <table class="todo-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($todos)): ?>
                    <?php foreach ($todos as $index => $todo): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($todo['task']) ?></td>
                            <td><?= htmlspecialchars($todo['description']) ?></td>
                            <td id="task-status-<?= $todo['id'] ?>">
                                <?= $todo['is_completed'] ? 'Selesai' : 'Belum Selesai' ?>
                                <button onclick="toggleTaskStatus(<?= $todo['id'] ?>)" class="btn-toggle">Toggle</button>
                            </td>
                            <td>
                                <a href="index.php?action=edit&id=<?= $todo['id'] ?>" class="btn-edit">Edit</a>
                                <a href="index.php?action=delete&id=<?= $todo['id'] ?>" onclick="confirmDelete(event, <?= $todo['id'] ?>)" class="btn-delete">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Tidak ada tugas yang ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
