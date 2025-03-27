<?php

class Conexao
{
    private $host = 'localhost';
    private $database = 'db_sistema_logistica';
    private $username = 'root';
    private $password = '';                         

    public function conectar()
    {
        try {
            $pdo = new PDO("mysql:host={$this->host};dbname={$this->database}","{$this->username}","{$this->password}");
        } catch (PDOException $e) {
            return false; 
        }
    }
}

