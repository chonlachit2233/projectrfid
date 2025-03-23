<?php
header('Content-Type: application/json');
require_once 'db.php'; // ต้องแน่ใจว่าไฟล์นี้ใช้ PDO

$result = $pdo->query("SELECT latitude, longitude FROM rfid");
$locations = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {  // ใช้ fetch(PDO::FETCH_ASSOC) สำหรับ PDO
    $locations[] = $row;
}
echo json_encode($locations);
$pdo = null;  // ใช้ null เพื่อปิดการเชื่อมต่อ PDO
?>
