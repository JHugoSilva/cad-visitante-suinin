<?php
ob_start();
if(($_SESSION['usuarioId'] == "") || ($_SESSION['usuarioNome'] == "") || ($_SESSION['usuarioNiveisAcessoId'] == "") || ($_SESSION['usuarioEmail'] ==""))
{

// Mensam de Erro
	$_SESSION['loginErro'] = "Area restrita para usuarios cadastrados";

// Manda o usuario para tela de lgin
	header ("Location: index.php");

}