<?php
session_start();


header('Content-Type: application/json');

if (!isset($_SESSION['user_id']) || !isset($_POST['file'])) {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Access denied"]);
    exit;
}


$user_dir = "../../data/user_files/" . $_SESSION['user_email'];
$old_filename = basename($_POST['file']);
$filepath = $user_dir . "/" . $old_filename;


if (!is_dir($user_dir)) {
    mkdir($user_dir, 0777, true);
}


if (isset($_POST['new_title'])) {
    $new_title = preg_replace('/[^a-zA-Z0-9А-Яа-я _-]/u', '', $_POST['new_title']);
    if (empty($new_title)) $new_title = "Untitled";
    
    $new_filename = $new_title . ".md";
    $new_filepath = $user_dir . "/" . $new_filename;

    if ($old_filename !== $new_filename && file_exists($filepath)) {
        if (rename($filepath, $new_filepath)) {
            echo json_encode(["status" => "renamed", "new_file" => $new_filename]);
            exit;
        }
    }
}


$content = $_POST['content'] ?? '';
if (file_put_contents($filepath, $content) !== false) {
    echo json_encode(["status" => "saved"]);
} else {
    http_response_code(500);
    echo json_encode(["status" => "error"]);
}
?>