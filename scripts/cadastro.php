<?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $senhaCriptografada = sha1($senha);
    $qtdLetras = strlen($senhaCriptografada);
    echo "$senha <br /> $senhaCriptografada <br /> $qtdLetras";
?>