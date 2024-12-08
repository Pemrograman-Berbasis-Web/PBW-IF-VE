<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- Menghubungkan file CSS terpisah -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        <ul id="todo-list">
            <?php foreach ($todos as $todo): ?>
                <li id="todo-<?php echo $todo['id']; ?>" class="<?php echo $todo['is_completed'] ? 'completed' : ''; ?>">
                    <span class="task"><?php echo $todo['task']; ?></span>
                    <?php if (!$todo['is_completed']): ?>
                        <a class="btn complete" href="?action=complete&id=<?php echo $todo['id']; ?>">Mark as completed</a>
                    <?php endif; ?>
                    <a class="btn btn-danger delete" href="?action=delete&id=<?php echo $todo['id']; ?>">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="form-container">
            <form method="POST" action="?action=add">
                <input type="text" name="task" placeholder="New Task" required>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>

    <!-- Menghubungkan file JavaScript -->
    <script src="assets/js/todo.js"></script>
</body>
</html>