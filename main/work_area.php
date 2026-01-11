<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_dir = "../data/user_files/" . $_SESSION['user_email'];

if (!is_dir($user_dir)) {
    mkdir($user_dir, 0777, true);
}


if (isset($_GET['create'])) {

    $newFileName = "Untitled_" . date('Ymd_His') . ".md"; 
    $newFilePath = $user_dir . "/" . $newFileName;
    
    if (!file_exists($newFilePath)) {
        file_put_contents($newFilePath, ""); 
    }
    
    header("Location: ?file=" . urlencode($newFileName));
    exit();
}
// session_start();

// // 1. Security Check
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

// $user_dir = "../data/user_files/" . $_SESSION['user_email'];

// // 2. Ensure User Directory Exists
// if (!is_dir($user_dir)) {
//     mkdir($user_dir, 0777, true);
// }

// // 3. LOGIC: Create New Page
// // Если нажали "Add a page", создаем файл и редиректим на него
// if (isset($_GET['create'])) {
//     $newFileName = "Untitled_" . date('Ymd_His') . ".txt"; // Уникальное имя
//     $newFilePath = $user_dir . "/" . $newFileName;
    
//     if (!file_exists($newFilePath)) {
//         file_put_contents($newFilePath, ""); // Создаем пустой файл
//     }
    
//     // Перенаправляем пользователя сразу в этот файл
//     header("Location: ?file=" . urlencode($newFileName));
//     exit();
// }

// 4. Greeting Logic
$hour = date('H');
if ($hour < 12) {
    $greeting = "Good morning";
} elseif ($hour < 18) {
    $greeting = "Good afternoon";
} else {
    $greeting = "Good evening";
}
//  probably i use it late
// if (!isset($_SESSION['already_welcomed'])){

//     $_SESSION['your_number'] = rand(1, 9999);
//     $_SESSION['already_welcomed'] = true;
// }
// $your_num = $_SESSION['your_number'];


?>
<script src="../scripts/them_change.js"></script>
<!-- <script>
    function updateTheme(theme) {

    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);


    fetch('update_theme.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'theme=' + theme
    })
    .then(response => response.text())
    .then(data => console.log('Session updated:', data))
    .catch(error => console.error('Error:', error));
}
</script> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Notion Clone</title>
    
    <link rel="stylesheet" href="../css/style_2.css">
    <link rel="stylesheet" href="../css/style_work_ar.css">
    <link rel="stylesheet" href="../css/main.css">
    
    
    <script src="../scripts/interface_scripts.js" defer></script>

    <style>
        /* CSS Specific to the Workspace Layout */
        
    </style>
</head>
<body>

<div class="app-container">

    <aside class="sidebar">
        <div class="user-switcher" id="user-switcher-btn">
            <div style="width: 20px; height: 20px; background: orange; border-radius: 4px; display:flex; justify-content:center; align-items:center; color:white; font-size:12px; flex-shrink:0;">
                <?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?>
            </div>
            <span class="user-name-text"><?php echo htmlspecialchars($_SESSION['user_name']); ?>'s Notion</span>
            <span style="margin-left: auto; font-size: 10px; color: var(--text-muted);">↕</span>

            <div class="user-dropdown" id="user-dropdown">
                <div class="dropdown-header">
                    <small><?php echo htmlspecialchars($_SESSION['user_email']); ?></small>
                </div>
                <hr class="settings-divider">
                <a href="?page=settings" class="dropdown-item">
                    <span>⚙️</span> Settings
                </a>
                <a href="?create=1" class="dropdown-item">
                    <span>➕</span> Create new page
                </a>
                <hr class="settings-divider">
                <a href="index.php" class="dropdown-item" style="color: #eb5757;">
                    <span>🚪</span> Log out
                </a>
            </div>
        </div>

        <a href="?" class="sidebar-menu-item <?php echo !isset($_GET['file']) ? 'active' : ''; ?>">
            <span>🏠</span> Home
        </a>
        <a href="#" class="sidebar-menu-item">
            <span>📥</span> Inbox
        </a>
        <!-- <a href="?page=settings" class="sidebar-menu-item <?php echo (isset($_GET['page']) && $_GET['page'] === 'settings') ? 'active' : ''; ?>">
            <span>⚙️</span> Settings
        </a> -->
        
        <div class="sidebar-section-title">Private</div>
        
        <a href="?create=1" class="sidebar-menu-item">
            <span>➕</span> Add a page
        </a>

        <div class="sidebar-section-workspace" id="draggable-list">
        <?php

        $physical_files = array_diff(scandir($user_dir), array('.', '..'));


        foreach ($physical_files as $file) {
            $isActive = (isset($_GET['file']) && $_GET['file'] === $file) ? 'active' : '';
            
            echo '<a href="?file='.urlencode($file).'" 
                    class="sidebar-menu-item '.$isActive.'" 
                    draggable="true" 
                    data-name="'.htmlspecialchars($file).'">
                <span>📄</span> '.htmlspecialchars($file).'
            </a>';
        }
        ?>
        </div>
        
        

        <!-- <div style="margin-top: auto;">
            <a href="index.php" class="sidebar-menu-item">
                <span>🚪</span> Log out
            </a>
        </div> -->
    </aside>

    <main class="main-content">
    <?php
        if (isset($_GET['file'])) {

            if (file_exists("layout/editor.php")) {
                include "layout/editor.php";
            } else {
                echo "<div style='padding:20px'>Error: Editor file not found.</div>";
            }
        } 
        elseif (isset($_GET['page']) && $_GET['page'] === 'settings') {

            if (file_exists("layout/settings.php")) {
                include "layout/settings.php";
            } else {
                echo "<div style='padding:50px'><h1>Settings</h1><p>comming soon</p></div>";
            }
        } 
        else {

            if (file_exists("layout/home.php")) {
                include "layout/home.php";
            } else {
                echo "<div style='padding:50px'>
                        <h1>$greeting, " . htmlspecialchars($_SESSION['user_name']) . "</h1>
                        <p>Select a page from the sidebar to start writing.</p>
                    </div>";
            }
        }
    ?>
    </main>

</div>
<script>
// user bar drop out
document.addEventListener('DOMContentLoaded', () => {
    const switcherBtn = document.getElementById('user-switcher-btn');
    const dropdown = document.getElementById('user-dropdown');


    switcherBtn.addEventListener('click', (e) => {

        e.stopPropagation(); 
        dropdown.classList.toggle('active');
    });


    document.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target) && dropdown.classList.contains('active')) {
            dropdown.classList.remove('active');
        }
    });
});</script>
</body>
</html>