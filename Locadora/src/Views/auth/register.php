<?php

use Romeritocampos\Auth\Models\User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (isset($_POST['username'], $_POST['password'])) 
    {
        $user = new User($_POST['nome'], $_POST['username'], $_POST['password']);

        if (!User::exists($_POST['username'], $_POST['password'])) 
        {    
            $user->save();

            //registra sessão do usuário
            session_start();
         
            $_SESSION['user']=$_POST['username'];
            $_SESSION['id']=session_id() . $_POST['username'];

            header("Location: /homepage", true, 302);
         
            exit;
        
        }
        } else {
            header("Location: /", true, 302);
           
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Locadora.css">
    <title>Cadastra-se</title>
</head>
<body>

    <div id="registro">
        <h1>Registro de Usuário</h1>

        <form action="/register" method="POST">
            <input type="text" name="nome" placeholder="Digite seu nome">
            <input type="text" name="username" placeholder="Digite seu username">
            <input type="password" name="password" placeholder="Digite sua senha">
            <button class="botaoregistro">Enviar</button>
        </form>   
    </div>     
</body>
</html>