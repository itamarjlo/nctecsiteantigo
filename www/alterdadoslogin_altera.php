<?php
require("restritos.php");
require_once("conectadb.php"); 

$cod = $_POST['empresa'];

$consulta = mysqli_query($conexao,"SELECT  codlogin,login,nome_empresa,senha,ativo FROM tblogin where codlogin= '$cod'  ORDER BY login ASC");
$linha = mysqli_fetch_row($consulta);
$codlogin = $linha[0];
$login = $linha[1];
$empresa = $linha[2];
$pwd = $linha[3];
$ativo = $linha[4];
if ($ativo == 0 ){
	$ativo_desc = 'Inativo';
	$ativo_cod = 0;
	}
	else
	{
	$ativo_desc = 'Ativo';
	$ativo_cod = 1;
	}

?>
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="configindex.css" type="text/css">
<link rel="stylesheet" type="text/css" href="menu.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<script type="text/javascript" src="validar.js"></script>
<!--<script type="text/javascript" src="menu_corrige.js"></script>-->
<script language="JavaScript">
	function comparasenha(pwd1,pwd2){
		if(pwd1.value == "" || pwd2.value ==""){
			alert ('Uso de senha em branco negado!');
			pwd1.focus();
			return false;
		}	
			if(pwd1.value != pwd2.value){
				alert ('As senhas divergem !!! \n Por Favor, Redigite');
				pwd1.focus();
				pwd1.value = "";
				pwd2.value = "";
				return false;
		}
		frmalterlogin.submit();
	}
</script>
-

<style type="text/css">
.botao{
	height: 15px;	width: 100px;	left: 0;
}
.label_estilo{
	font-family: Arial;
	font-size: 12px;
}
</style>
</head>
<body leftmargin="0" topmargin="0">
<div align="center">
<div id="corpo_reldocumentos">
	<div id="fundotopo"></div>
	<div>
		<form action="alteradadoslogin_ok.php" method="post">
			<input value="<? echo $codlogin ?>" type="hidden" name="codigo">
			<!--<label class="label_estilo">Cliente</label>-->
			<label><font size="2" face="Arial"></font><? echo $empresa; ?></label>
			<br><br>
			<!--<input name="empresa" type="text" value= "<? echo $empresa; ?>" size="80" maxlength="100" ><br><br>-->
			<label class="label_estilo">Login </label>
			<input id="login1" name="login" type="text" value= "<? echo $login; ?>" size="80" maxlength="100" >
			<br><br>
			<label class="label_estilo">Senha </label>
			<input id="pwd1" name="pwd" type="text" value= "<? echo $pwd; ?>" size="80" maxlength="100" >
			<br><br>
			<label class="label_estilo">Situação </label>
			<select name="situacao" >
				<option value="<? echo $ativo_cod ?>"><? echo $ativo_desc ?></option>
				<option value="1">Ativo</option>
				<option value="0">Inativo</option>
			</select><br><br>
			<input value="Alterar" type="button" onClick="validaralteralogin(this.form);">
	  </form>
	</div>
</div>
</div>	
</body>
</html>