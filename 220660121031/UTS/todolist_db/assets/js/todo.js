document.addEventListener("DOMContentLoaded", function() {
    // Ambil semua elemen tombol "Mark as completed" dan "Delete"
    const completeButtons = document.querySelectorAll(".complete");
    const deleteButtons = document.querySelectorAll(".delete");
    const addTaskForm = document.getElementById("add-task-form");
    const taskInput = document.getElementById("task");

    // Event listener untuk tombol "Mark as completed"
    completeButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            const todoId = this.closest('li').id.split('-')[1]; // Ambil ID todo
            markAsCompleted(todoId);
        });
    });

    // Event listener untuk tombol "Delete"
    deleteButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            const todoId = this.closest('li').id.split('-')[1];
            deleteTodo(todoId);
        });
    });

    // Fungsi untuk menandai tugas sebagai selesai
    function markAsCompleted(id) {
        const todoItem = document.getElementById(`todo-${id}`);
        todoItem.classList.add('completed');
        updateTaskStatus(id, true);  // Kirim status ke server
    }

    // Fungsi untuk menghapus tugas
    function deleteTodo(id) {
        const todoItem = document.getElementById(`todo-${id}`);
        todoItem.remove();
        deleteTask(id);  // Hapus dari server
    }

    // Kirim permintaan untuk mengupdate status tugas ke server
    function updateTaskStatus(id, isCompleted) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `?action=complete&id=${id}&status=${isCompleted}`, true);
        xhr.send();
    }

    // Kirim permintaan untuk menghapus tugas dari server
    function deleteTask(id) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `?action=delete&id=${id}`, true);
        xhr.send();
    }

    // Event listener untuk form penambahan tugas
    addTaskForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah reload halaman

        const task = taskInput.value.trim();
        if (task) {
            addNewTask(task);
            taskInput.value = ""; // Kosongkan input
        }
    });

    // Fungsi untuk menambah tugas baru
    function addNewTask(task) {
        const ul = document.getElementById("todo-list");

        // Buat elemen <li> untuk tugas baru
        const li = document.createElement("li");
        li.innerHTML = `
            <span>${task}</span>
            <a class="btn complete" href="#">Mark as completed</a>
            <a class="btn btn-danger delete" href="#">Delete</a>
        `;

        // Tambahkan elemen <li> ke dalam list
        ul.appendChild(li);

        // Menambahkan event listener pada tombol baru
        li.querySelector(".complete").addEventListener("click", function(event) {
            event.preventDefault();
            markAsCompleted(li);
        });

        li.querySelector(".delete").addEventListener("click", function(event) {
            event.preventDefault();
            li.remove();
        });

        // Kirim permintaan ke server untuk menambah tugas
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "?action=add", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(`task=${encodeURIComponent(task)}`);
    }
});