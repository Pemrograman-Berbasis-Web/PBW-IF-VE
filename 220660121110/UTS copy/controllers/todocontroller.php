<?php
namespace Controllers;
require_once 'models/Todo.php';

use Models\Todo; 

class TodoController {
    private $todoModel;

    public function __construct() {
       
        $this->todoModel = new Todo(); 
    }

  
    public function index() {
    $todos = $this->todoModel->getAll(); 
    include 'views/listTodos.php'; 
}
    public function create() {
        include 'views/createTodo.php'; 
    }

   
    public function store($task) {
        $this->todoModel->create($task); 
        header('Location: index.php'); 
    }

    
    public function edit($id) {
        $todo = $this->todoModel->getById($id);
        include 'views/editTodo.php'; 
    }

   
    public function update($id, $task, $is_completed) {
        $this->todoModel->update($id, $task, $is_completed); 
        header('Location: index.php');
    }

    
    public function delete($id) {
        $this->todoModel->delete($id);
        header('Location: index.php'); 
    }

    
    public function toggle($id) {
        $this->todoModel->toggleComplete($id); 
        header('Location: index.php'); 
    }
}
?>