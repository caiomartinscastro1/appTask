<?php 
    require_once('conexao.php');

    $id = $_GET['id'];
    echo $id;
    echo $_POST['prioridade'];

    $conexao->query("
        update caio_task 
        set 
        titulo = '{$_POST['titulo']}',
        prioridade = '{$_POST['prioridade']}',
        local = '{$_POST['local']}',
        hora = '{$_POST['hora']}',
        descricao = '{$_POST['descricao']}',
        data = '{$_POST['data']}'
        where id = $id;
    ");

    header('location: ../perfil.php');



?>