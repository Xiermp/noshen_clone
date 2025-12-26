<?php
session_start();
// Security Check: Redirect to login if user is not signed in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get the time of day for the greeting (Morning/Afternoon/Evening)
$hour = date('H');
if ($hour < 12) {
    $greeting = "Good morning";
} elseif ($hour < 18) {
    $greeting = "Good afternoon";
} else {
    $greeting = "Good evening";
}
$your_num = rand(1, 9999); // Example dynamic content
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Notion Clone</title>
    <link rel="stylesheet" href="../css/style_2.css">
    <style>
        /* CSS Specific to the Workspace Layout */
        /* body {
            margin: 0;
            font-family: var(--font-family-sans);
            color: var(--color-text);
            background-color: var(--color-white);
            height: 100vh;
            overflow: hidden; /* Prevent body scroll, let specific areas scroll */
        /* } */ 
        body {
            margin: 0;
            font-family: var(--font-family-sans);
            background: var(--color-gray-100);
        }

        /* .workspace {
            position: relative;
            width: 100vw;
            height: 100vh;
            background: var(--color-gray-200);
        } */

        .app-container {
            display: flex;
            height: 100%;
            width: 100%;
        }

        /* --- SIDEBAR STYLES --- */
        .sidebar {
            width: 240px;
            background-color: var(--color-gray-100);
            border-right: 1px solid var(--color-gray-300);
            display: flex;
            flex-direction: column;
            padding: var(--spacing-12);
            flex-shrink: 0;
            font-size: var(--font-size-100);
            color: var(--color-gray-600);
        }

        .user-switcher {
            padding: var(--spacing-8);
            margin-bottom: var(--spacing-12);
            font-weight: var(--font-weight-medium);
            color: var(--color-text);
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            border-radius: var(--border-radius-200);
        }
        .user-switcher:hover { background-color: var(--color-gray-200); }

        .user-switcher:active 
        .user-menu { 
            margin-left: 100px;
            margin-top: 120px;
            height: 100px;
            width: 200px;
            position: absolute;
            background-color: var(--color-gray-900);
            transition: 1s;
            
         }

        .sidebar-menu-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 10px;
            color: var(--color-gray-700);
            text-decoration: none;
            border-radius: var(--border-radius-200);
            margin-bottom: 2px;
            font-weight: var(--font-weight-medium);
        }
        .sidebar-menu-item:hover { background-color: var(--color-gray-200); }
        .sidebar-menu-item.active { background-color: var(--color-gray-200); color: var(--color-text); }
        
        .sidebar-section-title {
            font-size: var(--font-size-50);
            font-weight: var(--font-weight-semibold);
            color: var(--color-gray-500);
            margin-top: var(--spacing-24);
            margin-bottom: var(--spacing-4);
            padding-left: 10px;
        }

        /* --- MAIN CONTENT AREA --- */
        .main-content {
            flex-grow: 1;
            padding: var(--spacing-32) var(--spacing-64);
            overflow-y: auto; /* Allow this area to scroll */
            background-color: var(--color-white);
        }

        .greeting-title {
            font-size: var(--font-size-700);
            font-weight: var(--font-weight-bold);
            margin-bottom: var(--spacing-32);
            text-align: center;
        }

        /* Widgets (Recently Visited / Learn) */
        .widget-section { margin-bottom: var(--spacing-48); }
        
        .section-header {
            font-size: var(--font-size-100);
            font-weight: var(--font-weight-semibold);
            color: var(--color-gray-500);
            margin-bottom: var(--spacing-12);
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: var(--spacing-16);
        }

        .card {
            border: 1px solid var(--color-gray-200);
            border-radius: var(--border-radius-400);
            padding: var(--spacing-16);
            background: var(--color-white);
            box-shadow: var(--shadow-level-100);
            transition: box-shadow 0.2s, background 0.2s;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 120px;
        }

        .card:hover {
            background-color: var(--color-gray-100);
            box-shadow: var(--shadow-level-200);
        }

        .card-icon { font-size: 24px; margin-bottom: var(--spacing-8); }
        .card-title { font-weight: var(--font-weight-medium); font-size: var(--font-size-100); }
        .card-meta { font-size: var(--font-size-50); color: var(--color-gray-500); margin-top: auto; }

    </style>
</head>
<body>

<div class="app-container">
    <script>
        let spawn = document.querySelector('[name="user-menu"]');
    </script>
    <aside class="sidebar">
        <div class="user-switcher">
            <div style="width: 20px; height: 20px; background: orange; border-radius: 4px; display:flex; justify-content:center; align-items:center; color:white; font-size:12px;">N</div>
            <span><?php echo htmlspecialchars($_SESSION['user_name']); ?>'s Notion</span>
            <div class="user-menu" name="user-menu"></div>
        </div>

        <a href="#" class="sidebar-menu-item active">
            <span>🏠</span> Home
        </a>
        <a href="#" class="sidebar-menu-item">
            <span>📥</span> Inbox
        </a>
        <a href="#" class="sidebar-menu-item">
            <span>⚙️</span> Settings
        </a>

        <div class="sidebar-section-title">Private</div>
        <a href="#" class="sidebar-menu-item">
            <span>📄</span> To Do List
        </a>
        <a href="#" class="sidebar-menu-item">
            <span>📓</span> Journal
        </a>
        <a href="#" class="sidebar-menu-item" style="color: var(--color-gray-400);">
            <span>➕</span> Add a page
        </a>

        <div style="margin-top: auto;">
            <a href="index.php" class="sidebar-menu-item">
                <span>🚪</span> Log out
            </a>
        </div>
    </aside>


    <main class="main-content">
        
        <h1 class="greeting-title"><?php echo $greeting; ?>, <?php echo htmlspecialchars($_SESSION['user_name']); ?><br>your number is : <?php echo $your_num ?></h1>

        <div class="widget-section">
            <div class="section-header">🕒 Recently visited</div>
            
            <div class="card-grid">
                <a href="#" class="card">
                    <div>
                        <div class="card-icon">👋</div>
                        <div class="card-title">Welcome to Notion</div>
                    </div>
                    <div class="card-meta">You visited 5m ago</div>
                </a>

                <a href="#" class="card">
                    <div>
                        <div class="card-icon">✅</div>
                        <div class="card-title">Task List</div>
                    </div>
                    <div class="card-meta">You visited 1h ago</div>
                </a>
                
                <a href="#" class="card" style="border-style: dashed;">
                    <div>
                        <div class="card-icon">➕</div>
                        <div class="card-title">New page</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="widget-section">
            <div class="section-header">📚 Learn</div>
            
            <div class="card-grid">
                <a href="#" class="card">
                    <div class="card-title">What is a block?</div>
                    <div class="card-meta">2m read</div>
                </a>
                <a href="#" class="card">
                    <div class="card-title">Customize & style</div>
                    <div class="card-meta">5m read</div>
                </a>
                <a href="#" class="card">
                    <div class="card-title">Create your first page</div>
                    <div class="card-meta">Video • 4m</div>
                </a>
            </div>
        </div>

    </main>

</div>

</body>
</html>