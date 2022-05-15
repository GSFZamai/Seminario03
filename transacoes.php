<?php
session_start();
$nome = $_SESSION["Nome"];
$id = $_SESSION["Id"];
$db = require_once("./scripts/db.php");

class Transacao
{
    public int $Id;
    public string $Descricao;
    public int $Valor;
    public $Data;
}


$query = "SELECT * FROM transacoes WHERE Id_Usuario = $id";
$transacoes = mysqli_fetch_all($db->query($query), 1);
?>

<!DOCTYPE html>
<html lang="ptbr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transações de <?php echo $nome ?> </title>

    <script>
       async function teste(id) {
            var myInit = {
                method: "POST",
                body: JSON.stringify({
                    Id: id
                })
            }

            fetch("./scripts/excluitransacao.php", myInit)
            .then(res => console.log(res))
            .catch(rej => console.log(rej));
            
        }
    </script>
</head>

<body>
    <header>
        <h1>Bem vindo(a)! <?php echo $nome ?></h1>
    </header>
    <form method="POST" action="./scripts/novatransacao.php">
        <label>Descrição:</label>
        <input id="descricao" name="descricao" type="text" placeholder="Descrição da transação">
        <label for="valor">Valor:</label>
        <input id="valor" name="valor" type="number" step="0.1" placeholder="Valor da transação">
        <input type="number" value=<?php echo $id ?> name="id" id="id" hidden="TRUE" />
        <input type="submit" value="Cadastrar">
    </form>
    <?php
    if (!$transacoes) {
        echo "
            <p>
                Nenhuma Transação cadastrada!
            </p>";
    } else {
        echo "
        <table>
            <thead>
                <tr>
                    <td>Descrição</td>
                    <td>Valor</td>
                    <td>Data</td>
                    <td>Deletar</td>
                </tr>
            </thead>
            <tbody>";
        foreach ($transacoes as $transacao) {
            echo "
                        <tr>
                            <td>$transacao[Descriao]</td>
                            <td>R$$transacao[Valor]</td>
                            <td>$transacao[Data]</td>
                            <td><input type='button' value='Excluir' onclick='teste($transacao[Id])'/></td>
                        </tr>
                    ";
        }

        echo "</tbody>";
    }
    ?>


    </table>


</body>

</html>