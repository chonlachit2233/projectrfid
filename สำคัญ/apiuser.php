<?php
header('Content-Type: application/json');
include 'db.php';

try {
    // ตั้งค่า charset เป็น UTF-8
    $pdo->exec("SET NAMES 'utf8'");

    // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // ส่งผลลัพธ์เป็น JSON
    echo json_encode($users); // ต้องส่งเป็น JSON Array
} catch (PDOException $e) {
    // ส่งข้อความข้อผิดพลาดเป็น JSON
    echo json_encode(["error" => $e->getMessage()]);
}
?>
