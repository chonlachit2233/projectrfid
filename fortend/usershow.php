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
    <title>ระบบลงทะเบียนกิจกรรม RFID</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
    <link rel="stylesheet" href="styleuser.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    
    
</head>
<html>
<body>

<div class="container">
    <h2 class="mb-4 text-center">ระบบลงทะเบียนกิจกรรม RFID</h2>

    <div class="d-flex justify-content-center gap-3 mb-4">
        <a href="index.php" class="btn btn-success">หน้าหลัก</a>
        <a href="userregister.php" class="btn btn-success">แผนที่แสดงผู้ลงทะเบียน</a>
        <a href="../index/login.php" class="btn btn-primary"><i class='bx bxs-user-voice' style="font-size: 32px;"></i></a>
    </div>

    <!-- ✅ ทำให้ตารางสามารถเลื่อนแนวนอนได้ และเต็มจอ -->
    <div class="table-responsive">
        <table id="myTable" class="table table-striped table-hover w-100">
            <thead>
                <tr>
                    <th style="width: 5%;">ลำดับ</th>
                    <th style="width: 15%;">ชื่อ</th>
                    <th style="width: 15%;">นามสกุล</th>
                    <th style="width: 10%;">เพศ</th>
                    <th style="width: 15%;">โรงเรียน</th>
                    <th style="width: 15%;">หน่วยงาน</th>
                    <th style="width: 10%;">ระดับชั้น</th>
                    <th style="width: 10%;">tag_rfid</th>
                    <th style="width: 15%;">กิจกรรม</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stmt = $pdo->query("SELECT * FROM users");
                    $stmt->execute();
                    $users = $stmt->fetchAll();
                    $cnc = 1;
                    foreach ($users as $user) {
                ?>
                <tr>
                    <td><?php echo $cnc; ?></td>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php echo $user['school']; ?></td>
                    <td><?php echo $user['organization']; ?></td>
                    <td><?php echo $user['grade']; ?></td>
                    <td><?php echo $user['tag_rfid']; ?></td>
                    <td><?php echo $user['activities']; ?></td>
                </tr>
                <?php $cnc++; } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>
</html>
                    </body>