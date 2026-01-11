<?php
session_start();

include "../../pages/config.php"; 


header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['order']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    

    $stmt = $pdo->prepare("INSERT INTO file_orders (user_id, file_name, position) VALUES (:uid, :fname, :pos) ON DUPLICATE KEY UPDATE position = :pos");
    
    try {
        $pdo->beginTransaction();
        foreach ($data['order'] as $index => $filename) {
            $stmt->execute([
                ':uid' => $user_id,
                ':fname' => $filename,
                ':pos' => $index
            ]);
        }
        $pdo->commit();
        echo json_encode(["status" => "success"]);
    } catch (Exception $e) {
        $pdo->rollBack();
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No data"]);
}
?>