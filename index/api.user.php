<?php
header("Content-Type: application/json");
include '../include/db.php';
//echo 'subtifile';
 

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);

switch ($method) {
    case 'GET':
        handleGet($pdo);
        break;
    case 'POST':
        handlePost($pdo, $input);
        break;
    case 'PUT':
        handlePut($pdo, $input);
        break;
    case 'DELETE':
        handleDelete($pdo, $input);
        break;
    default:
    echo json_encode(['message' => 'Invalid request method']);
    break;
}

function handleGet($pdo){
    $sql = "SELECT * FROM users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result); 
}

function handlePost($pdo, $input) {
    $sql = "INSERT INTO users (first_name, last_name, gender, school, organization, grade, tag_rfid, activities) 
            VALUES (:first_name, :last_name, :gender, :school, :organization, :grade, :tag_rfid, :activities)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'first_name' => $input['first_name'], 
        'last_name' => $input['last_name'], 
        'gender' => $input['gender'], 
        'school' => $input['school'], 
        'organization' => $input['organization'], 
        'grade' => $input['grade'], 
        'tag_rfid' => $input['tag_rfid'], 
        'activities' => $input['activities'], 
      
    ]);

    echo json_encode(['message' => 'User created successfully']); 
}


function handlePut($pdo, $input) {
    $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, gender = :gender, 
        school = :school, organization = :organization, grade = :grade, 
        tag_rfid = :tag_rfid, activities = :activities WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['first_name' => $input['first_name'], 'last_name' => $input['last_name'],'gender' => $input['gender'],'school' => $input['school'],'organization' => $input['organization'],'grade' => $input['grade'],'tag_rfid' => $input['tag_rfid'],'activities' => $input['activities'], 'id' => $input['id']]);
    echo json_encode(['message' => 'Users updated successfully']); 
    }

function handleDelete($pdo,$input){
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $input['id']]);
    echo json_encode(['message' => 'Users deleted successfully']); 
}
?>