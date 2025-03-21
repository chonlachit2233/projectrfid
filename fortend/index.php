<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบลงทะเบียนกิจกรรม RFID</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
    <link rel="stylesheet" href="style.css">
  
</head>
<body>

<div class="container">
    <h2 class="mb-4">ระบบลงทะเบียนกิจกรรม RFID</h2>

    <div class="d-flex justify-content-center gap-3 mb-4">
        <a href="../index/login.php" class="btn btn-primary">เข้าสู่ระบบ</a>
        <a href="register.php" class="btn btn-success">ลงทะเบียนกิจกรรม</a>
    </div>

    <div id="map"></div>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([13.736717, 100.523186], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    var rfidTags = [
        { lat: 13.736717, lng: 100.523186, name: "แท็ก A" },
        { lat: 13.746717, lng: 100.533186, name: "แท็ก B" },
        { lat: 13.756717, lng: 100.543186, name: "แท็ก C" }
    ];

    rfidTags.forEach(tag => {
        L.marker([tag.lat, tag.lng])
            .addTo(map)
            .bindPopup(`<b>${tag.name}</b>`);
    });
</script>

</body>
</html>