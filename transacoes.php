<?php
session_start();
$nome = $_SESSION["Nome"];
$id = $_SESSION["Id"];
$db = require_once("./scripts/db.php");
$serverHost = $_SERVER["HTTP_HOST"];
$query = "SELECT (Select SUM(Valor) from Transacoes WHERE Tipo_Transacao = 1) as Entradas, (Select SUM(Valor) from Transacoes WHERE Tipo_Transacao = 2) as Saidas, 
t.Id,
t.Descricao,
t.Data,
t.Valor,
tt.Descricao as Tipo
FROM 
Transacoes t
LEFT JOIN Tipo_Transacao tt on(tt.Id = t.Tipo_Transacao)
WHERE Id_Usuario = $id
AND Exibe = 1;";
$transacoes = mysqli_fetch_all($db->query($query), 1);


?>

<!DOCTYPE html>
<html lang="ptbr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transações de <?php echo $nome ?> </title>

    <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />

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
                    if (res.status === 200) {
                        document.location = "http://seminario03.herokuapp.com/transacoes.php"
                    }
                })
                .catch(rej => console.log(rej));

        }
    </script>
</head>

<body>
    <div class="container">

        <header>
            <h1 class="text-center">Bem vindo(a)! <?php echo $nome ?></h1>
        </header>
        <form method="POST" action="./scripts/novatransacao.php">
            <p>Insira uma nova transação:<p>
            <div class="row">
                <div class="col">
                    <input class="form-control" required id="descricao" name="descricao" type="text" placeholder="Descrição da transação">
                </div>
                <div class="col">

                    <div class="input-group">
                        <span class="input-group-text">R$</span>
                        <input class="form-control" required id="valor" name="valor" type="number" step="0.01" placeholder="Valor da transação">
                    </div>

                </div>
                <div class="col">
                    <select class="form-select" name="tipo" id="tipo" required>
                        <option value="1">Entrada</option>
                        <option value="2">Saída</option>
                    </select>
                </div>
                <div class="col">
                        <button class="btn btn-link p-0" type="submit"><i role="img" style="font-size: 25px" class="bi bi-plus-square-fill text-success"></i></i></button>

                    </div>
                <input type="number" value=<?php echo $id ?> name="id" id="id" hidden="TRUE" />
            </div>
        </form>
        <?php
        if (!$transacoes) {
            echo "
        <p>
        Nenhuma Transação cadastrada!
        </p>";
        } else {
            echo "
        <p>Resumo de transações:<p>
        <table class='table  table-striped'>
            <thead>
                <tr>
                    <td>Id</id>
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
                        <th scrope='row'>$transacao[Id]</th>
                        <td>$transacao[Descricao]</td>
                        <td>R$$transacao[Valor]</td>
                        <td>$transacao[Data]</td>
                        <td>$transacao[Tipo]</td>
                        <td><input type='button' class='btn btn-danger' value='Excluir' onclick='teste($transacao[Id])'/></td>
                        </tr>
                        ";
            }

            echo "</tbody>";
            $saldo = floatval($transacao['Entradas'] - $transacao['Saidas']);
            echo
            "<tfooter>
                    <tr>
                    <td>Saldo:</td>
                    <td>R$ $saldo</td>
                    </tr>
                    </tfooter>";
        }
        ?>


        </table>

    </div>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>