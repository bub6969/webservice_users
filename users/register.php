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
    !empty($data->password) &&
    !empty($data->email)
) {
    $user->username = $data->username;
    $user->password = $data->password;
    $user->email = $data->email;

    if ($user->register()) {
        http_response_code(201);
        echo json_encode(array("message" => "Registrazione avvenuta con successo."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Impossibile registrare l'utente."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Dati incompleti per la registrazione."));
}
?>