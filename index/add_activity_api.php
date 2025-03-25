<?php session_start();
include("../include/db.php");
error_reporting(0);
 
if($_SESSION['user_type']==1){
    header('location:logout.php');
}else{
    if(isset($_POST['save'])){

        $ma_name = $_POST['ma_name'];
        $mal_id = $_POST['mal_id'];
        $ma_date = $_POST['ma_date'];
        $ma_details = $_POST['ma_details'];
        $ma_img = $_POST['ma_img'];

        $sql = "INSERT INTO manageactivity (ma_name, mal_id, ma_date, ma_details, ma_img) VALUES (:ma_name, :mal_id, :ma_date, :ma_details, :ma_img)";
        $query = $pdo->prepare($sql);
        $query->bindParam(':ma_name', $ma_name, PDO::PARAM_STR);
        $query->bindParam(':mal_id', $mal_id, PDO::PARAM_INT);
        $query->bindParam(':ma_date', $ma_date, PDO::PARAM_STR);
        $query->bindParam(':ma_details', $ma_details, PDO::PARAM_STR);
        $query->bindParam(':ma_img', $ma_img, PDO::PARAM_STR);
        $query->execute();
        echo "<script>alert('Product has been added')</script>";
        echo "<script>window.location.href='manage_activity.php'</script>";
    }
}
?>