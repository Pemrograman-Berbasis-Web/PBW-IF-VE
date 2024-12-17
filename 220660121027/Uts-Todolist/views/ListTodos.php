<?php
// Inisialisasi variabel $todos sebagai array kosong
$todos = [];

// Tambahkan kode untuk mengambil data dari database
// Misalnya:
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todolist_db";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) 
    die("Koneksi gagal: " . $conn->connect_error);

// Cek apakah ada permintaan untuk menambahkan tugas baru
if (isset($_GET['action']) && $_GET['action'] == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') 
    $task = $_POST['task']; // Ambil data tugas dari form
    if (!empty($task)) {
        // Siapkan dan jalankan pernyataan untuk menyimpan data ke database
        $stmt = $conn->prepare("INSERT INTO todos (task) VALUES (?)");
        $stmt->bind_param("s", $task);
        $stmt->execute();
        $stmt->close();    
}

// Logika untuk menghapus tugas
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM todos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Redirect ke halaman utama setelah penghapusan
    header("Location: listTodos.php");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'complete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("UPDATE todos SET is_completed = 1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Redirect ke halaman utama setelah update
    header("Location: listTodos.php");
    exit();
}



// Query untuk mengambil data todos dari database
$sql = "SELECT id, task, is_completed FROM todos";
$result = $conn->query($sql);

// Isi $todos dengan hasil query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $todos[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>
<body>
    <h1>Todo List</h1>
    <ul>
        <?php if (!empty($todos)): ?>
            <?php foreach ($todos as $todo): ?>
                <li>
                    <?php
                        echo $todo['task'];
                        if (!$todo['is_completed']) {
                            echo ' <a href="?action=complete&id=' . $todo['id'] . '">Mark as completed</a>';
                        }
                        echo ' <a href="?action=delete&id=' . $todo['id'] . '">Delete</a>';
                    ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Belum ada tugas.</li>
        <?php endif; ?>
    </ul>
    <form method="POST" action="?action=add">
        <input type="text" name="task" placeholder="New Task">
        <button type="submit">Add</button>
    </form>
</body>
</html>
