document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const taskInput = document.querySelector('input[name="task"]');
    const todoList = document.querySelector('ul');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const task = taskInput.value.trim();
        if (!task) {
            alert('Task cannot be empty!');
            return;
        }

        try {
            const response = await fetch('?action=add', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ task })
            });

            if (response.ok) {
                const newTaskHTML = await response.text();
                todoList.insertAdjacentHTML('beforeend', newTaskHTML);
                taskInput.value = '';
            } else {
                alert('Failed to add task!');
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });
    todoList.addEventListener('click', async (event) => {
        if (event.target.tagName === 'A') {
            event.preventDefault();
            const action = event.target.href.split('?action=')[1].split('&')[0];
            const id = new URL(event.target.href).searchParams.get('id');

            if (!id) return;

            try {
                const response = await fetch(event.target.href, { method: 'GET' });

                if (response.ok) {
                    if (action === 'delete') {
                        event.target.closest('li').remove();
                    } else if (action === 'complete') {
                        const li = event.target.closest('li');
                        li.querySelector('a').remove();
                        li.textContent = li.textContent.trim();
                    }
                } else {
                    alert(`Failed to ${action} task!`);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
    });
});