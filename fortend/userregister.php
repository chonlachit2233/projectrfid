<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบลงทะเบียนกิจกรรม RFID</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
    <link rel="stylesheet" href="styler2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="container">
    <h2 class="mb-4">ผู้ลงทะเบียนสำเร็จ</h2>

    <div class="d-flex justify-content-center gap-3 mb-4">
        <a href="index.php" class="btn btn-success">หน้าหลัก</a>
        <a href="usershow.php" class="btn btn-success">แสดงรายชื่อผู้ลงทะเบียน</a>
        <a href="../index/login.php" class="btn btn-primary"><i class='bx bxs-user-voice' style="font-size: 32px;" ></i></a>
    </div>

    <div id="map"></div>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
  var map = L.map('map').setView([18.81005087, 100.78937792], 16); // ตำแหน่งเริ่มต้น
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

// สร้างไอคอน Boxicons สีแดง
var customIcon = L.divIcon({
    className: 'boxicon',  // ตั้งชื่อคลาสสำหรับ Boxicons
    html: '<i class="bx bxs-user-pin" style="font-size: 40px; color: black;"></i>',  // ระบุ Boxicon พร้อมกำหนดสีเป็นแดง
    iconSize: [32, 32],  // ขนาดของไอคอน
    iconAnchor: [16, 32],  // จุดยึดของไอคอน
    popupAnchor: [0, -32]  // ตำแหน่งป๊อปอัพ
});

fetch("../include/locationapi.php")
    .then(response => response.json())
    .then(data => {
        data.forEach(loc => {
            L.marker([loc.latitude, loc.longitude], { icon: customIcon }).addTo(map)
                .bindPopup(`<h6>${loc.mal_name}</h6><h6>ลงทะเบียน: ${loc.total_users} คน</h6>`);  // แสดงชื่อผู้ลงทะเบียนแทนตัวเลข
        });
    })
    .catch(error => console.error("Error loading data:", error));

</script>

</body>
</html>
