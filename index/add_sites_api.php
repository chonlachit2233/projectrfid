<?php session_start();
include("../include/db.php");
error_reporting(0);
 
if($_SESSION['user_type']==1){
    header('location:logout.php');
}else{
    if(isset($_POST['save'])){

        $mal_name = $_POST['mal_name'];

        $sql = "INSERT INTO managesites(mal_name) VALUES (:mal_name)";
        $query = $pdo->prepare($sql);
        $query->bindParam(':mal_name',$mal_name,PDO::PARAM_STR);
        $query->execute();
        echo "<script>alert('Category has been updated')</script>";
        echo "<script>window.location.href='manage_sites.php'</script>";
    }
}
?>