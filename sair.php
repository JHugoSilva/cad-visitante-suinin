<?php
session_start();
session_destroy();

// Remover todos os dados por seguranca nas variaveis globais
unset ( $_SESSION['usuarioId'],
        $_SESSION['usuarioNome'],
        $_SESSION['usuarioNiveisAcessoId'],
        $_SESSION['usuarioEmail']);

//Redicrecionar o usuario para a pagina de Login
header("Location: index.php");

?>