<?php

namespace Romeritocampos\Auth\Models;

class Filme extends Model
{
    protected $titulo;
    protected $sinopse;
    protected $poster;

    function __construct($titulo, $sinopse, $poster)
    {
        $this->titulo = $titulo;
        $this->sinopse = $sinopse;
        $this->poster = $poster;
    }

    public function save() 
    {
        $statement = self::$conexao->prepare ("INSERT INTO tb_filmes(fil_titulo, fil_sinopse, fil_poster) VALUES (:tit, :s, :poster)");
        $statement->bindValue(':tit', $this->titulo, SQLITE3_TEXT);
        $statement->bindValue(':s', $this->sinopse, SQLITE3_TEXT);
        $statement->bindValue(':poster', $this->poster, SQLITE3_BLOB);

        
        return $statement->execute();

    }
    static function exists ($titulo) 
    {
        $sttm = self::$conexao->prepare("SELECT * FROM tb_filmes WHERE fil_titulo = :tit;");
        $sttm->bindValue(':tit', $titulo, SQLITE3_TEXT);

        $result = $sttm->execute();
        $row = $result->fetchArray();
        if (isset($row['fil_titulo'])) 
        {
            if (strtoupper($row['fil_titulo']) == strtoupper($titulo))
            {
                return true;
            }
        }

        return false;

    }
}