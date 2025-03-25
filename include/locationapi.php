<?php
header('Content-Type: application/json');
require_once 'db.php'; // เชื่อมต่อฐานข้อมูลผ่าน PDO

// ดึงข้อมูลพิกัด, ชื่อสถานที่ และนับจำนวนผู้ลงทะเบียนจากฐานข้อมูล
$sql = "SELECT r.latitude, r.longitude, m.mal_name, COUNT(u.id) AS total_users
        FROM rfid r
        JOIN users u ON r.id = u.id
        JOIN managesites m ON r.id = m.mal_id
        GROUP BY r.latitude, r.longitude, m.mal_name";


$query = $pdo->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

// ส่งข้อมูล JSON
echo json_encode($results);
?>
