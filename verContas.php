<?php
    require_once('php/conexao.php');

    $consulta = $conexao->query("
        select * from caio_user_excluido;
    ");

    $lista = $consulta->fetchAll(PDO::FETCH_ASSOC);

    $id = $_SESSION['id'];

    $taskConsulta = $conexao->query("
        select * from caio_task where id_user = $id;
    ");

    $taskList = $taskConsulta->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <header>
        <nav>
           <h1>Logo</h1>

            <ul>
                <li><a href="#">Bem vindo(a) <?php echo $_SESSION['nome'];?> | </a></li>
                <li> <a href="php/logout.php"> Sair  </a></li>
                <?php
                    if($_SESSION['adm'] == 0){
                ?>
                <li><a href="php/excluirConta.php?id=<?php echo $id;?>"> Excluir conta</a></li>
                <?php
                    }
                ?>

                <?php
                    if($_SESSION['adm'] == 1){
                ?>
                <li><a href="perfil.php"> Principal</a></li>
                <?php
                    }
                ?>
            </ul>

        </nav>
    </header>

    <main class="perfil">
        <?php
            if($_SESSION['adm'] == 1){
                echo '<h2 style="text-align: center; margin: 20px 0px 50px 0px;">Perfil com prioridade de usuario<h2>';
                foreach($lista as $user){
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th style="font-size: 20px;" scope="col">ID</th>
                        <th style="font-size: 20px;" scope="col">Nome</th>
                        <th style="font-size: 20px;" scope="col">Email</th>
                        <th style="font-size: 20px;" scope="col">Senha</th>
                        <th style="font-size: 20px;" scope="col"></th>
                        <th style="font-size: 20px;" scope="col"></th>
                    </tr>
                </thead>
        
        <tbody>
                <tr>
                    <th style="font-size: 20px;" scope="row"><?php echo $user['id']?></th>
                        <td style="font-size: 20px;"><?php echo $user['nome']?></td>
                        <td style="font-size: 20px;"><?php echo $user['email']?></td>
                        <td style="font-size: 20px;"><?php echo $user['password']?></td>
                        <td style="font-size: 20px;"><a style="background-color: transparent; margin: 0px auto 30px 0px; color: white; line-height: 20px;" href="php/restaurar.php?id=<?php echo $user['id'];?>">Adionar </a></td>
                    </tr>
                </tr>
            <?php
                }
            }
            ?>
        </tbody>
        </table>

    </main>

    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>