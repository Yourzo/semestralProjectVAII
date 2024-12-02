console.log("djasfbisudfs32456475");

document.getElementById('create-task-btn').addEventListener('click', function() {
    const taskName = document.getElementById('task-name').value;
    const deskId = document.querySelector('.desk-columns').getAttribute('data-desk-id');
    const column = 'todo';
    // Make sure the task name is not empty
    if (taskName.trim() === '') {
        alert('Please enter a task name');
        return;
    }

    // AJAX request to create the task
    fetch(`/create-task/${deskId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({
            name: taskName,
            desk_id: deskId,
            column: column
        }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Append the new task to the To Do list
                const newTask = document.createElement('li');
                newTask.classList.add('list-group-item', 'desk-tiles');
                newTask.textContent = data.task.name; // Assuming the response has task data
                newTask.setAttribute('data-task-id', data.task.id);
                document.getElementById('todo-list').appendChild(newTask);
                document.getElementById('task-name').value = ''; // Clear input field
            } else {
                console.error('Failed to create task');
            }
        })
        .catch(error => console.error('Error:', error));
});
