<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบลงทะเบียน RFID</title>
    <!-- เชื่อม Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ระบบลงทะเบียน RFID</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ลงทะเบียนผู้ใช้ใหม่</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">รายชื่อผู้ลงทะเบียน</a>
                    </li>
                    <!-- เพิ่มเมนู Admin -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                       แสดงรายชื่อผู้เข้าร่วมกิจกรรม
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        ปุ่มดำเนินการ
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary mb-2">ลงทะเบียนผู้ใช้ใหม่</a>
                        <a href="#" class="btn btn-success">ดูรายชื่อผู้ลงทะเบียน</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- เพิ่ม JavaScript ของ Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
