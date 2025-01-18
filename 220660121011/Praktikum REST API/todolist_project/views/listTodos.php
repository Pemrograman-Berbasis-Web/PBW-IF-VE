<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
    <!-- Menyertakan jQuery dari CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk memuat semua todo dari API
            function loadTodos() {
                $.get('api.php?action=list', function(data) {
                    var todoList = $('#todo-list');
                    todoList.empty();
                    data.forEach(function(todo) {
                        var li = $('<li>').text(todo.task);
                        if (!todo.is_completed) {
                            li.append(' <a href="#" class="complete" data-id="' + todo.id + '">Mark as completed</a>');
                        }
                        li.append(' <a href="#" class="delete" data-id="' + todo.id + '">Delete</a>');
                        todoList.append(li);
                    });
                });
            }

            // Add todo
            // Fungsi untuk menambahkan todo baru
            $('#add-form').submit(function(e) {
                e.preventDefault();
                var task = $('#task').val();
                $.post('api.php?action=add', JSON.stringify({task: task}), function() {
                    $('#task').val('');
                    loadTodos();
                });
            });

            // Complete todo
            // // Fungsi untuk menandai todo sebagai selesai
            $(document).on('click', '.complete', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: 'api.php?action=complete',
                    type: 'PUT',
                    data: JSON.stringify({id: id}),
                    success: loadTodos
                });
            });

            // Delete todo
            // Fungsi untuk menghapus todo
            $(document).on('click', '.delete', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: 'api.php?action=delete',
                    type: 'DELETE',
                    data: JSON.stringify({id: id}),
                    success: loadTodos
                });
            });

            // Initial load
            // Memuat todos pada inisialisasi awal
            loadTodos();
        });
    </script>
</head>
<body>
<body>
    <div class="wrapper">
        <div class="container">
            <!-- Kontainer untuk statistik tugas -->
            <div class="stats-container">
                <div class="detail">
                    <h1>To-<span>Do</span> List</h1>
                    <p>Keep it up!</p>
                    <div id="progressBar">
                        <div id="progress"></div>
                    </div>
                </div>

                <!-- Menghitung total task -->
                <div class="stats-numbers">
                    <p id="taskCount"><?php echo count($todos); ?> / <?php echo count($todos); ?></p>
                </div>
            </div>

            <!-- Form untuk menambah atau mengedit tugas -->
            <form method="POST" action="?action=add" id="taskForm">
                <input type="text" name="task" id="taskInput" placeholder="Write your task" required>
                <button type="submit">&#10010;</button>
            </form>

            <!-- Kontainer untuk daftar tugas -->
            <div class="task-list-container">
                <ul id="taskList" class="task-list">
                    <?php foreach ($todos as $todo): ?>
                        <li class="task <?php echo $todo['is_completed'] ? 'completed' : ''; ?>">
                            <span><?php echo htmlspecialchars($todo['task'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <div class="actions">
                                <?php if (!$todo['is_completed']): ?>
                                    <a href="?action=complete&id=<?php echo $todo['id']; ?>" class="complete">✔</a>
                                <?php endif; ?>
                                <a href="?action=delete&id=<?php echo $todo['id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete the task?')">✖</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>  
</body>
</html>