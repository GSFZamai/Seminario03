<?php 
    session_start();
    $db = require("./db.php");
    $login = $_POST["email"];
    $password = sha1($_POST["password"]);

    $query = "SELECT Id, Nome FROM USUARIOS WHERE Email = '$login' AND Senha = '$password';";

    $result = $db->query($query);

    if($result) {
        $response = mysqli_fetch_assoc($result);
        echo "<pre>";
        print_r($response);
        echo "</pre>";
        $_SESSION["Nome"] = $response["Nome"];
        $_SESSION["Id"] = $response["Id"];
        $_SESSION["logged"] = true;
        header("Location: http://localhost/seminario03/transacoes.php");
    }else{
        echo "Error: " . $query . "<br>" . $conn->error;
        $_SESSION["logged"] = false;
        header("Location: http://localhost/seminario03/index.php?login=1");
    }

    $db->close();
