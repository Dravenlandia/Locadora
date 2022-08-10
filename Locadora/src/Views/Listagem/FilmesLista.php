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
    <title>Filmes</title>
</head>
<body>
    <div id="listarfilmes">
    <?php
    $lista = "<div id= 'listaF'>";
    $db = new SQLite3(__DIR__."../../../../Locadora.db");
    $filmes = $db->query("SELECT * FROM tb_filmes") or die("<h1>Nenhum filme foi cadastrado</h1>");
    while ($row = $filmes->fetchArray()) {
        $lista .= "<div id='organizar'><a href='/src/Views/Filmes/".str_replace(" ", "_", $row['fil_titulo']).".php'><img id='imgs' src= 'src/imagens/".$row['fil_poster']."'></a></div>";
    }
    $lista .= "</div>";
    echo $lista;

    ?>
    </div>
</body>
</html>
