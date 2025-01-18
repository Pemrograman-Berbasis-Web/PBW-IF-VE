// Event listener for when the document is loaded
document.addEventListener('DOMContentLoaded', function() {
    const addTodoForm = document.querySelector('.add-todo-form');
    const todoInput = document.querySelector('.add-todo-form input');
    const todoList = document.querySelector('.todo-list');

    // Event listener to add a new Todo
    addTodoForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const todoText = todoInput.value.trim();
        if (todoText !== '') {
            addTodoToList(todoText);
            todoInput.value = ''; // Clear the input after adding
        }
    });

    // Function to add Todo item to the list
    function addTodoToList(todoText) {
        const todoItem = document.createElement('li');
        todoItem.classList.add('todo-item');

        const todoContent = document.createElement('span');
        todoContent.classList.add('todo-text');
        todoContent.textContent = todoText;

        const actionsDiv = document.createElement('div');
        actionsDiv.classList.add('todo-actions');

        // Mark as completed button
        const completedButton = document.createElement('button');
        completedButton.classList.add('completed-btn');
        completedButton.textContent = '✔';
        completedButton.addEventListener('click', function() {
            todoContent.classList.toggle('completed');
        });

        // Edit button
        const editButton = document.createElement('button');
        editButton.classList.add('edit-btn');
        editButton.textContent = '✏';
        editButton.addEventListener('click', function() {
            const newTodoText = prompt('Edit your todo:', todoContent.textContent);
            if (newTodoText !== null) {
                todoContent.textContent = newTodoText;
            }
        });

        // Delete button
        const deleteButton = document.createElement('button');
        deleteButton.classList.add('delete-btn');
        deleteButton.textContent = '🗑';
        deleteButton.addEventListener('click', function() {
            todoItem.remove();
        });

        actionsDiv.appendChild(completedButton);
        actionsDiv.appendChild(editButton);
        actionsDiv.appendChild(deleteButton);

        todoItem.appendChild(todoContent);
        todoItem.appendChild(actionsDiv);

        todoList.appendChild(todoItem);
    }
});
