<?php
require_once 'controllers/TodoController.php';

use Controllers\TodoController;

$controller = new TodoController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'create':
        include 'views/createTodo.php';
        break;
        
    case 'store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $description = isset($_POST['description']) ? trim($_POST['description']) : '';
            if (!empty($title) && !empty($description)) {
                $controller->store($title, $description);
                header('Location: index.php');
                exit;
            } else {
                echo "Title dan Description harus diisi!";
            }
        }
        break;
        
    case 'edit':
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : null;
        if ($id !== null) {
            $controller->edit($id);
        } else {
            header('Location: index.php');
        }
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['id']) ? intval($_POST['id']) : null;
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $description = isset($_POST['description']) ? trim($_POST['description']) : '';
            if ($id !== null && !empty($title) && !empty($description)) {
                $controller->update($id, $title, $description);
                header('Location: index.php');
                exit;
            } else {
                echo "Data tidak valid.";
            }
        }
        break;

    case 'delete':
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : null;
        if ($id !== null) {
            $controller->delete($id);
        }
        header('Location: index.php');
        break;

    default:
        $todos = $controller->index();
        if (is_array($todos)) {
            include 'views/listTodos.php';
        } else {
            echo "Gagal memuat daftar tugas.";
        }
        break;
}
?>
