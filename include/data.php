<?php
header('Content-Type: application/json');
require_once 'db.php'; // ต้องแน่ใจว่าไฟล์นี้ใช้ PDO

try {
    $sqlQuery = "SELECT * FROM rfid ORDER BY id";
    $stmt = $pdo->prepare($sqlQuery);
    $stmt->execute();
    
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
