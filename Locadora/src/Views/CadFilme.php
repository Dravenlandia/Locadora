<?php

use Romeritocampos\Auth\Models\Filme;
use Romeritocampos\Auth\Models\Model;

session_start();
if(isset($_SESSION['id'])){
    if (isset($_POST['titulo'], $_POST['sinopse'], $_FILES['poster'])) {
        $titulo = $_POST['titulo'];
        $sinopse = $_POST['sinopse'];
        $poster = $_FILES['poster'];
        $tipo = strtolower(substr($_FILES['poster']['name'], -4));
        $arquivo = md5(time()) . $tipo;
        
        $filme = new Filme($titulo, $sinopse, $arquivo);
        echo "<script>alert('".Filme::exists($titulo)."')</script>";
        if(!Filme::exists($titulo))
        {
            move_uploaded_file($_FILES['poster']['tmp_name'], 'src/imagens/'.$arquivo);
            
            $filme->save();
            $arquivo = fopen("src/Views/Filmes/".str_replace(" ", "_", $titulo).".php", 'w');
            $row = Model::queryModel("SELECT * FROM tb_filmes WHERE fil_titulo = '$titulo';");
            $text_html= "<html lang='pt-br'><head><title>$titulo</title><script src='../../../Locadora.js'></script><link rel='stylesheet' href='../../../Locadora.css'></head><body style='background-color: #5051D4;'>";
            $text_html .= "<img class ='poster' src='../../imagens/".$row['fil_poster']."'><div class = 'sinopse'><p>".$row['fil_sinopse']."</p></div> <button onclick = 'back1()'>Voltar</button></body></html>";
            
            fwrite($arquivo, $text_html);
            echo "<script>alert('$titulo foi adicionado com sucesso')</script>";
        }else{
            echo "<script>alert('$titulo já foi adicionado')</script>";
        }
    
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
    <title>Cadastro de filme</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="painel">
    <h1>Cadastro de filme</h1>
    <form enctype="multipart/form-data" action="" method="POST">
        <input type="text" name="titulo" placeholder="Título">
        <input class="imgs" type="file" name="poster" placeholder="Poster">
        <textarea name="sinopse"></textarea>
        <button id="cadastrar">Cadastrar</button>
    </form>
        <button id="voltar" onclick="window.location.href='/homepage'">Voltar</button>
    </div>
</body>
</html>