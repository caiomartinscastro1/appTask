<?php
    require_once('php/conexao.php');

    $consulta = $conexao->query("
        select * from caio_user;
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

            <ul style="max-width: 700px;">
                <li><a href="#">Bem vindo(a) <?php echo $_SESSION['nome'];?> | </a></li>
                <li> <a href="php/logout.php"> Sair  </a></li>
                <?php
                    if($_SESSION['adm'] == 0){
                ?>
                <li><a href="php/excluirConta.php?id=<?php echo $id;?>"> Excluir conta</a></li>
                <li><a href="tarefasExcluidas.php?id=<?php echo $id?>">Tarefas Excluidas</a></li>
                <?php
                    }
                ?>

                <?php
                    if($_SESSION['adm'] == 1){
                ?>
                <li><a href="verContas.php"> Contas excluidas</a></li>
                <?php
                    }
                ?>
            </ul>

        </nav>
    </header>

    <main class="perfil">
        <?php
            if($_SESSION['adm'] == 1){
                echo '<h2 style="text-align: center; margin: 20px 0px 50px 0px;">Perfis com prioridade de usuario<h2>';
                foreach($lista as $user){
                    if($user['adm'] == 0){
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
                        <td style="font-size: 20px;"><a style="background-color: transparent; margin: 0px auto 30px 0px; color: white; line-height: 20px;" href="php/excluirConta.php?id=<?php echo $user['id'];?>">Deletar</a></td>
                        <td style="font-size: 20px;"><a style="background-color: transparent; margin: 0px auto 30px 0px; color: white; line-height: 20px;" href="atualizarUsuario.php?id=<?php echo $user['id'];?>">Update</a></td>
                    </tr>
                </tr>
            <?php
            }
                }
            ?>
        </tbody>
        </table>

        <?php
            }
            if($_SESSION['adm'] == 0){

            foreach($taskList as $task){

            
        ?>
            <div class="task">
                <p>Titulo: 
                    <span id="titulo"><?php echo $task['titulo'];?></span>
                </p>
                <p>Descrição: 
                    <span id="descricao"><?php echo $task['descricao'];?></span>
                </p>
                <p>Local: 
                    <span id="local"><?php echo $task['local'];?></span>
                </p>
                <p>Prioridade: 
                    <div style="border: 1px solid black;">
                        <p style="font-size: 18px; text-align: center;">Sem nenhuma prioridade: 0 - Prioridade minima: 1 - Prioridade maxima: 2</p>
                    <p id="prioridade" style="text-align: center;"><?php echo $task['prioridade'];?></p>
                    </div>
                </p>
                <p>Data: 
                    <span id="data"><?php echo $task['data'];?></span>
                </p>
                <p>Hora: 
                    <span id="hora"><?php echo $task['hora'];?></span>
                </p>

                <a href="atualizarTarefa.php?id=<?php echo $task['id']?>&titulo=<?php echo $task['titulo']?>&descricao=<?php echo $task['descricao']?>&local=<?php echo $task['local']?>&prioridade=<?php echo $task['prioridade']?>&data=<?php echo $task['data']?>&hora=<?php echo $task['hora']?>&" style="display: block; margin: 20px auto;">Atualizar Tarefa</a>

                <a href="php/deletarTask.php?id=<?php echo $task['id']?>" style="display: block; margin: 20px auto;">Deletar tarefa</a>

            </div>

        
        <?php
            }
            echo '<a href="tarefa.php" disabled="disabled">Cadastrar nova tarefa</a>';
                }
        ?>

        

    </main>

    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>