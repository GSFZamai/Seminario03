<?php 
    $id = $_POST["Id"];
    $db = require_once("./db.php");

    $query = "DELETE FROM transacoes WHERE Id = $id";
 
        $db->query($query);

 

    return "<p>$id</p>";
?>