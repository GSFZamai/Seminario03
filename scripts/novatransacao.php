<?php 
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $db = require_once("./db.php");
    $id = $_POST["id"];  
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];

   /*  echo "<pre>";
    print_r($_SERVER);
    echo "</pre>"; */

    $query = "INSERT INTO TRANSACOES(Descriao, Valor, Id_Usuario) VALUES('$descricao', $valor, $id)";
    
    if($db) {
        $db->query($query);
        echo "Cadastrado com sucesso!";
    }else {
        echo "Falha ao cadastrar!";
        
    }


?>