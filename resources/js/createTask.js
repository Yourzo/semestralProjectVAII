import {butEventListener} from "./deleteTask.js";
import {listAddEventListeners} from "./dragAndDrop.js";

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
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    appendTaskToColumn(data.task)
                } else {
                    alert('Error creating task.');
                }
            })
            .catch((error) => console.error('Error:', error));

        const modalInstance = bootstrap.Modal.getInstance(createTaskModal);
        modalInstance.hide();
    });
});

function appendTaskToColumn(task) {
    const column = document.querySelector(`[data-column="${task.status}"]`);
    const newTaskElement = document.createElement('li');
    newTaskElement.setAttribute('draggable', 'true');
    newTaskElement.setAttribute('data-task-id', task.id);
    newTaskElement.classList.add('list-group-item', 'desk-tiles');
    newTaskElement.innerHTML= task.name + '<i class="bi bi-trash3-fill float-end delete-task-btn"></i>';
    column.appendChild(newTaskElement);
    butEventListener(newTaskElement.querySelector('.delete-task-btn'));
    listAddEventListeners(column);
}
