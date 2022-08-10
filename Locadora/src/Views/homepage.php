<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: /");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Pagina Inicial</title>
	<link rel="stylesheet" href="../../Locadora.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css">
    <script src="../../Locadora.js"></script>
</head>
<body>
	<div id="cabecario">
		<button class="cadastroOp" onclick="showAndCloseDiv('cadOp')">Cadastrar</button>
		<button class="listarOp" onclick="showAndCloseDiv('listOp')">Ver cadastros</button>
		<a class="sobrenos" href="/sobrenos">Sobre nós</a>
        <a class="sair" href="/logout">Sair <i class="fa-solid fa-right-from-bracket"></i></a>
	</div>
	<h2>Sugestões:</h2>
	<div id='filmes'>
		<a href="src/Views/Filmes/The_Batman.php"><img name="Batman" src="src/imagens/Batman.jpg"></a>
		<a href="src/Views/Filmes/uncharted.php"><img name="Uncharted" src="src/imagens/Uncharted.jpg"></a>
		<a href="src/Views/Filmes/origem.php"><img name="Origem" src="src/imagens/Origem.jpg"></a>
		<a href="src/Views/Filmes/moonFall.php"><img name="Moonfall" src="src/imagens/Moonfall.jpg"></a>
		<a href="src/Views/Filmes/hercules.php"> <img name="Hercules" src="src/imagens/Hercules.jpg"></a>
		<a href="src/Views/Filmes/Animais_Fantasticos.php"> <img name="Animais" src="src/imagens/Animaisfant.jpg"></a>
	</div>
    <div id = 'cadOp'>
        <center><h1 style="color: white">Cadastrar:</h1></center>
        <button onclick="showAndCloseDiv('cadOp')">X</button>
        <button onclick="goTo('/cadFilme')">Filme</button>
        <button onclick="goTo('/cadLoc')">Locação</button>
        <button onclick="goTo('/cadCliente')">Cliente</button>
    </div>
    <div id = 'listOp'>
        <center><h1 style="color: white">Ver:</h1></center>
        <button onclick="showAndCloseDiv('listOp')">X</button>
        <button onclick="goTo('/Filmes')">Filmes</button>
        <button onclick="goTo('/Locacoes')">Locações</button>
        <button onclick="goTo('/Clientes')">Clientes</button>
    </div>
</body>
</html>
