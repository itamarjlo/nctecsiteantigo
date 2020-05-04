<? require("restritos.php");?>
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="configindex.css" type="text/css">
<link rel="stylesheet" type="text/css" href="menu.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<script type="text/javascript" src="menu_corrige.js"></script>
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
<!-- saved from url=(0013)about:internet -->
<style type="text/css">
.botao{
	height: 15px;
	width: 100px;
	left: 0;
}
</style>
</head>

<body leftmargin="0" topmargin="0">
<div align="center">
<div id="corpo_reldocumentos">
	<div id="fundotopo"></div>
	<div id="menu"><script type="text/javascript" src="menu.js"></script></div>
	<div id="alterlogin">
	<div id="tituloaltersenha">Altere sua senha</div> 	
	<form name="frmalterlogin" action="altersenha_ok.php" method="post" id="frmalterlogin" >
		<label>Nova Senha:</label><input class="pwd"name="novasenha" type="password" size="8" maxlength="8">
		<br><br clear="all">
		<label>Confirme a Senha:</label><input class="pwd" name="novasenha2" type="password" size="8" maxlength="8"><br><br>
		<div align="center"><input name="Submit" type="button" value="Confirmar" class="botao" onClick="comparasenha(novasenha,novasenha2);">
		</div>
		
		
	</form>
	</div>
</div>
</div>	
</body>
</html>
