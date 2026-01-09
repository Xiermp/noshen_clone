<?php
$user_dir = "data/user_files/" . $_SESSION['user_email'];
if (!is_dir($user_dir)) mkdir($user_dir, 0777, true);

$files = scandir($user_dir);
?>

<aside class="sidebar">
    <a href="index.php" class="sidebar-item">🏠 Home</a>

    <div class="sidebar-title">Pages</div>

    <?php foreach ($files as $file): ?>
        <?php if ($file === '.' || $file === '..') continue; ?>
        <a href="?file=<?= urlencode($file) ?>" class="sidebar-item">
            📄 <?= htmlspecialchars($file) ?> " " 
            <a href="actions/delete.php?file=myfile.md"
            onclick="return confirm('Delete this file?')"
            class="delete-btn">
            🗑
            </a>
        </a>
    <?php endforeach; ?>
</aside>
