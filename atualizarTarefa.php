<?php
    require_once('php/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Tarefa</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <form class="box" action="php/atualizaTask.php?id=<?php echo $_GET['id'];?>" method="post">
        <h1>Atualizar Tarefa</h1>


        <input type="text" id="titulo" name="titulo" placeholder="Digite o seu titulo..." value="<?php echo $_GET['titulo'];?>">

        <label for="descricao">Descrição</label><br>
        <textarea style="color: black;" name="descricao" id="descricao" cols="30" rows="10"><?php echo $_GET['descricao'];?></textarea>
        
        <input type="text" id="local" name="local" placeholder="Digite o local que irá ocorrer..." value="<?php echo $_GET['local'];?>">
        
        <label for="prioridade">Prioridade da tarefa</label>
        <input type="range" name="prioridade" id="prioridade" min="0" max="2" value="<?php echo $_GET['prioridade'];?>">

        <label for="data">Data para realizar a tarefa</label>
        <input type="date" name="data" id="data" value="<?php echo $_GET['data'];?>">

        <label for="hora">Hora para realizar a tarefa</label>
        <input type="time" name="hora" id="hora" value="<?php echo $_GET['hora'];?>">


        <div class="botoes">
            <button class="teste">Atualizar</button>
            <a class="teste" href="perfil.php">Voltar</a>
        </div>

</form>

    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>