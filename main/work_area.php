<?php
session_start();
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }

$user_dir = "../data/user_files/" . $_SESSION['user_email'];
if (!is_dir($user_dir)) { mkdir($user_dir, 0777, true); }

if (isset($_GET['create'])) {
    $newFileName = "Untitled_" . date('Ymd_His') . ".md"; 
    $newFilePath = $user_dir . "/" . $newFileName;
    if (!file_exists($newFilePath)) file_put_contents($newFilePath, ""); 
    header("Location: ?file=" . urlencode($newFileName));
    exit();
}

$hour = date('H');
$greeting = ($hour < 12) ? "Good morning" : (($hour < 18) ? "Good afternoon" : "Good evening");
$your_num = rand(1, 9999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notion Clone</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<div class="app-container">
    <aside class="sidebar" id="mainSidebar">
        <div class="user-switcher" onclick="toggleAccountMenu(event)">
             <div style="display:flex; align-items:center; gap:8px;">
                <div style="width:20px; height:20px; background:orange; border-radius:4px; color:white; display:flex; justify-content:center; align-items:center; font-size:12px;">
                    <?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?>
                </div>
                <span style="font-weight:600; font-size:14px;"><?php echo htmlspecialchars($_SESSION['user_name']); ?>'s Notion</span>
             </div>
             
             <div class="account-popover" id="accountPopover">
                <a href="?page=settings" class="sidebar-menu-item">⚙️ Settings</a>
                <a href="index.php" class="sidebar-menu-item">🚪 Log out</a>
             </div>
        </div>

        <nav style="padding: 0 12px;">
            <a href="?" class="sidebar-menu-item">🏠 Home</a>
            <a href="?create=1" class="sidebar-menu-item">➕ New Page</a>
        </nav>

        <div class="sidebar-section-workspace" id="draggable-list">
            <?php
            $physical_files = array_diff(scandir($user_dir), array('.', '..'));
            foreach ($physical_files as $file) {
                $url = urlencode($file);
                echo "
                <div class='sidebar-menu-item' draggable='true' data-name='$url'>
                    <a href='?file=$url' style='text-decoration:none; color:inherit; flex-grow:1; display:flex; align-items:center;'>
                        <span style='margin-right:8px;'>📄</span> " . htmlspecialchars($file) . "
                    </a>
                    <a href='actions/delete.php?file=$url' class='delete-file-btn' onclick='return confirm(\"Delete?\")'>×</a>
                </div>";
            }
            ?>
        </div>
    </aside>

    <div class="sidebar-toggle-container" id="toggleContainer">
        <div class="sidebar-toggle-btn" onclick="toggleSidebar()">
            <svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
        </div>
    </div>

    <main class="main-content">
        <?php 
        // Логика include editor.php или home.php
        if(isset($_GET['file'])) include "layout/editor.php";
        else include "layout/home.php";
        ?>
    </main>
</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('mainSidebar');
    sidebar.classList.toggle('collapsed');
}

function toggleAccountMenu(e) {
    e.stopPropagation();
    document.getElementById('accountPopover').classList.toggle('active');
}

document.addEventListener('click', () => {
    document.getElementById('accountPopover').classList.remove('active');
});
</script>

<script>
    function toggleSidebar() {
        document.getElementById('mainSidebar').classList.toggle('collapsed');
    }

    function toggleAccountMenu(e) {
        e.stopPropagation();
        document.getElementById('accountPopover').classList.toggle('active');
    }

    document.addEventListener('click', () => {
        const popover = document.getElementById('accountPopover');
        if(popover) popover.classList.remove('active');
    });

    function toggleTheme() {
        const html = document.documentElement;
        const current = html.getAttribute('data-theme');
        const next = current === 'dark' ? 'light' : 'dark';
        html.setAttribute('data-theme', next);
        localStorage.setItem('theme', next);
    }

    const dragList = document.getElementById('draggable-list');
    let draggedItem = null;

    dragList.addEventListener('dragstart', (e) => {
        draggedItem = e.target;
        e.target.style.opacity = '0.5';
    });

    dragList.addEventListener('dragend', (e) => {
        e.target.style.opacity = '1';
    });

    dragList.addEventListener('dragover', (e) => {
        e.preventDefault();
        const afterElement = getDragAfterElement(dragList, e.clientY);
        if (afterElement == null) {
            dragList.appendChild(draggedItem);
        } else {
            dragList.insertBefore(draggedItem, afterElement);
        }
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
</script>
</body>
</html>