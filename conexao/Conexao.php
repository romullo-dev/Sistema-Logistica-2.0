<?php

class Conexao {

    public function conectar ()  
    {
        $host = 'localhost';
        $database = 'db_logistica';
        $username = 'root';
        $password = '';

        try {
            $sql = new PDO('mysql:host=localhost;dbname=db_logistica;$username, $password ');
        } catch (PDOException $e) {
            echo 'Erro'. e;
        }


    }




}
