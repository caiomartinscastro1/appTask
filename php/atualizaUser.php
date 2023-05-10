<?php 
    require_once('conexao.php');

    $id = $_GET['id'];

    $conexao->query("
        update caio_user
        set
        nome = '{$_POST['nome']}',
        email = '{$_POST['email']}',
        password = '{$_POST['password']}'
        where id = $id;
    ");

    header('location: ../perfil.php');

?>