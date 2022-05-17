<?php 
    $method = $_SERVER["REQUEST_METHOD"];
    $serverHost = $_SERVER["HTTP_HOST"];
    $db = require_once("./db.php");
    $request_data = json_decode(file_get_contents("php://input"));
    $id = $request_data->Id;

    if($method != "POST") {
        echo "O método $method não é permitido. ";
        die;
    }

    $query = "DELETE FROM Transacoes WHERE Id = $id";
 
       if($db->query($query)) {
           return header("Location: http://+$serverHost+transacoes.php", true, 200);
       }else {
           return http_response_code(400);
       }

