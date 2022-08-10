<?php

use Romeritocampos\Auth\App\Router;

$router = new Router;

//definir rotas da aplicação

$router->get('/homepage', '/Views/homepage.php');
$router->post('/homepage', '/Views/homepage.php');

$router->get('/register', '/Views/auth/register.php');
$router->post('/register', '/Views/auth/register.php');

$router->post('/cadFilme', '/Views/CadFilme.php');
$router->get('/cadFilme', '/Views/CadFilme.php');

$router->get('/Filmes', '/Views/Listagem/FilmesLista.php');

$router->get('/cadCliente', '/Views/cadCliente.php');
$router->post('/cadCliente', '/Views/cadCliente.php');

$router->get('/cadLoc', '/Views/cadLoc.php');
$router->post('/cadLoc', '/Views/cadLoc.php');

$router->get('/Clientes', '/Views/Listagem/ClienteLista.php');
$router->get('/Locacoes', '/Views/Listagem/ListaDLocs.php');
$router->get('/sobrenos', '/Views/saibaSobreNos.html');

$router->get('/', '/Views/auth/login.php');
$router->post('/', '/Views/auth/login.php');

$router->get('/logout', '/Views/auth/auth.php', true);

return $router;