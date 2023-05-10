<?php
    require_once('conexao.php');

    $id = $_GET['id'];

    $conexao->query("
        delete from caio_task where id_user = $id;
    ");

    $conexao->query("
        delete from caio_user where id = $id;
    ");

    header('location: ../perfil.php');
?>