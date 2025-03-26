<?php
header('Content-Type: application/json');
require_once 'db.php'; 

$sql = "SELECT activities, COUNT(*) as count FROM users GROUP BY activities"; 
$query = $pdo->prepare($sql);
$query->execute();
$data = $query->fetchAll(PDO::FETCH_ASSOC);

// แปลงข้อมูลเป็น JSON สำหรับ JavaScript
echo json_encode($data);
$categories = json_encode(array_column($data, 'activities'));
$counts = json_encode(array_column($data, 'count'));
?>
