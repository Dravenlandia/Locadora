<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Olá, <?php echo $_SESSION['user']?></h1>
    <form action="/logout" method="POST">
        <button>Logout</button>
    </form>
    <form action="/cadFilme" method="post">
        <button>Cadatrar filme</button>
    </form>
    <form action="/cadCliente" method="post">
        <button>Cadastar Cliente</button>
    </form>
    <form action="/cadLoc" method="post">
        <button>Fazer Locaçao</button>
    </form>

</body>
</html>