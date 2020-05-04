<?php
require("restritos.php");
require_once("conectadb.php"); 
$consulta = mysqli_query($conexao,"SELECT  codlogin,nome_empresa FROM tblogin ORDER BY login ASC");
?>

<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="configindex.css" type="text/css">
<link rel="stylesheet" type="text/css" href="menu.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
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
</script>-

<style type="text/css">
.botao{
	height: 15px;	width: 100px;	left: 0;
}
</style>
</head>
<body leftmargin="0" topmargin="0">
<div align="center">
<div id="corpo_reldocumentos">
	<div id="fundotopo"></div>
	<div>
		<form action="alterdadoslogin_altera.php" method="post">
			<font size="2" face="Arial">
			<label>Selecione o Cliente: </label>
			</font><br>
			<select id="empresa" name="empresa">
					<option value=""></option>
					<? 
					while( $row = mysqli_fetch_assoc($consulta) )
								{
								echo "<option value=\"{$row['codlogin']}\">{$row['nome_empresa']}</option>\n";
								}
					?>
		  </select>
				<input value="Localizar" type="submit">
		
		</form>
	
	</div>
</div>
</div>	
</body>
</html>