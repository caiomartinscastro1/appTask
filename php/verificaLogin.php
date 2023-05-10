<?php
    require_once('conexao.php');

    $consulta = $conexao->query("
    select * from caio_user;
    ");

    $lista = $consulta->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['login'] = false;
    foreach($lista as $user){
        if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
            $_SESSION['login'] = true;
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['adm'] = $user['adm'];
            $_SESSION['id'] = $user['id'];
        }
    }

    if($_SESSION['login']){
        header('location: ../perfil.php');
    }else{
        header('location: ../login.php?login=erro1');
    }
?>