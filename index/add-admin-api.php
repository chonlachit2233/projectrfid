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

// เข้ารหัสรหัสผ่าน
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// เตรียมคำสั่ง SQL เพื่อเพิ่มข้อมูล
$query = $pdo->prepare("INSERT INTO admin (full_name, username, email, mobile, password) 
                        VALUES (:full_name, :username, :email, :mobile, :password)");

$query->bindParam(':full_name', $fullname, PDO::PARAM_STR);
$query->bindParam(':username', $username, PDO::PARAM_STR);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query->bindParam(':password', $hashed_password, PDO::PARAM_STR);

// ทำการ execute
if ($query->execute()) {
    // ดึงข้อมูลแอดมินที่เพิ่งถูกเพิ่ม
    $query = $pdo->prepare("SELECT * FROM admin WHERE username = :username LIMIT 1");
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['fullname'] = $result['full_name'];
        $_SESSION['admin_id'] = $result['id'];
        $_SESSION['admin_type'] = $result['admin_type'];

        echo '
                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                <script>
                    setTimeout(function() {
                        swal({
                            title: "ลงทะเบียนสำเร็จ",
                            type: "success"
                        }, function() {
                            window.location = "' . ($_SESSION['admin_type'] == 0 ? 'login.php' : 'login.php') . '";
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
                            title: "ไม่สำเร็จ",
                            type: "error"
                        }, function() {
                            window.location = "login.php";
                        });
                    }, 1000);
                </script>';
            }
        } else {
            echo '
            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
            <script>
                setTimeout(function() {
                    swal({
                        title: "ไม่สำเร็จ",
                        type: "error"
                    }, function() {
                        window.location = "login.php";
                    });
                }, 1000);
            </script>';
}

// ปิดการเชื่อมต่อฐานข้อมูล
$pdo = null;
?>
