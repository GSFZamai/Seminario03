<?php 
    $db = require_once("./db.php");
   
    $baseUrl = $_SERVER["HTTP_HOST"];
    $id = $_POST["id"];  
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $tipo = $_POST["tipo"];

   /*  echo "<pre>";
    print_r($_SERVER);
    echo "</pre>"; */

    $query = "INSERT INTO Transacoes(Descricao, Valor, Id_Usuario, Tipo_Transacao) VALUES('$descricao', $valor, $id, $tipo)";
    
    if($db->query($query)) {
        header("Location: http://$baseUrl/seminario03/transacoes.php");
    }else {
        echo "Falha ao cadastrar!";        
    }


?>