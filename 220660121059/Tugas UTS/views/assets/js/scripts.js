document.addEventListener("DOMContentLoaded", () => {
    const completeLinks = document.querySelectorAll('a[data-action="complete"]');
    completeLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            const taskId = link.dataset.id;
            fetch(`?action=complete&id=${taskId}`, { method: "GET" })
                .then(response => response.ok ? window.location.reload() : alert("Failed to mark as completed."));
        });
    });

    const deleteLinks = document.querySelectorAll('a[data-action="delete"]');
    deleteLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            const taskId = link.dataset.id;
            if (confirm("Are you sure you want to delete this task?")) {
                fetch(`?action=delete&id=${taskId}`, { method: "GET" })
                    .then(response => response.ok ? window.location.reload() : alert("Failed to delete task."));
            }
        });
    });

    const taskForm = document.querySelector("form");
    taskForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const taskInput = taskForm.querySelector('input[name="task"]');
        const task = taskInput.value.trim();
        if (task === "") return alert("Task cannot be empty.");
        fetch("?action=add", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ task: task }),
        }).then(response => response.ok ? window.location.reload() : alert("Failed to add task."));
    });
});
