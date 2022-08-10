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
    <title>Locações</title>
</head>
<body>
    <h1 class="Loccasd">Locações Cadastradas</h1>
    <div class="Listadeloc">
<?php
        use Romeritocampos\Auth\Models\Model;
        $db = new SQLite3(__DIR__."../../../../Locadora.db");
        $clientes = $db->query("SELECT * FROM tb_locacoes") or die("<h1>Nenhuma locação foi feita</h1>");
        $tabela = "<table border = '1px'><tr><td>Data</td><td>Cliente</td><td>Filme</td><td>Preço</td></tr></tr>";
        while ($row = $clientes->fetchArray()) {
            $row2 = Model::queryModel("SELECT * FROM tb_clientes WHERE cli_codigo = ".$row['loc_cli_codigo'].";");
            $row3 = Model::queryModel("SELECT * FROM tb_filmes WHERE fil_codigo = ".$row['loc_fil_codigo'].";");
            $tabela .= "<tr><td>".$row['loc_data']."</td><td>".$row2['cli_nome']."</td><td>".$row3['fil_titulo']."</td><td>".$row['loc_preco']."</td></tr>";
        }
        $tabela .= "</table>";
        echo $tabela;
    ?>
    </div>
</body>
</html>