
<?php
    require_once('conexao.php');

    $id = $_GET['id'];

    $busca = $conexao->query("
        select * from caio_user where id = $id;
    ");

    $consulta = $busca->fetchAll(PDO::FETCH_ASSOC);

    foreach($consulta as $dados){
        $adm = $dados['adm'];
        $email = $dados['email'];
        $id = $dados['id'];
        $nome = $dados['nome'];
        $password = $dados['password'];
    }

    $conexao->query("
        insert into caio_user_excluido(
            adm,
            email,
            id,
            nome,
            password
        )values(
            {$adm},
            '{$email}',
            {$id},
            '{$nome}',
            '{$password}'
        );
    ");
        
    $conexao->query("
        delete from caio_task where id_user = $id;
    ");

    $conexao->query("
        delete from caio_user where id = $id;
    ");

    if($_SESSION['adm'] == 0){
        header('location: ../login.php');
    }else{
        header('location: ../perfil.php');
    }

    
    

?>
