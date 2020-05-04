<html>

<head>

<title>NCTEC - Novo Centro Técnico de Formação em Segurança - Empresa On-Line</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="configindex.css" type="text/css">
<link rel="stylesheet" type="text/css" href="menu.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<style type="text/css">
.caixadetexto {
	text-align: left;
	position: absolute;
	left: 60px;
	width: 80px;
	border:0;
}
.botao{
	height: 15px;
	width: 100px;
	left:0px;
}
#mensagemderro{
	position: absolute;
	top: 30px;
	width: 749px;
	font-family: Arial;
	font-size: 10px;
	color: #FF0000;
	height: 18px;
	left: 0px;
	text-align: center;
}	
</style>
<script type="text/javascript" src="menu_corrige.js"></script>
<!-- saved from url=(0013)about:internet -->
</head>
<body leftmargin="0" topmargin="0">
<div align="center">
	<div id="fundotopo"></div>
	<div id="menu"><script type="text/javascript" src="menu.js"></script></div>
	<div id="corpo_reldocumentos">
	<div id="mensagemderro">
	   <?
	   		if (isset($_GET["e"])){
				$erro = $_GET["e"];
				if ($erro == 0) {
					$erro = "Usuário ou Senha incorretos, favor tente novamente";
				}elseif($erro == 1){
					$erro = "Login invalido";
				}elseif($erro == 2){
					$erro = "Acesso restrito";
				}elseif($erro == 3){
					$erro = "Senha atualizada com sucesso !!!";
				}elseif($erro == 4){
					$erro = "Usuario não liberado, entre em contato com a NCTEC para ativar seu login";
				}else{
					$erro = "Acesso restrito";
				}
	   			echo ("<label style=\"font-size: 12px\"> $erro");			
			}
		?>	 
      </div>
	<div id="login">
		<div id="titulologin">Login</div> 	
		<form name="frmlogin" action="logar.php"method="post" id="frmlogin" enctype="multipart/form-data" >
			<label>Usuário:</label><input class="caixadetexto" name="login" type="text" size="25" maxlength="35">
			<br><br clear="all">
			<label>Senha:</label><input class="caixadetexto" name="senha" type="password" size="8" maxlength="8"><br><br>
			<div align="center"><input name="Submit" type="submit" value="Confirmar" class="botao"></div>
		</form>
	</div>
	</div>
</div>
</body>
</html>