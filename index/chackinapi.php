<?php
session_start();
include("../include/db.php");
error_reporting(0);

$id = isset($_POST['id']) ? trim($_POST['id']) : '';

if (empty($id)) {
    echo "ไม่มีข้อมูล UID ที่ได้รับ";
    exit;
}

try {
    $pdo->exec("SET NAMES utf8");

    // ตรวจสอบว่าอยู่ใน users และอนุญาตให้เช็คอิน
    $stmt_user = $pdo->prepare("SELECT * FROM users WHERE tag_rfid = ? AND user_type = 1");
    $stmt_user->execute([$id]);

    if ($stmt_user->rowCount() > 0) {
        // เช็คอินได้
        $stmt_insert = $pdo->prepare("INSERT INTO rfid (tag_rfid, scan_time, latitude, longitude) VALUES (?, NOW(), '', '')");
        if ($stmt_insert->execute([$id])) {
            echo "เช็คอินสำเร็จ!";
        } else {
            echo "เกิดข้อผิดพลาดในการบันทึกเช็คอิน";
        }
    } else {
        echo "ยังไม่ได้ลงทะเบียน หรือยังไม่ได้รับสิทธิ์เช็คอิน กรุณาติดต่อเจ้าหน้าที่";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
