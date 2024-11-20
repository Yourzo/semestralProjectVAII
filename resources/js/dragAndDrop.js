// Get all UL elements with the class "draggable-list"
let lists = document.querySelectorAll('.draggable-list');

// Add event listeners to each UL for drag-and-drop operations
lists.forEach(list => {
    // Allow the list to be a drop target
    list.addEventListener('dragover', function(event) {
        event.preventDefault(); // Allow drop by preventing the default behavior
    });

    // Handle the drop event when a li is dropped onto a list
    list.addEventListener('drop', function(event) {
        event.preventDefault(); // Prevent default behavior (open as link for example)

        // Get the dragged li element and append it to the target list
        const draggedElement = document.querySelector('.dragging');
        list.appendChild(draggedElement);

        // Remove the "dragging" class after drop
        draggedElement.classList.remove('dragging');
    });
});

// Handle the dragstart event to mark the dragged item
document.querySelectorAll('li').forEach(item => {
    item.addEventListener('dragstart', function(event) {
        // Add a "dragging" class to the item being dragged
        item.classList.add('dragging');
    });

    item.addEventListener('dragend', function() {
        // Remove the "dragging" class after the drag ends
        item.classList.remove('dragging');
    });
});
