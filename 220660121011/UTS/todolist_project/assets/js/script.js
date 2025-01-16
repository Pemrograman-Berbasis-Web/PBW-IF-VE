document.addEventListener("DOMContentLoaded", function () {
const taskList = document.getElementById("taskList");
const taskForm = document.getElementById("taskForm");
const taskInput = document.getElementById("taskInput");
const deadlineInput = document.getElementById("deadlineInput");
const taskCount = document.getElementById("taskCount");
const progressBar = document.getElementById("progress");

let editingTaskElement = null;

// Memperbarui statisik kemajuan tugas
function updateTaskStats() {
    const totalTasks = taskList.children.length;
    const completedTasks = document.querySelectorAll("#taskList .task.completed").length;
    taskCount.textContent = `${completedTasks} / ${totalTasks}`;

    const progressPercentage = totalTasks ? (completedTasks / totalTasks) * 100 : 0;
    progressBar.style.width = `${progressPercentage}%`;
}

// Perubahan ketika tugas selesai
function toggleTaskCompletion(taskElement) {
    taskElement.classList.toggle("completed");
    const taskName = taskElement.querySelector("span", "p");
    taskName.style.textDecoration = taskElement.classList.contains("completed")
        ? "line-through"
        : "none";

    updateTaskStats();
}

// Menginisialisasi statistik tugas saat dimuat
updateTaskStats();
});