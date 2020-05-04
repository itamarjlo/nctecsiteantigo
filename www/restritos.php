<?php
/* restritos.php */
session_start();
if (isset($_SESSION['MeuLogin'])) {
	$codlogin = $_SESSION['MeuLogin']['id'];
	$login = $_SESSION['MeuLogin']['login'];
	$hora = $_SESSION['MeuLogin']['hora'];
	$codempresa = $_SESSION['MeuLogin']['codempresa'];
	$empresa = $_SESSION['MeuLogin']['empresa'];
	$chave = "1a2cf8gk68gj67gf784kh69fo6"; // chave secreca
	$ip = $_SERVER['REMOTE_ADDR']; // pegando ip do usuario
	if ($_SESSION['MeuLogin']['chave'] != md5($login . $chave . $ip . $hora)) {
	// verificado se a chave é válida
		header("Location: login.php?e=1");
		}
	// atualizando a chave com novo horario de acesso
	$hora = time();
	$chave = md5($login . $chave . $ip . $hora);
	// registrando os novos dados na session.
	$_SESSION['MeuLogin'] = array("id" => $codlogin,"login" => $login,"chave" => $chave,"hora" => $hora,"codempresa" => $codempresa ,"empresa" => $empresa);
	} else {
	header("location: login.php?e=2");
	}
?>



