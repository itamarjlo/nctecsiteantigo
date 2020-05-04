<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<title>Nctec - Consulta de Processos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="configindex.css" rel="stylesheet" type="text/css">
<link href="menu.css" rel="stylesheet" type="text/css">
<link href="estilos.css" rel="stylesheet" type="text/css">
<style  type="text/css">
#consulta{
	position: relative;
	width: 250px;
	height: 180px;
	top: 70px;
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
										<font face="Arial">Consultar Processo  </font>
							</div>
							<div style="position:relative; width: 250; height: 110; background-color: #E6E6E6; layer-background-color: #E6E6E6; border: 1px none #000000;">
							<p style="margin-top: 0pt;font-size: 10px"><font face="Arial"><img src="imagens/miniseta.gif">Saiba a Posição do processo do seu curso através    do CPF </font></P>
							<p style="margin-top: 0pt;font-size: 10px;color:red"><font face="Arial">Sem
							    pontos e/ou traços</font></p>
		
									<form style="margin-top: 0pt" action="consulta.php" method="post">
											
											<input id="cpf" style="font-size: 12px;height: 20" name="cpf" type="text" size="16" maxlength="16" onBlur="Verifica_CPF(this)"><br>
											<input style="width:70; height: 20;margin-top: 2pt" name="botao" type="button" value="Consultar" onClick="validarconsultaprocesso(this.form)">
									</form>
						  </div>
							<div style="position:relative; width: 250; height: 50; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
								<p style="margin-top: 0pt;font-size: 10px"><img src="imagens/miniseta.gif">Base
								  de dados para consulta: 2017 à 2018</p>
								<p style="margin-top: 0pt;font-size: 10px"><img src="imagens/miniseta.gif">Este aplicativo é somente para fins informativos, não consitituindo assim valor legal.</p>
						  </div>
				  </div>
				</div>		
  		</div>
	</div>	
	

</body>

</html>

