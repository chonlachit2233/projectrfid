<?php
require 'db.php'; // หรือไฟล์ที่ใช้เชื่อมฐานข้อมูล

if (!isset($_GET['activity'])) {
    die('ไม่พบกิจกรรมที่ระบุ');
}

$activity = $_GET['activity'];

// ตั้งค่า header สำหรับ CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="activity_' . urlencode($activity) . '.csv"');

// 👉 เพิ่ม BOM เพื่อให้ Excel แสดงภาษาไทยถูกต้อง
echo "\xEF\xBB\xBF";

// เปิด stream สำหรับเขียนไฟล์
$output = fopen('php://output', 'w');

// เขียนหัวตาราง
fputcsv($output, ['ลำดับ', 'ชื่อ', 'นามสกุล', 'เพศ', 'โรงเรียน', 'หน่วยงาน', 'ระดับชั้น', 'Tag RFID', 'กิจกรรม']);

// ดึงข้อมูลจากฐานข้อมูล
$stmt = $pdo->prepare("SELECT * FROM users WHERE activities = :activity");
$stmt->execute(['activity' => $activity]);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// เขียนข้อมูลแต่ละแถว
$i = 1;
foreach ($users as $user) {
    fputcsv($output, [
        $i++,
        $user['first_name'],
        $user['last_name'],
        $user['gender'],
        $user['school'],
        $user['organization'],
        $user['grade'],
        $user['tag_rfid'],
        $user['activities']
    ]);
}

fclose($output);
exit;
?>
