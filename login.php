<?php
    require_once('php/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <form class="box" action="php/verificaLogin.php" method="post">
        <h1>Login</h1>

        <input style="color: black;" type="email" name="email" id="email" placeholder="Digite o seu email...">

        <input style="color: black;" type="password" name="password" id="password" placeholder="Digite a sua senha...">

        <?php
            if(isset($_GET['login']) && $_GET['login'] == 'erro1'){
                echo '<p class="aviso">Email ou senha invalido(s)</p>';
            }
        ?>

        <div class="botoes">
            <button class="teste" style="color: black;" type="submit">Login</button>
            <a class="teste" href="cadastrar.php">Cadastrar</a>
        </div>

    </form>

    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>