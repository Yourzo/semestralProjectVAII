let lists = document.querySelectorAll('.draggable-list');
lists.forEach(list => {
   listAddEventListeners(list);
});

export function listAddEventListeners(list) {
    list.addEventListener('dragover', function(event) {
        event.preventDefault();
    });

    list.addEventListener('drop', function(event) {
        event.preventDefault();

        const draggedElement = document.querySelector('.dragging');
        if (!draggedElement) {
            return;
        }
        list.appendChild(draggedElement);

        draggedElement.classList.remove('dragging');
        updateDeskOrder(list, draggedElement);
    });

    list.addEventListener('dragstart', function(event) {
        if (event.target.tagName === 'LI') {
            event.target.classList.add('dragging');
        }
    });

    list.addEventListener('dragend', function(event) {
        if (event.target.tagName === 'LI') {
            event.target.classList.remove('dragging');
        }
    });
}

document.querySelectorAll('li').forEach(item => {
    item.addEventListener('dragstart', function(event) {
        item.classList.add('dragging');
    });

    item.addEventListener('dragend', function() {
        item.classList.remove('dragging');
    });
});

function updateDeskOrder(list, draggedElement) {
    const taskId = draggedElement.getAttribute('data-task-id');
    const destColumn = list.getAttribute('data-column');
    const deskId = list.closest('.desk-columns').getAttribute('data-desk-id');
    fetch(`/set-tasks/${deskId}`,{
        method: 'POST',
        headers: {
            'Content-Type' : 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            dest_column: destColumn,
            task_id: taskId,
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log("Tasks order updated successfully");
            } else {
                console.error('Failed to update tasks')
            }
        })
        .catch(error => console.error('Error: ', error));
}
