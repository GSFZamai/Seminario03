<?php
    $db = require("db.php");
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $senhaCriptografada = sha1($senha);
    $qtdLetras = strlen($senhaCriptografada);

    $query = "Insert into Usuarios(Nome, Email, Senha) Values('$nome', '$email', '$senhaCriptografada');";
    
    if($db->query($query)) {
        header("Location: http://localhost/seminario03/index.html?s=1");
        echo "Registro Realizado com sucesso";
    }else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $db->close();
?>