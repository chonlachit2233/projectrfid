<?php session_start();
include("../include/db.php");
error_reporting(0);
 
if($_SESSION['user_type']==1){
    header('location:logout.php');
}else{
    if(isset($_POST['update'])){
        $eid = $_POST['ma_id'];
        $ma_name = $_POST['ma_name'];
        $mal_id = $_POST['mal_id'];
        $ma_date = $_POST['ma_date'];
        $ma_details = $_POST['ma_details'];
        $ma_img = $_POST['ma_img'];

        $sql = "UPDATE manageactivity SET ma_name=:ma_name, mal_id=:mal_id, ma_date=:ma_date, ma_details=:ma_details, ma_img=:ma_img WHERE ma_id=:eid";
        $query = $pdo->prepare($sql);
        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
        $query->bindParam(':ma_name',$ma_name,PDO::PARAM_STR);
        $query->bindParam(':mal_id',$mal_id,PDO::PARAM_STR);
        $query->bindParam(':ma_date',$ma_date,PDO::PARAM_STR);
        $query->bindParam(':ma_details',$ma_details,PDO::PARAM_STR);
        $query->bindParam(':ma_img',$ma_img,PDO::PARAM_STR);
        $query->execute();
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
                    window.location = "manage_activity.php";
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
                    window.location = "manage_activity.php";
                });
            }, 1000);
        </script>';
    }
    
    $pdo = null; // ปิดการเชื่อมต่อฐานข้อมูล
    
   
    
}
?>