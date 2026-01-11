const list = document.getElementById('draggable-list');
let draggingElement = null;

list.addEventListener('dragstart', (e) => {

    if (e.target.classList.contains('sidebar-menu-item')) {
        draggingElement = e.target.closest('.file-item-wrapper');
        if (draggingElement) {
            draggingElement.classList.add('dragging');
        }
    }
});

list.addEventListener('dragover', (e) => {
    e.preventDefault();
    if (!draggingElement) return;
    
    const afterElement = getDragAfterElement(list, e.clientY);
    if (afterElement == null) {
        list.appendChild(draggingElement);
    } else {
        list.insertBefore(draggingElement, afterElement);
    }
});

list.addEventListener('dragend', () => {
    if (draggingElement) {
        draggingElement.classList.remove('dragging');
        saveNewOrder();
        draggingElement = null;
    }
});

function getDragAfterElement(container, y) {
    const draggableElements = [...container.querySelectorAll('.file-item-wrapper:not(.dragging)')];
    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;
        if (offset < 0 && offset > closest.offset) {
            return { offset: offset, element: child };
        } else {
            return closest;
        }
    }, { offset: Number.NEGATIVE_INFINITY }).element;
}

function saveNewOrder() {
    const items = [...list.querySelectorAll('.file-item-wrapper')];
    const order = items.map(item => {
        const link = item.querySelector('.sidebar-menu-item');
        return link ? link.getAttribute('data-name') : null;
    }).filter(Boolean);

    fetch('actions/save_order.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json'},
        body: JSON.stringify({ order: order })
    })
    .then(res => res.json())
    .then(data => console.log("Order saved"))
    .catch(err => console.error("Error saving order:", err));
}