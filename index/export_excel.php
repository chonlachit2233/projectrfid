<?php
// นำเข้า autoload ของ Composer
require '../vendor/autoload.php';

// ใช้งานคลาสจาก PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// เชื่อมต่อฐานข้อมูล (ปรับตามการเชื่อมต่อของคุณ)
$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// รับพารามิเตอร์กิจกรรมจาก URL
$activity = isset($_GET['activity']) ? $_GET['activity'] : '';

// ดึงข้อมูลผู้ลงทะเบียนที่เกี่ยวข้องกับกิจกรรม
$stmt = $pdo->prepare("SELECT * FROM users WHERE activities = :activity");
$stmt->execute(['activity' => $activity]);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// สร้าง Spreadsheet ใหม่
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// กำหนดหัวข้อของตาราง
$sheet->setCellValue('A1', '#');
$sheet->setCellValue('B1', 'ชื่อ');
$sheet->setCellValue('C1', 'นามสกุล');
$sheet->setCellValue('D1', 'เพศ');
$sheet->setCellValue('E1', 'โรงเรียน');
$sheet->setCellValue('F1', 'หน่วยงาน');
$sheet->setCellValue('G1', 'ระดับชั้น');
$sheet->setCellValue('H1', 'Tag RFID');
$sheet->setCellValue('I1', 'กิจกรรม');

// เพิ่มข้อมูลจากฐานข้อมูลลงในแถวต่างๆ
$row = 2; // เริ่มที่แถวที่ 2 เพราะแถว 1 ใช้สำหรับหัวตาราง
foreach ($users as $index => $user) {
    $sheet->setCellValue('A' . $row, $index + 1); // หมายเลขลำดับ
    $sheet->setCellValue('B' . $row, $user['first_name']);
    $sheet->setCellValue('C' . $row, $user['last_name']);
    $sheet->setCellValue('D' . $row, $user['gender']);
    $sheet->setCellValue('E' . $row, $user['school']);
    $sheet->setCellValue('F' . $row, $user['organization']);
    $sheet->setCellValue('G' . $row, $user['grade']);
    $sheet->setCellValue('H' . $row, $user['tag_rfid']);
    $sheet->setCellValue('I' . $row, $user['activities']);
    $row++;
}

// สร้าง writer เพื่อบันทึกไฟล์ Excel
$writer = new Xlsx($spreadsheet);

// ตั้งชื่อไฟล์ Excel
$filename = 'activity_' . urlencode($activity) . '_registrations.xlsx';

// ส่งผลลัพธ์ออกมาเป็นไฟล์ Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// เขียนไฟล์ออก
$writer->save('php://output');
exit;
?>
