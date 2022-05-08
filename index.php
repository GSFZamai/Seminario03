<?php 
    session_start();
    //$_SESSION["logged"] = false;
   // $_SESSION["Nome"] = "";

    if(isset($_SESSION["Nome"])) {
        print_r($_SESSION);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    
    <title>Finanças - <?php echo $_SESSION["Nome"] ?></title>
</head>
<body>
   
    <div id="principal">
        <div class="recepcao">
            <h2>SEJA BEM-VINDO</h2>
            <P>UTILIZE NOSSOS SERVIÇOS PARA MELHORAR SUA ADMINISTRAÇÃO</P>
            <img src="imagem/adm.png" alt="calculadora">
        </div>

    
        <div class="login">
            <h2>login</h2>
            <form class="formulario" method="POST" action="./scripts/login.php">
               <label for="text">digite seu email:</label>
               <input type="email" name="email" id="email" placeholder="email@exemplo.com"><br>
               <label for="password">digite sua senha:</label>
               <input type="password" name="password" id="password" placeholder="*********"><br>
             
               <input type="radio" name="lembrar-me" value="lembrar-me">
               <label for="lembrar-me">lembrar-me</label><br>
            <div class="botoes">
               <input type="submit" value="Entrar">
               <h3>Cadastre-se</h3>
               <a href="cadastrar.html"><input type="button" value="Cadastrar"></a>
            </div>
            
            </form>
           
        </div>
      
     </div>
</body>
</html>