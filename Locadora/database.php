<?php

use Romeritocampos\Auth\Models\Model;

//registrando conexao com o banco de dados
Model::registerConection(new SQLite3(__DIR__.'/Locadora.db'));
Model::registerModel('CREATE TABLE IF NOT EXISTS tb_users(us_codigo INTEGER PRIMARY KEY AUTOINCREMENT, us_nome TEXT, us_username TEXT, us_password TEXT)');
Model::registerModel('CREATE TABLE IF NOT EXISTS tb_filmes(fil_codigo INTEGER PRIMARY KEY AUTOINCREMENT,fil_titulo TEXT, fil_poster BLOB, fil_sinopse TEXT)');
Model::registerModel("CREATE TABLE IF NOT EXISTS tb_clientes(cli_codigo INTEGER PRIMARY KEY AUTOINCREMENT, cli_nome TEXT, cli_dtnasc DATE)");
$loc = "CREATE TABLE IF NOT EXISTS tb_locacoes(loc_codigo INTEGER PRIMARY KEY AUTOINCREMENT, loc_data DATE, loc_fil_codigo INT, loc_cli_codigo INT, loc_preco FLOAT, FOREIGN KEY(loc_fil_codigo) REFERENCES tb_filmes(fil_codigo), FOREIGN KEY(loc_cli_codigo) REFERENCES tb_clientes(cli_codigo))";
Model::registerModel($loc);