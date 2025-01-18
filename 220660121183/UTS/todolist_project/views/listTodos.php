<!-- views/listTodos.php -->
<!DOCTYPE html>
<html>
    <head>
        <title>To-Do List</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <script src="assets/js/script.js"></script>
    </head>
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

                    <!-- Menghitung total tugas -->
                    <div class="stats-numbers">
                        <p id="taskCount"><?php echo count($todos); ?> / <?php echo count($todos); ?></p>
                    </div>
                </div>
            
                <!-- Form untuk menambahkan tugas -->
                <form method="POST" action="?action=add" id="taskForm">
                    <input type="text" name="task" id="taskInput" placeholder="Write your task" required>
                    <input type="date" name="deadline" id="deadlineInput" required>
                    <button type="submit">&#10010;</button>
                </form>

                <!-- Kontainer untuk daftar tugas -->
                <div class="task-list-container">
                    <ul id="taskList" class="task-list">
                        <?php foreach ($todos as $todo): ?>
                            <li class="task <?php echo $todo['is_completed'] ? 'completed' : ''; ?>">
                                <span><?php echo htmlspecialchars($todo['task'], ENT_QUOTES, 'UTF-8'); ?></span>
                                <p class="deadline">Deadline: <?php echo htmlspecialchars($todo['deadline'], ENT_QUOTES, 'UTF-8'); ?></p>
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