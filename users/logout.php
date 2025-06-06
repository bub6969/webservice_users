<?php
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../models/users.php';

$user = new users(null);

if ($user->logout()) {
    http_response_code(200);
    echo json_encode(array("message" => "Logout effettuato con successo."));
} else {
    http_response_code(500);
    echo json_encode(array("message" => "Errore durante il logout."));
}
?>