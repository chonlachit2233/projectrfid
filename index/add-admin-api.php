<?php 
session_start();
include("../include/db.php");
error_reporting(0);

// รับค่าจากฟอร์ม
$fullname = $_POST['full_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password']; 


$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$quley = $dbh->prepare("INSERT INTO admin (full_name, username, email, mobile, password) 
                        VALUES (:full_name, :username, :email, :mobile, :password)");

$quley->bindParam(':full_name', $fullname, PDO::PARAM_STR);
$quley->bindParam(':username', $username, PDO::PARAM_STR);
$quley->bindParam(':email', $email, PDO::PARAM_STR);
$quley->bindParam(':mobile', $mobile, PDO::PARAM_STR);
$quley->bindParam(':password', $hashed_password, PDO::PARAM_STR);
$quley->execute();

// ✅ SweetAlert แจ้งเตือน
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ($quley) {
    echo '<script>
         setTimeout(function() {
          swal({
              title: "เพิ่มข้อมูลสำเร็จ",
              type: "success"
          }, function() {
              window.location = "edit-admin.php"; // หน้าที่ต้องการให้กระโดดไป
          });
        }, 1000);
    </script>';
} else {
   echo '<script>
         setTimeout(function() {
          swal({
              title: "เกิดข้อผิดพลาด",
              type: "error"
          }, function() {
              window.location = "edit-admin.php"; // หน้าที่ต้องการให้กระโดดไป
          });
        }, 1000);
    </script>';
}

$dbh = null; // ปิดการเชื่อมต่อฐานข้อมูล
?>
