

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-task-btn').forEach(button => {
        butEventListener(button);
    });
});

export function butEventListener(button) {
    button.addEventListener('click', function (e) {
        e.preventDefault();

        const taskId = this.closest('li').getAttribute('data-task-id');
        const hiddenInput = document.getElementById('hiddenInput');
        const deskId = hiddenInput.value;
        if (confirm('Are you sure you want to delete this task?')) {
            deleteTask(taskId, this.closest('li'), deskId);
        }
    });
}

function deleteTask(taskId, taskElement, deskId) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/delete-task/${taskId}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            deskId: deskId,
        })
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
