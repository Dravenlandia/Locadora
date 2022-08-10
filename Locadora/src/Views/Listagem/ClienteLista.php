<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: /login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Locadora.css">
    <title>Clientes</title>
</head>
<body>
    <h1 class="Clientecad">Clientes Cadastrados</h1>
    <div class="listacliente">
    <?php
        $db = new SQLite3(__DIR__."../../../../Locadora.db");
        $clientes = $db->query("SELECT * FROM tb_clientes") or die("<h1>Nenhum cliente foi cadastrado</h1>");
        $tabela = "<table border = '1px'><tr><td>ID</td><td>Nome</td><td>Data de nascimento</td></tr></tr>";
        while ($row = $clientes->fetchArray()) {
            $tabela .= "<tr><td>".$row['cli_codigo']."</td><td>".$row['cli_nome']."</td><td>".$row['cli_dtnasc']."</td></tr>";
        }
        $tabela .= "</table>";
        echo $tabela;
    ?>
    </div>
</body>
</html>