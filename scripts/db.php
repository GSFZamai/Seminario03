<?php 
    // $db = new mysqli("localhost", "root", "", "financas");
 
    $db = new mysqli("sql10.freemysqlhosting.net","sql10492934","qRWHignh4P","sql10492934",3306);

    if($db) {
        return $db;
    }else {
        echo "Falha ao se conectar ao banco de dados";
    }

?>