<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="configindex.css" rel="stylesheet" type="text/css">
<link href="menu.css" rel="stylesheet" type="text/css">
<link href="estilos.css" rel="stylesheet" type="text/css">
<style  type="text/css">
#consulta{
	position: relative;
	width: 250px;
	height: 180px;
	top: 70;
	border: 1px solid #000000;
}

</style>
<script src="menu_corrige.js" type="text/javascript"></script>
<script src="validar.js" type="text/javascript"></script>
</head>
<body leftmargin="0" topmargin="0">
	<div align="center">
	  	<div id="corpo">
				<div id="fundotopo"></div>
				<div id="menu"><script type="text/javascript" src="menu.js"></script></div>
				<div align="center">		
						<div id="consulta">
							<div style="font-size: 16px;position:relative; width: 250; height: 20; background-color: #A4DBFF; layer-background-color: #A4DBFF; border: 1px none #000000;">
										<font face="Arial">Autenticar Declara&ccedil;&atilde;o</font>
							</div>
							<div style="position:relative; width: 250; height: 110; background-color: #E6E6E6; layer-background-color: #E6E6E6; border: 1px none #000000;">
							<p style="margin-top: 0pt;font-size: 10px"><font face="Arial"><img src="imagens/miniseta.gif">Digite
							    abaixo o C&oacute;digo de seguran&ccedil;a da declara&ccedil;&atilde;o provis&oacute;ria.</font></P>
							<p style="margin-top: 0pt;font-size: 10px;color:red"><font face="Arial">Exatamente
							    como esta na declara&ccedil;&atilde;o</font></p>
		
									<form style="margin-top: 0pt" action="consulta_autentica.php" method="post">
											
											<input id="codigo" style="font-size: 12px;height: 20" name="codigo" type="text" size="40" maxlength="50" ><br>
											<input style="width:70; height: 20;margin-top: 2pt" name="botao" type="button" value="Consultar" onClick="validarconsultaautentica(this.form)">
							  </form>
						  </div>
							<div style="position:relative; width: 250; height: 50; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
								<p align="justify" style="margin-top: 0pt;font-size: 10px"><img src="imagens/miniseta.gif">Este
								  aplicativo serve somente para autenticar as
								  declara&ccedil;&otilde;es &nbsp; provis&oacute;rias emitidas pelo nosso
								  site, n&atilde;o autentica as &nbsp;&nbsp;&nbsp;declara&ccedil;&otilde;es emitidas
								  diretamente na academia.</p>
						  </div>
				  </div>
				</div>		
  		</div>
	</div>	
	

</body>

</html>

