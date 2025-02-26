<?php
// ใส่โค้ด PHP หากมีการเชื่อมต่อกับฐานข้อมูลหรือการดำเนินการอื่นๆ
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
    <link rel="stylesheet" href="fonend/style.css">
</head>
<body>
<div class="container">
    <form id="register" action="register.php" method="POST">
        <button type="submit">ลงทะเบียน</button>
        <button type="button" onclick="location.href='login.php'">ล็อกอิน</button> <!-- เพิ่มการเชื่อมโยงไปหน้า login.php -->
    </form>
    <form id="box-form">
        <div class="box"></div>
    </form> <!-- ปิดฟอร์มที่สอง -->
</div>
</body>
</html>
