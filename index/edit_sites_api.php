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
        $query = $dbh->prepare($sql);
        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
        $query->bindParam(':mal_name',$mal_name,PDO::PARAM_STR);
        $query->execute();
        echo "<script>alert('Category has been updated')</script>";
        echo "<script>window.location.href='manage_sites.php'</script>";
    }
}
?>