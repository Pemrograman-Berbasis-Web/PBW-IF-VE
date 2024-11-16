<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="assets/css/createstyle.css">
</head>
<body>
    <h1>Edit Tugas</h1>
    <?php if ($todo): ?>
        <form action="index.php?action=update" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($todo['id']) ?>">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?= htmlspecialchars($todo['title']) ?>" required>
            <br>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required><?= htmlspecialchars($todo['description']) ?></textarea>
            <br>
            <button type="submit">Update</button>
        </form>
    <?php else: ?>
        <p>Tugas tidak ditemukan.</p>
    <?php endif; ?>
</body>
</html>