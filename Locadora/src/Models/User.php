<?php 

namespace Romeritocampos\Auth\Models;

class User extends Model 
{
    protected $nome;
    protected $username;
    protected $password;

    public function __construct($nome, $username, $password)
    {
        $this->$nome = $nome;
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function save() 
    {
        $statement = self::$conexao->prepare ("INSERT INTO tb_users(us_nome, us_username, us_password) VALUES (:n, :u, :p)");
        $statement->bindValue(':u', $this->username, SQLITE3_TEXT);
        $statement->bindValue(':u', $this->username, SQLITE3_TEXT);
        $statement->bindValue(':p', $this->password, SQLITE3_TEXT);

        return $statement->execute();

    }

    static function exists ($username, $password) 
    {
        $sttm = self::$conexao->prepare("SELECT * FROM tb_users WHERE us_username = :user;");
        $sttm->bindValue(':user', $username, SQLITE3_TEXT);

        $result = $sttm->execute();
        $row = $result->fetchArray();
        
        if (isset($row['us_password'])) 
        {
            return password_verify($password, $row['us_password']) ? true : false;
        }

        return false;

    }
}