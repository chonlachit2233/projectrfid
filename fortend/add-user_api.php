<?php 
session_start();
include("../include/db.php");
error_reporting(0);

// รับค่าจากฟอร์ม
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$school = $_POST['school'];
$organization = $_POST['organization']; // ✅ แก้ชื่อให้ถูก
$grade = $_POST['grade']; 
$tag_rfid = $_POST['tag_rfid'];
$activities = $_POST['activities'];

// เตรียมคำสั่ง SQL ที่ถูกต้อง
$query = $pdo->prepare("INSERT INTO users (first_name, last_name, gender, school, organization, grade, tag_rfid, activities) 
                        VALUES (:first_name, :last_name, :gender, :school, :organization, :grade, :tag_rfid, :activities)");

// ผูกค่ากับพารามิเตอร์
$query->bindParam(':first_name', $first_name, PDO::PARAM_STR); // ✅ แก้ชื่อตัวแปร
$query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
$query->bindParam(':gender', $gender, PDO::PARAM_STR);
$query->bindParam(':school', $school, PDO::PARAM_STR);
$query->bindParam(':organization', $organization, PDO::PARAM_STR);
$query->bindParam(':grade', $grade, PDO::PARAM_STR);
$query->bindParam(':tag_rfid', $tag_rfid, PDO::PARAM_STR);
$query->bindParam(':activities', $activities, PDO::PARAM_STR);

// ✅ ตรวจสอบผลลัพธ์หลัง execute()
if ($query->execute()) {
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script>
        setTimeout(function() {
            swal({
                title: "เพิ่มข้อมูลสำเร็จ",
                type: "success"
            }, function() {
                window.location = "index.php";
            });
        }, 1000);
    </script>';
} else {
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script>
        setTimeout(function() {
            swal({
                title: "เกิดข้อผิดพลาด",
                type: "error"
            }, function() {
                window.location = "register.php";
            });
        }, 1000);
    </script>';
}

$pdo = null; // ปิดการเชื่อมต่อฐานข้อมูล
?>