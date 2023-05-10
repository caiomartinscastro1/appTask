<?php
    require_once('conexao.php');

    $id = $_GET['id'];

    $busca = $conexao->query("
        select * from caio_task where id = $id;
    ");

    $consulta = $busca->fetchAll(PDO::FETCH_ASSOC);

    foreach($consulta as $dados){
        $data = $dados['data'];
        $descricao = $dados['descricao'];
        $hora = $dados['hora'];
        $id = $dados['id'];
        $id_user = $dados['id_user'];
        $local = $dados['local'];
        $prioridade = $dados['prioridade'];
        $titulo = $dados['titulo'];
    }

    $conexao->query("
        insert into caio_task_excluido(
            data,
            descricao,
            hora,
            id,
            id_user,
            local,
            prioridade,
            titulo
        )values(
            '$data',
            '$descricao',
            '$descricao',
            $id,
            {$_SESSION['id']},
            '$local',
            '$prioridade',
            '$titulo'
        );
    ");

    $conexao->query("
        delete from caio_task where id = $id;
    ");
    

    header('location: ../perfil.php');
?>