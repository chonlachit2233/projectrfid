<?php
header('Content-Type: application/json');
include 'db.php';

try {
    $stmt = $pdo->query("SELECT DISTINCT ma_name FROM manageactivity WHERE ma_name IS NOT NULL AND ma_name != ''");
    $activities = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode(["status" => "success", "ma_name" => $activities]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
