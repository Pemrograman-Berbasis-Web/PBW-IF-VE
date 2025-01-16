<?php
// controllers/TodoController.php
// Memanggil file TodoModel.php untuk menggunakan class TodoModel
require_once 'models/TodoModel.php';
/**
 * Kelas yang bertanggung jawab untuk menangani permintaan terkait TodoItems
 */
class TodoController {
    /**
     * Instans dari TodoModel
     * @var TodoModel
     */
    private $model;

    /**
     * Konstruktor untuk kelas
     */
    public function __construct() {
        $this->model = new TodoModel();
    }

    /**
     * Mengembalikan semua todo
     * @return array Sebuah array dari semua todo
     */
    public function index() {
        return $this->model->getAllTodos();
    }

    /**
     * Membuat todo baru
     * @param string $task Teks dari tugas
     * @return array Todo yang baru dibuat
     */
    public function add($task) {
        return $this->model->createTodo($task);
    }

    /**
     * Menandai todo sebagai selesai
     * @param int $id ID dari todo yang akan ditandai sebagai selesai
     * @return array Todo yang diperbarui
     */
    public function markAsCompleted($id) {
        return $this->model->updateTodoStatus($id, 1);
    }

    /**
     * Menghapus todo
     * @param int $id ID dari todo yang akan dihapus
     * @return array Todo yang dihapus
     */
    public function delete($id) {
        return $this->model->deleteTodo($id);
    }
}

//////////////////////////////////////////////////////////////////
<?php
// controllers/TodoController.php

require_once 'models/TodoModel.php';

class TodoController {
    private $model;

    /**
     * Konstruktor untuk inisialisasi model Todo
     */
    public function __construct() {
        $this->model = new TodoModel();
    }

    /**
     * Fungsi untuk mengambil semua todo
     * @return array
     */
    public function index() {
        return $this->model->getAllTodos();
    }

    /**
     * Fungsi untuk menambahkan todo baru
     * @param string $task
     * @return mixed
     */
    public function add($task) {
        return $this->model->createTodo($task);
    }

    /**
     * Fungsi untuk menandai todo sebagai selesai
     * @param int $id
     * @return mixed
     */
    public function markAsCompleted($id) {
        return $this->model->updateTodoStatus($id, 1);
    }

    /**
     * Fungsi untuk menghapus todo
     * @param int $id
     * @return mixed
     */
    public function delete($id) {
        return $this->model->deleteTodo($id);
    }
}