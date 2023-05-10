<?php
    require_once('conexao.php');

    $busca = $conexao->query("
        select * from caio_user_excluido;
    ");

    $cadastro = true;

    $consulta = $busca->fetchAll(PDO::FETCH_ASSOC);

    foreach($consulta as $user){
        if($_POST['email'] == $user['email']){
            $cadastro = false;
        }
    }

    if($cadastro){
        
        $conexao->query("
        insert into caio_user(
            nome,
            email,
            password
        )values(
            '{$_POST['nome']}',
            '{$_POST['email']}',
            '{$_POST['password']}'
        );
        ");

        header('location: ../login.php?cadastro=success');
    
    }else{
        header('location: ../cadastrar.php?cadastro=erro3');
    }

?>