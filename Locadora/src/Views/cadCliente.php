<?php
use Romeritocampos\Auth\Models\Cliente;
session_start();
if (isset($_SESSION['id'])) {
    if (isset($_POST['nome'], $_POST['dtnasc'])){
    $cliente = new Cliente($_POST['nome'], $_POST['dtnasc']);
    $cliente->save();

    echo "<script>alert('O cliente foi cadastrado com sucesso')</script>";
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
    <title>Cadastro de Cliente</title>
</head>
<body>
    <div id="cadClientes">
        <h1>Cadastro de Cliente</h1>
        <form action="" method="post">
            <input type="text" name="nome" placeholder="Nome do cliente">
            <input type="date" name="dtnasc" placeholder="Data de nascimento">
            <button class="cadClientesbotaoCadastrar">Cadastrar</button>
         </form>
        <button class="cadClientesbotaoVoltar" onclick="window.location.href = '/homepage'">Voltar</button>
    </div>
</body>
</html>