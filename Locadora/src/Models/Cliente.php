<?php
namespace Romeritocampos\Auth\Models;
class Cliente extends Model{
    protected $nome;
    protected $dtnasc;

   function __construct($nome, $dtnasc)
   {
    $this->nome = $nome;
    $this->dtnasc = $dtnasc;
   }

   public function save() 
    {
        $statement = self::$conexao->prepare ("INSERT INTO tb_clientes(cli_nome, cli_dtnasc) VALUES (:nome, :dtnasc)");
        $statement->bindValue(':nome', $this->nome, SQLITE3_TEXT);
        $statement->bindValue(':dtnasc', $this->dtnasc, SQLITE3_TEXT);

        
        return $statement->execute();

    }
}