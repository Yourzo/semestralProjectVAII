document.addEventListener('DOMContentLoaded', function () {
    const createTaskModal = document.getElementById('createTaskModal');
    let sourceCategory = '';
    let deskId = "";

    createTaskModal.addEventListener('show.bs.modal', function (event) {
        const triggerElement = event.relatedTarget;
        sourceCategory = triggerElement.getAttribute('data-bs-whatever');

        const columnElement = triggerElement.closest('.desk-columns');
        deskId = columnElement.getAttribute('data-desk-id');

        const modalTitle = createTaskModal.querySelector('.modal-title');
        modalTitle.textContent = `Create Task for ${sourceCategory}`;
    });

    const saveButton = document.querySelector('.create-task-btn');
    saveButton.addEventListener('click', function () {
        const taskName = createTaskModal.querySelector('#name').value;

        if (taskName.trim() === '') {
            alert('Please enter a task name.');
            return;
        }

        fetch(`/create-task/${deskId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                name: taskName,
                status: sourceCategory,
            }),
        })
            .then((response) => {
                if (response.ok) {
                    alert('Task created successfully!');
                } else {
                    alert('Error creating task.');
                }
            })
            .catch((error) => console.error('Error:', error));

        const modalInstance = bootstrap.Modal.getInstance(createTaskModal);
        modalInstance.hide();
    });
});
