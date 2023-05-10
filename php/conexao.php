<?php
    try{
        session_start();

        $dsn = 'mysql:host=localhost;dbname=pwiii';
        $user = 'root';
        $pass = '';

        $conexao = new PDO($dsn , $user , $pass);

    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>