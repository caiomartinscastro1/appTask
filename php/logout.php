<?php
    require_once('conexao.php');

    $_SESSION['login'] = false;
    header('location: ../login.php');
?>