document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-task-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const taskId = this.closest('li').getAttribute('data-task-id');

            if (confirm('Are you sure you want to delete this task?')) {
                deleteTask(taskId, this.closest('li'));
            }
        });
    });
});

function deleteTask(taskId, taskElement) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/delete-task/${taskId}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(response => {
            if (response.ok) {
                taskElement.remove();
            } else {
                alert('Failed to delete the task. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
}
