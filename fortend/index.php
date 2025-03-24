<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบลงทะเบียนกิจกรรม RFID</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  
</head>
<body>

<div class="container">
    <h2 class="mb-4">ระบบลงทะเบียนกิจกรรม RFID</h2>

    <div class="d-flex justify-content-center gap-3 mb-4">
        
        <a href="register.php" class="btn btn-success">ลงทะเบียนกิจกรรม</a>
        <a href="usershow.php" class="btn btn-success">แสดงผู้เข้าร่วมกิจกรรม</a>
        <a href="../index/login.php" class="btn btn-primary"><i class='bx bxs-user-voice'style="font-size: 32px;" ></i></a>
    </div>

    <div id="map"></div>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
   var map = L.map('map').setView([18.81005087, 100.78937792], 16); // ตำแหน่งเริ่มต้น
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

fetch("../include/location.php")
    .then(response => response.json())
    .then(data => {
        data.forEach(loc => {
            L.marker([loc.latitude, loc.longitude]).addTo(map)
              .bindPopup("มีการเช็คอินที่นี่!");
        });
    })
    .catch(error => console.error("Error loading data:", error));

</script>

</body>
</html>