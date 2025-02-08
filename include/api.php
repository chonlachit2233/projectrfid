<?php
header("Content-Type: application/json");
include 'db.php';
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
    $sql = "SELECT * FROM rfid";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result); 
}

function handlePost($pdo, $input) {
$sql = "INSERT INTO rfid (name,email) VALUES (:name,:email)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => $input['name'], 'email' => $input['email']]);
echo json_encode(['message' => 'User created successfully']); 
}

function handlePut($pdo, $input) {
    $sql = "UPDATE rfid SET name =:name,email= :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $input['name'], 'email' => $input['email'], 'id' => $input['id']]);
    echo json_encode(['message' => 'User updated successfully']); 
    }

function handleDelete($pdo,$input){
    $sql = "DELETE FROM rfid WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $input['id']]);
    echo json_encode(['message' => 'user deleted successfully']); 
}
?>