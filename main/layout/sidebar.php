<?php
$user_dir = "../data/user_files/" . $_SESSION['user_email']; // Путь может отличаться, проверьте
// Если $user_dir не определен здесь, он берется из work_area.php, так как это include
$files = [];
if (is_dir($user_dir)) {
    $files = scandir($user_dir);
}
?>

<aside class="sidebar">
    
    <div class="sidebar-toggle-btn" onclick="toggleSidebar()">
        <svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
    </div>

    <div class="user-profile-wrap">
        <div class="user-btn" onclick="toggleUserMenu(event)">
            <div class="user-avatar">
                <?= strtoupper(substr($_SESSION['user_name'] ?? 'U', 0, 1)) ?>
            </div>
            <div class="user-name">
                <?= htmlspecialchars($_SESSION['user_name'] ?? 'User') ?>'s Notion
            </div>
            <div style="margin-left:auto; font-size:10px; opacity:0.6;">▼</div>
        </div>

        <div class="account-dropdown" id="userDropdown">
            <div class="dropdown-item" style="color: var(--text-muted); font-size: 12px;">
                <?= htmlspecialchars($_SESSION['user_email'] ?? '') ?>
            </div>
            <a href="?page=settings" class="dropdown-item">
                <span>⚙️</span> Settings
            </a>
            <div class="dropdown-divider"></div>
            <div class="dropdown-item" onclick="toggleTheme()" style="cursor:pointer; justify-content:space-between;">
                <span>🌗 Theme</span>
            </div>
            <div class="dropdown-divider"></div>
            <a href="index.php?logout=true" class="dropdown-item">
                <span>🚪</span> Log out
            </a>
        </div>
    </div>

    <div class="sidebar-menu">
        <a href="?create=true" class="sidebar-item" style="color: var(--text-muted);">
            <span style="color:var(--text-muted)">+</span> New Page
        </a>
        <a href="work_area.php" class="sidebar-item">
            <span>🏠</span> Home
        </a>
        <a href="?page=settings" class="sidebar-item">
            <span>⚙️</span> Settings
        </a>
    </div>

    <div class="sidebar-title">Private</div>

    <div style="flex-grow: 1; overflow-y: auto;">
        <?php foreach ($files as $file): ?>
            <?php if ($file === '.' || $file === '..') continue; ?>
            
            <div class="sidebar-item" onclick="window.location.href='?file=<?= urlencode($file) ?>'">
                <span>📄</span> 
                <div style="flex-grow:1; overflow:hidden; text-overflow:ellipsis;">
                    <?= htmlspecialchars(str_replace('.md', '', $file)) ?>
                </div>
                <a href="actions/delete.php?file=<?= urlencode($file) ?>" 
                   onclick="event.stopPropagation(); return confirm('Delete?')"
                   style="color: inherit; opacity: 0.4; padding:0 5px;">×</a>
            </div>
        <?php endforeach; ?>
    </div>
</aside>
