<?php
    require_once('php/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar usuario</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <form class="box" action="php/cadastrar.php" method="post">
        <h1>Cadastro de usuarios</h1>


        <input type="text" id="nome" name="nome" placeholder="Digite o seu nome...">

        <input type="email" id="email" name="email" placeholder="Digite o seu email...">

        <input type="password" id="password" name="password" placeholder="Digite uma senha...">
        
        <div class="botoes">
            <button class="teste">Cadastrar</button>
            <a class="teste" href="login.php">Voltar</a>
        </div>

    </form>

    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>