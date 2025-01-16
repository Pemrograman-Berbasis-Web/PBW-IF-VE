<?php
// Memanggil file TodoController.php untuk menggunakan class TodoController
require_once 'controllers/TodoController.php';

$controller = new TodoController();
$action = $_GET['action'] ?? null;

// Menangani parameter aksi
switch ($action) {
    case 'add':
        // Dapatkan tugas dari request
        $task = $_POST['task'] ?? '';
        $deadline = $_POST['deadline'] ?? '';

        // Tambahkan tugas ke daftar
        $controller->add($task, $deadline);
        break;
    case 'complete':
        // Dapatkan id dari request
        $id = $_GET['id'] ?? '';

        // Tandai tugas sebagai selesai
        $controller->markAsCompleted($id);
        break;
    case 'delete':
        // Dapatkan id dari request
        $id = $_GET['id'] ?? '';

        // Hapus tugas dari daftar
        $controller->delete($id);
        break;
}

// Dapatkan daftar tugas
$todos = $controller->index();

// Merender tampilan
require 'views/listTodos.php';