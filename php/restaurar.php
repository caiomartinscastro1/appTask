<?php
    require_once('conexao.php');

    $id = $_GET['id'];

    $busca = $conexao->query("
        select * from caio_user_excluido where id = $id;
    ");

    $consulta = $busca->fetchAll(PDO::FETCH_ASSOC);

    print_r($consulta);

    foreach($consulta as $user){
        $adm = $user['adm'];
        $email = $user['email'];
        $id = $user['id'];
        $nome = $user['nome'];
        $password = $user['password'];
    }

    $conexao->query("
        insert into caio_user(
            adm,
            email,
            id,
            nome,
            password
        )values(
            $adm,
            '{$email}',
            $id,
            '{$nome}',
            '{$password}'
        );
    ");

    $conexao->query("
        delete from caio_user_excluido where id = $id;
    ");

    header('location: ../verContas.php');

?>