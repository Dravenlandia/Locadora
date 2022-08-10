<?php

namespace Romeritocampos\Auth\Models;

class Model 
{
    protected static $conexao;

    public static function registerConection($conexao) 
    {
        self::$conexao = $conexao;
    }

    public static function registerModel($table) 
    {
        self::$conexao->exec($table);
    }

    public static function queryModel($table){
        $values = self::$conexao->query($table);
        $row = $values->fetchArray();
        return $row;
    }

}
