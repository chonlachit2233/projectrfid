<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mydb";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //echo "Connected successfully";
}catch (PDOException $e){
    die("Connection failed: " . $e->getMessage());
    
}
?>