<?php
use Romeritocampos\Auth\Models\Locacao;
session_start();
if (isset($_SESSION['id'])) {
    if (isset($_POST['dtloc'], $_POST['clicod'], $_POST['filcod'], $_POST['preco'])) {
        $locacao = new Locacao($_POST['dtloc'], $_POST['filcod'], $_POST['clicod'], $_POST['preco']);
        $locacao->save();
        echo "<script>alert('Locação realizada com sucesso')</script>";
    }
}else{
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
    <link rel="stylesheet" href="../../Locadora.css">
    <title>Locação</title>
</head>
<body>
    <div class="locacao">
    <h1>Locação</h1>
    <form action="" method="post">
        <input type="date" name="dtloc" placeholder="data da locação">
        <input type="number" name="clicod" placeholder="cod do cliente">
        <input type="number" name="filcod" placeholder="cod do filme">
        <input type="number" step="0.01" name="preco" placeholder="preço">
        <button name="botao">Finalizar Locação</button>
    </form>
    </div>
</body>
</html>