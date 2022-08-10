<?php

use Romeritocampos\Auth\App\Application;
use Romeritocampos\Auth\App\Http\AuthMiddleware;
use Romeritocampos\Auth\Models\User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (isset($_POST['username'], $_POST['password'])) 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (User::exists($username, $password)) 
        {
            session_start();
            $_SESSION['user'] = $username;
            $_SESSION['id'] = session_id() . $username;
            header("Location: /homepage");
            
            exit;
        
        } else {
            header("Location: /login", 302);
 
            exit;
 
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../locadora.css">
    <title>Login</title>
</head>
<body>
    <div id="login">
    <h1>Login</h1>

    <form action="/login" method="POST">
        <input type="text" name="username" placeholder="Digite seu usuário">
        <input type="text" name="password" placeholder="Digite sua senha">
        <button class="loginbutão">Enviar</button>
    </form>

    <a class="link" href="/register">Registre-se</a>
    </div>
</body>
</html>