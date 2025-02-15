<?php

session_start();
include("../include/db.php");
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ปุ่มลงทะเบียน</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
        }
        .register-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .register-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <form action="register.php" method="post">
        <button type="submit" class="register-button" id="submit" name="submit">ลงทะเบียน</button>
    </form>

</body>
</html>
