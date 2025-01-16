<?php
require_once 'controllers/TodoController.php';
$controller = new TodoController();
$todos = $controller->index();
require 'views/listTodos.php';
$action = $_GET['action'] ?? null;
switch ($action) {
    case 'add':
        $task = $_POST['task'] ?? '';
        $controller->add($task);
        break;
    case 'complete':
        $id = $_GET['id'] ?? '';
        $controller->markAsCompleted($id);
        break;
    case 'delete':
        $id = $_GET['id'] ?? '';
        $controller->delete($id);
        break;
}
$todos = $controller->index();
require 'views/listTodos.php';