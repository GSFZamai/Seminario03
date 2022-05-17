<?php
    $db = require("db.php");
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $baseUrl = $_SERVER["HTTP_HOST"];
    $senhaCriptografada = sha1($senha);
    $qtdLetras = strlen($senhaCriptografada);

    $query = "Insert into Usuarios(Nome, Email, Senha) Values('$nome', '$email', '$senhaCriptografada');";
    
    if($db->query($query)) {
        header("Location: http://$baseUrl/seminario03/index.php?s=1");
        echo "Registro Realizado com sucesso";
    }else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $db->close();
?>