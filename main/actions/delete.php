<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['file'])) {
    header("Location: work_area.php");
    exit;
}

$user_dir = "../../data/user_files/" . $_SESSION['user_email'];
$file = basename($_GET['file']);
$file_path = $user_dir . "/" . $file;


if (is_file($file_path)) {
    unlink($file_path);
}


$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'work_area.php';
header("Location: " . $referer);
exit;
?>