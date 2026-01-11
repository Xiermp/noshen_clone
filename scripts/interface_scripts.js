// function interfaceScripts() {
//     document.getElementById("add_seting_button").addEventListener("click", function() {
//         const settingsMenu = document.getElementById("settings_menu");
//         if (settingsMenu.style.display === "block") {
//             settingsMenu.style.display = "none";
//         } else {
//             settingsMenu.style.display = "block";
//         }
//     });
    
//     console.log("Interface scripts loaded.");
// }
const list = document.getElementById('draggable-list');
let draggingElement = null;

list.addEventListener('dragstart', (e) => {
    draggingElement = e.target;
    e.target.classList.add('dragging');
});

list.addEventListener('dragover', (e) => {
    e.preventDefault();
    const afterElement = getDragAfterElement(list, e.clientY);
    if (afterElement == null) {
        list.appendChild(draggingElement);
    } else {
        list.insertBefore(draggingElement, afterElement);
    }
});

list.addEventListener('dragend', () => {
    draggingElement.classList.remove('dragging');
    saveNewOrder();
});

function getDragAfterElement(container, y) {
    const draggableElements = [...container.querySelectorAll('.sidebar-menu-item:not(.dragging)')];
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
    const items = [...list.querySelectorAll('.sidebar-menu-item')];
    const order = items.map(item => item.getAttribute('data-name'));

    fetch('actions/save_order.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json'},
        body: JSON.stringify({ order: order })
    })
    .then(res => res.json())
    .then(data => console.log("Order saved"));
}
 
// user bar drop out
// document.addEventListener('DOMContentLoaded', () => {
//     const switcherBtn = document.getElementById('user-switcher-btn');
//     const dropdown = document.getElementById('user-dropdown');


//     switcherBtn.addEventListener('click', (e) => {

//         e.stopPropagation(); 
//         dropdown.classList.toggle('active');
//     });


//     document.addEventListener('click', (e) => {
//         if (!dropdown.contains(e.target) && dropdown.classList.contains('active')) {
//             dropdown.classList.remove('active');
//         }
//     });
// });