<?php session_start();
include("../include/db.php");
error_reporting(0);

if ($_SESSION['user_type']==1) {
    header('location:logout.php');
}else{
    if(isset($_POST['update'])){
        $eid = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $school = $_POST['school'];
        $organization = $_POST['organization'];
        $grade = $_POST['grade'];
        $tag_rfid = $_POST['tag_rfid'];
        $activities = $_POST['activities'];

        //print_r($_POST);
        $sql ="UPDATE users SET first_name=:first_name,
        last_name=:last_name,
       gender=:gender,
        school=:school,
         organization=:organization,
          grade=:grade,
           tag_rfid=:tag_rfid,
           activities=:activities WHERE id=:id";


        $query = $pdo->prepare($sql);
        $query->bindParam(':id',$eid,PDO::PARAM_STR);
        $query->bindParam(':first_name',$first_name,PDO::PARAM_STR);
        $query->bindParam(':last_name',$last_name,PDO::PARAM_STR);
        $query->bindParam(':gender',$gender,PDO::PARAM_STR);
        $query->bindParam(':school',$school,PDO::PARAM_STR);
        $query->bindParam(':organization',$organization,PDO::PARAM_STR);
        $query->bindParam(':grade',$grade,PDO::PARAM_STR);
        $query->bindParam(':tag_rfid',$tag_rfid,PDO::PARAM_STR);
        $query->bindParam(':activities',$activities,PDO::PARAM_STR);
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
                      window.location = "edit-user.php"; //หน้าที่ต้องการให้กระโดดไป
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
        $pdo = null; //close connect db
       
   }
}    
    
?>





