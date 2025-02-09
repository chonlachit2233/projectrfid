<?php session_start();
include("../include/db.php");
error_reporting(0);

if ($_SESSION['admin_type']==1) {
    header('location:logout.php');
}else{
    if(isset($_POST['update'])){
        $eid = $_POST['admin_id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];

        $hasedpassword = hash('sha256', $password);
        //print_r($_POST);
        $sql ="UPDATE admin SET full_name=:full_name,
        username=:username,
        email=:email,
        mobile=:mobile,
        password=:hasedpassword WHERE admin_id=:id";


        $query = $pdo->prepare($sql);
        $query->bindParam(':id',$eid,PDO::PARAM_STR);
        $query->bindParam(':full_name',$full_name,PDO::PARAM_STR);
        $query->bindParam(':username',$username,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
        $query->bindParam(':hasedpassword',$hasedpassword,PDO::PARAM_STR);
        $query->execute();
        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
     
        if($query){
            echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "อัพเดทข้อมูลสำเร็จ",
                      type: "success"
                  }, function() {
                      window.location = "edit-admin.php"; //หน้าที่ต้องการให้กระโดดไป
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
                      window.location = "edit-admin.php"; //หน้าที่ต้องการให้กระโดดไป
                  });
                }, 1000);
            </script>';
        }
        $pdo = null; //close connect db
       
   }
}    
    
?>





