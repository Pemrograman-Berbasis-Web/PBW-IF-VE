<?php
namespace Models;

class Todo {
    private $db;

   public function __construct() {
    try {
        $this->db = new \PDO('mysql:host=localhost;dbname=todolist_db', 'admin_toto', 'SUMEDANG');  // Sesuaikan username dan password dengan yang benar
    } catch (\PDOException $e) {
        die("Koneksi ke database gagal: " . $e->getMessage());
    }
}

  public function getAll() {
    $stmt = $this->db->query("SELECT * FROM todos");
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
    // Debugging
    var_dump($result);  // Ini akan menampilkan data yang diambil dari database
    return $result;
}
    public function create($title, $description) {
        $stmt = $this->db->prepare("INSERT INTO todos (title, description) VALUES (:title, :description)");
        $stmt->execute(['title' => $title, 'description' => $description]);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM todos WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $description) {
        $stmt = $this->db->prepare("UPDATE todos SET title = :title, description = :description WHERE id = :id");
        $stmt->execute(['title' => $title, 'description' => $description, 'id' => $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM todos WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>