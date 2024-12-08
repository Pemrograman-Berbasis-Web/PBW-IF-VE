<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tugas Baru</title>
</head>
<body>
    <h1>Tambah Tugas Baru</h1>
    <form action="index.php?action=store" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>