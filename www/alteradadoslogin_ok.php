<?php
require("restritos.php");
require_once("conectadb.php");
$codlogin = $_POST['codigo'];
$empresa = $_POST['empresa']; 
$login = $_POST['login'];
$pwd = $_POST['pwd'];
$ativo = $_POST['situacao'];
$sqlinserir = "update tblogin set login='$login',senha ='$pwd' ,ativo='$ativo' where codlogin ='$codlogin' ";
$sqlresultado = mysqli_query($conexao,$sqlinserir) ;
?>

<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="configindex.css" type="text/css">
<style type="text/css">
.boxresposta{
	position: relative;
	height: 100px;
	width: 300px;
	top: 10;
}
</style>
</head>

<body>
<div align="center">
	<div id="fundotopo"></div>
  <div class="boxresposta"><strong><font face="Arial">Atualizado com Sucesso</font></strong>
  <p><? echo $codlogin ?></p>
  <p><? echo $empresa ?></p>
  <p><? echo $login ?></p>
  <p><? echo $pwd ?></p>
  <p><?
  if ($ativo == 0 ){
	$ativo_desc = 'Inativo';
	$ativo_cod = 0;
	}
	else
	{
	$ativo_desc = 'Ativo';
	$ativo_cod = 1;
	}
	echo $ativo_desc;
	 ?></p>
  
</div>
</div>

</body>
</html>