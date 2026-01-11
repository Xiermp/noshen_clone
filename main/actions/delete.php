<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: ../login.php");
    exit;
}

if (!isset($_GET['file'])) {
    header("Location: ../index.php");
    exit;
}

$user_dir = "../data/user_files/" . $_SESSION['user_email'];
$file = basename($_GET['file']); // защита от ../
$file_path = $user_dir . "/" . $file;

if (is_file($file_path)) {
    unlink($file_path);
}

header("Location: ../index.php");
exit;
