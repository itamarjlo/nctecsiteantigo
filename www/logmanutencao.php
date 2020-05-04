<? require("restritos.php")?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="configindex.css" type="text/css">
<link rel="stylesheet" type="text/css" href="menu.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<link rel="stylesheet" type="text/css" href="menulateral.css">


<style type="text/css">
* {
margin:0;
padding:0;

}
#saudacao{
	height: 25px;
	width: 749px;
	top: 2px;
	font-family: Arial;
	font-size: 12pt;
	left: 0px;
	position: relative;
	color: #333333;
	text-align: center;
}
</style>
</head>
<body leftmargin="0" topmargin="0">
<div align="center">
		<div id="corpo_reldocumentos">
				<div id="fundotopo"></div>
				<div id="saudacao" align="center" ><? 
						if (isset($_SESSION['MeuLogin']['login'])){
								echo "Bem vindo " ."  " .$_SESSION['MeuLogin']['empresa'] . "";
						}?>
				</div>
		  <div style="POSITION:absolute; width: 749; height: 500; left: 0;" align="left">
					<div style="POSITION:absolute; left: 0; float:left; width: 130; height: 100;">
						<ul id="menu2" name="menu2">
    						<li><a href="alterdadoslogin.php" target="_self">Alterar Senha</a></li>
    						<!-- <li><a href="agenda.php" target="_self">Encaminhar Alunos</a></li>
    						<li><a href="consulta_frequencia.php" target="_self">Consultar Frequencia</a></li>
    						<li><a href="altersenha.php" target="_self">Alterar Senha</a></li>
							<li><a href="" target="_self">Sair - Logoff</a></li> -->
  				  		</ul>
	  			 	</div>
		  </div>
		</div>
</div>
</body>
</html>