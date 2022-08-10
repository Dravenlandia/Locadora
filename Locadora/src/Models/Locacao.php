<?php
namespace Romeritocampos\Auth\Models;
class Locacao extends Model{
    protected $dtLoc;
    protected $codFilme;
    protected $codCli;
    protected $preco;

    function __construct($dtLoc, $codFilme, $codCli, $preco)
    {
        $this->dtLoc = $dtLoc;
        $this->codFilme = $codFilme;
        $this->codCli = $codCli;
        $this->preco = $preco;
    }

    public function save() 
    {
        $statement = self::$conexao->prepare ("INSERT INTO tb_locacoes(loc_data, loc_fil_codigo, loc_cli_codigo, loc_preco) VALUES (:dt, :filc, :clic, :preco)");
        $statement->bindValue(':dt', $this->dtLoc, SQLITE3_TEXT);
        $statement->bindValue(':filc', $this->codFilme, SQLITE3_INTEGER);
        $statement->bindValue(':clic', $this->codCli, SQLITE3_INTEGER);
        $statement->bindValue(':preco', $this->preco, SQLITE3_FLOAT);

        
        return $statement->execute();

    }
}