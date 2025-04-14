<?php
header('Content-Type: application/json');
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "ไม่พบข้อมูล JSON"]);
    exit;
}

try {
    $firstName = $data['first_name'];
    $lastName = $data['last_name'];
    $tagRfid = $data['tag_rfid'];

    // ตรวจสอบว่า tag_rfid นี้มีอยู่แล้วในคนอื่นหรือไม่
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE tag_rfid = :tag_rfid AND NOT (first_name = :first_name AND last_name = :last_name)");
    $stmt->execute([
        ':tag_rfid' => $tagRfid,
        ':first_name' => $firstName,
        ':last_name' => $lastName
    ]);
    $rfidExists = $stmt->fetchColumn();

    if ($rfidExists > 0) {
        echo json_encode(["status" => "error", "message" => "RFID นี้ถูกใช้ไปแล้วโดยผู้อื่น"]);
        exit;
    }

    // ตรวจสอบว่าชื่อนี้มีอยู่หรือไม่
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE first_name = :first_name AND last_name = :last_name");
    $stmt->execute([
        ':first_name' => $firstName,
        ':last_name' => $lastName
    ]);
    $userExists = $stmt->fetchColumn();

    if ($userExists > 0) {
        // แก้ไขข้อมูลและยังไม่เช็คอิน (user_type = 0)
        $stmt = $pdo->prepare("UPDATE users SET gender = :gender, school = :school, organization = :organization, grade = :grade, activities = :activities, tag_rfid = :tag_rfid, user_type = 0 
                               WHERE first_name = :first_name AND last_name = :last_name");
        $stmt->execute([
            ':gender' => $data['gender'] ?? '',
            ':school' => $data['school'] ?? '',
            ':organization' => $data['organization'] ?? '',
            ':grade' => $data['grade'] ?? '',
            ':activities' => $data['activities'] ?? '',
            ':tag_rfid' => $tagRfid,
            ':first_name' => $firstName,
            ':last_name' => $lastName
        ]);
        echo json_encode(["status" => "success", "message" => "แก้ไขข้อมูลสำเร็จ (ยังไม่เช็คอิน)"]);
    } else {
        // เพิ่มใหม่และยังไม่เช็คอิน (user_type = 0)
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, gender, school, organization, grade, activities, tag_rfid, user_type) 
                               VALUES (:first_name, :last_name, :gender, :school, :organization, :grade, :activities, :tag_rfid, 0)");
        $stmt->execute([
            ':first_name' => $firstName,
            ':last_name' => $lastName,
            ':gender' => $data['gender'] ?? '',
            ':school' => $data['school'] ?? '',
            ':organization' => $data['organization'] ?? '',
            ':grade' => $data['grade'] ?? '',
            ':activities' => $data['activities'] ?? '',
            ':tag_rfid' => $tagRfid
        ]);
        echo json_encode(["status" => "success", "message" => "บันทึกข้อมูลใหม่สำเร็จ (ยังไม่เช็คอิน)"]);
    }

} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "เกิดข้อผิดพลาด: " . $e->getMessage()]);
}
?>
