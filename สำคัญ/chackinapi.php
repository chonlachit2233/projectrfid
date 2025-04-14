<?php
header('Content-Type: application/json');
include("db.php");

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data || !isset($data['tag_rfid'])) {
    echo json_encode([
        "status" => "error",
        "message" => "ข้อมูลไม่ถูกต้องหรือไม่มี tag_rfid"
    ]);
    exit;
}

$tag_rfid = trim($data['tag_rfid']);
$scan_time = trim($data['scan_time']);
$latitude = trim($data['latitude']);
$longitude = trim($data['longitude']);
$device = trim($data['device']);

try {
    $pdo->exec("SET NAMES utf8");

    // ✅ ดึงข้อมูลผู้ใช้ไม่ว่าจะ user_type เป็นอะไร เพื่อเช็คอินแล้วเปลี่ยนเป็น 1
    $stmt_user = $pdo->prepare("SELECT activities, first_name, last_name, user_type FROM users WHERE tag_rfid = ?");
    $stmt_user->execute([$tag_rfid]);

    if ($stmt_user->rowCount() > 0) {
        $user = $stmt_user->fetch(PDO::FETCH_ASSOC);
        $activity_name = $user['activities'];
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        $user_type = $user['user_type'];

        // เช็คว่าเคยเช็คอินหรือยัง
        $stmt_check = $pdo->prepare("SELECT * FROM rfid WHERE tag_rfid = ? AND activity_name = ?");
        $stmt_check->execute([$tag_rfid, $activity_name]);

        if ($stmt_check->rowCount() == 0) {
            // ✅ ยังไม่เคยเช็คอิน -> บันทึกข้อมูล
            $stmt_insert = $pdo->prepare("INSERT INTO rfid (tag_rfid, activity_name, scan_time, device, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?)");
            $inserted = $stmt_insert->execute([$tag_rfid, $activity_name, $scan_time, $device, $latitude, $longitude]);

            if ($inserted) {
                // ✅ อัปเดต user_type = 1 หลังเช็คอิน
                $stmt_update = $pdo->prepare("UPDATE users SET user_type = 1 WHERE tag_rfid = ?");
                $stmt_update->execute([$tag_rfid]);

                echo json_encode([
                    "status" => "success",
                    "message" => "เช็คอินสำเร็จ: $first_name $last_name กิจกรรม: $activity_name"
                ]);
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "ไม่สามารถบันทึกเช็คอินได้"
                ]);
            }
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "คุณ $first_name $last_name ได้เช็คอิน: $activity_name แล้ว"
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "ยังไม่ได้ลงทะเบียนขอรับรหัสTag-rfid โปรดนำtag-rfidของท่านติดต่อAdmin"
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Database error: " . $e->getMessage()
    ]);
}
