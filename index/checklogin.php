<?php 
session_start();
include("../include/db.php");
error_reporting(0);

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $loginpassword = $_POST['password'];

    try {
        // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
        $ret = "SELECT * FROM admin WHERE username=:uname";
        $queryt = $pdo->prepare($ret);
        $queryt->bindParam(':uname', $username, PDO::PARAM_STR);
        $queryt->execute();
        $result = $queryt->fetch(PDO::FETCH_OBJ);

        if ($result) {
            // ตรวจสอบรหัสผ่าน
            if (password_verify($loginpassword, $result->password)) {
                $_SESSION['full_name'] = $result->full_name;
                $_SESSION['admin_id'] = $result->id;
                $_SESSION['admin_type'] = $result->admin_type;

                // ✅ ใช้ SweetAlert แจ้งเตือน
                echo '
                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                <script>
                    setTimeout(function() {
                        swal({
                            title: "เข้าสู่ระบบสำเร็จ",
                            type: "success"
                        }, function() {
                            window.location = "' . ($_SESSION['admin_type'] == 0 ? 'edit-admin.php' : 'welcome.php') . '";
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
                            title: "Username หรือ Password ไม่ถูกต้อง",
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
                        title: "Username หรือ Password ไม่ถูกต้อง",
                        type: "error"
                    }, function() {
                        window.location = "login.php";
                    });
                }, 1000);
            </script>';
        }
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
}
?>
