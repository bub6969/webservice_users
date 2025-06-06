<?php
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../models/users.php';

$database = new Database();
$db = $database->getConnection();
$user = new users($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->username) &&
    !empty($data->password)
) {
    $user->username = $data->username;
    $user->password = $data->password;

    if ($user->login()) {
        http_response_code(200);
        echo json_encode(array("message" => "Login effettuato con successo."));
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Username o password errati."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Dati incompleti per il login."));
}
?>