<?php
session_start();

$user_dir = "../data/user_files/" . $_SESSION['user_email'];
$file = basename($_POST['file']);
$path = "$user_dir/$file";

if (file_exists($path)) {
    unlink($path);
}

header("Location: ../index.php");
exit;
