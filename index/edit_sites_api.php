<?php session_start();
include("../include/db.php");
error_reporting(0);
 
if($_SESSION['user_type']==1){
    header('location:logout.php');
}else{
    if(isset($_POST['update'])){
        $eid = $_POST['mal_id'];
        $mal_name = $_POST['mal_name'];
        //print_r($_POST);

        $sql = "UPDATE managesites SET mal_name=:mal_name WHERE mal_id=:eid";
        $query = $pdo->prepare($sql);
        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
        $query->bindParam(':mal_name',$mal_name,PDO::PARAM_STR);
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
                    window.location = "manage_sites.php";
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
                    window.location = "manage_sites.php";
                });
            }, 1000);
        </script>';
    }
    
    $pdo = null; // ปิดการเชื่อมต่อฐานข้อมูล
    
   
    

}
?>