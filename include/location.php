<?php
header('Content-Type: application/json');
require_once 'db.php'; // เชื่อมต่อฐานข้อมูลผ่าน PDO

// คำสั่ง SQL ที่ดึงข้อมูลจำนวนผู้ลงทะเบียนและพิกัด
$sql = "SELECT latitude, longitude, COUNT(*) as total_users FROM rfid GROUP BY latitude, longitude";
$qurey = $pdo->prepare($sql);
$qurey->execute();
$fetch = $qurey->fetchAll(PDO::FETCH_ASSOC); // ใช้ fetchAll เพื่อดึงข้อมูลหลายแถว

echo json_encode($fetch); // ส่งข้อมูลเป็น JSON
?>


