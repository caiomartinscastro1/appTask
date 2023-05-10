<?php
    require_once('php/conexao.php');

    $id = $_GET['id'];

    $consulta = $conexao->query("
        select * from caio_user where id = $id;
    ");

    $lista = $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach($lista as $dados){
        $nome = $dados['nome'];
        $email = $dados['email'];
        $pass = $dados['password'];
    }

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
    <form class="box" action="php/atualizaUser.php?id=<?php echo $_GET['id'];?>" method="post">
        <h1>Atualizar usuario</h1>

        <input type="text" id="nome" name="nome" placeholder="Digite o seu nome..." value="<?php echo $nome;?>">

        <input type="email" id="email" name="email" placeholder="Digite o seu email..." value="<?php echo $email;?>">

        <input type="passowrd" id="password" name="password" placeholder="Digite a sua senha..." value="<?php echo $pass;?>">

        <div class="botoes">
            <button class="teste">Atualizar</button>
            <a class="teste" href="perfil.php">Voltar</a>
        </div>

</form>

    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>