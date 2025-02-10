<?php session_start();
include("../include/db.php");
error_reporting(0);

//ประกาศตัวเเปรรับค่าจาก param mrthod get
$id = $_GET['id'];
$quely = $pdo->prepare('DELETE FROM users WHERE id=:id');
$quely->bindParam(':id', $id , PDO::PARAM_INT);
$quely->execute();

//ปุ่ม sweet alert
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
 
  if($quely->rowCount() == 1){
            echo '<script>
            setTimeout(function() {
            swal({
                title: "ลบข้อมูลสำเร็จ",
                type: "success"
        }, function() {
                window.location = "edit-user.php"; //หน้ากระโดดไป
        });
        }, 1000);
            </script>';

  }else{
            echo '<script>
            setTimeout(function() {
            swal({
                title: "เกิดข้อผิดพลาด",
                type: "error"
            }, function() {
                window.location = "edit-user.php"; //หน้าที่ต้องการให้กระโดดไป
            });
        }, 1000);
        </script>';
}
$pdo = null;


?>