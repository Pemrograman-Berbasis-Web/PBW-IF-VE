<?php

namespace Models;

class todomodels {

}
    private $db;

    
    public function __construct() {



       
        $host = 'localhost';
        $dbname = 'todolist_db'; 
        $username = 'admin_ucup'; 
        $password = 'SUMEDANG'; 
        
      try {
    $this->db = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM todos");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
    }

  
    public function create($task) {
        
        $stmt = $this->db->prepare("INSERT INTO todos (task, is_completed) VALUES (:task, :is_completed)");
        $stmt->execute(['task' => $task, 'is_completed' => 0]); 
    }

   
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM todos WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC); 
    }

    
    public function update($id, $task, $is_completed) {
        $stmt = $this->db->prepare("UPDATE todos SET task = :task, is_completed = :is_completed WHERE id = :id");
        $stmt->execute(['id' => $id, 'task' => $task, 'is_completed' => $is_completed]);
    }

    
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM todos WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

   
    public function toggleComplete($id) {
        
        $stmt = $this->db->prepare("SELECT is_completed FROM todos WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $todo = $stmt->fetch(\PDO::FETCH_ASSOC);

       
        $newStatus = $todo['is_completed'] == 0 ? 1 : 0;
        
        
        $stmt = $this->db->prepare("UPDATE todos SET is_completed = :is_completed WHERE id = :id");
        $stmt->execute(['id' => $id, 'is_completed' => $newStatus]);
    }
}

?>


