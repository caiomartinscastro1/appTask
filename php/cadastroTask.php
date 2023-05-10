<?php
    require_once('conexao.php');

    

    $conexao->query("
        insert into caio_task(
            titulo,
            prioridade,
            local,
            id_user,
            hora,
            descricao,
            data
        )values(
            '{$_POST['titulo']}',
            '{$_POST['prioridade']}',
            '{$_POST['local']}',
            '{$_SESSION['id']}',
            '{$_POST['hora']}',
            '{$_POST['descricao']}',
            '{$_POST['data']}'
        );
    ");

    header('location: ../perfil.php');
?>