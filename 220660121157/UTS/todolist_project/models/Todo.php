<?php

class Todo {
    public $id;
    public $task;
    public $is_completed;
    public $created_at;
    public $updated_at;
    public $deadline;

    /**
     * Konstruktor untuk Todo
     * @param int $id ID dari todo
     * @param string $task Tugas dari todo
     * @param bool $is_completed Apakah todo diselesaikan
     * @param string $created_at Timestamp pembuatan todo
     * @param string $updated_at Timestamp pembaharuan todo
     * @param string $deadline tenggat waktu tugas
     */
    public function __construct($id, $task, $is_completed, $created_at, $updated_at, $deadline) {
        $this->id = $id;
        $this->task = $task;
        $this->is_completed = $is_completed;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deadline = $deadline;
    }
}
?>