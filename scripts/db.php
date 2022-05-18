<?php 
    $db = new mysqli("localhost", "root", "", "financas");
    
    if($db) {
        return $db;
    }else {
        echo "Falha ao se conectar ao banco de dados";
    }

?>