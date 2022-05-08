<?php 
    session_start();
    $nome = $_SESSION["Nome"];
    $id = $_SESSION["Id"];


?>
<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transações de <?php echo $nome?> </title>
</head>
<body>
    <header>
        <h1>Bem vindo(a)! <?php echo $nome?></h1>
    </header>
    <form>
        <label>Descrição:</label>
        <input id="descricao" name="descricao" type="text" placeholder="Descrição da transação">
        <label for="valor">Valor:</label>
        <input id="valor" name="valor" type="number" step="0.1" placeholder="Descrição da transação">
    </form>
</body>
</html>