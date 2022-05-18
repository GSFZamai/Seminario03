<?php
session_start();
$nome = $_SESSION["Nome"];
$id = $_SESSION["Id"];
$db = require_once("./scripts/db.php");

$query = "
SELECT 			
(Select SUM(Valor) from Transacoes WHERE Tipo_Transacao = 1) as Entradas,
(Select SUM(Valor) from Transacoes WHERE Tipo_Transacao = 2) as Saidas,
t.Id,
t.Descricao,
t.Data,
t.Valor,
tt.Descricao as Tipo
FROM 
Transacoes t
LEFT JOIN Tipo_Transacao tt on(tt.Id = t.Tipo_Transacao)
WHERE Id_Usuario = $id
AND Exibe = 1;
            ";
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
            .then(res => {
                if(res.status === 200) {
                    document.location = "http://localhost/seminario03/transacoes.php"
                }
            })
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
        <input required id="descricao" name="descricao" type="text" placeholder="Descrição da transação">
        <label for="valor">Valor:</label>
        <input required id="valor" name="valor" type="number" step="0.10" placeholder="Valor da transação">
        <select name="tipo" id="tipo" required>
            <option value="1">Entrada</option>
            <option value="2">Saída</option>
        </select>
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
                    <td>Tipo</td>
                    <td>Deletar</td>
                </tr>
            </thead>
            <tbody>";
        foreach ($transacoes as $transacao) {
            echo "
                        <tr>
                            <td>$transacao[Descricao]</td>
                            <td>R$$transacao[Valor]</td>
                            <td>$transacao[Data]</td>
                            <td>$transacao[Tipo]</td>
                            <td><input type='button' value='Excluir' onclick='teste($transacao[Id])'/></td>
                        </tr>
                    ";
        }

        echo "</tbody>";
        $saldo = floatval($transacao['Entradas'] - $transacao['Saidas']);
        echo 
        "<tfooter>
            <tr>
                <td>Total:</td>
                <td>R$ $saldo</td>
            </tr>
        </tfooter>";
    }
    ?>


    </table>


</body>

</html>