<? require("restritos.php"); ?>

<html>

<head>

<title>NCTEC - On Line Modulo de consulta de frequencia de alunos</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="configindex.css" rel="stylesheet" type="text/css">
<link href="menu.css" rel="stylesheet" type="text/css">
<link href="estilos.css" rel="stylesheet" type="text/css">
<style  type="text/css">
#consulta{
	position: relative;
	width: 250px;
	height: 247px;
	top: 70;
	border: 1px none #000000;
}

</style>
<script src="menu_corrige.js" type="text/javascript"></script>
<script src="validar.js" type="text/javascript"></script>
<script type="text/javascript" src="formatar_mascaras.js"></script>
</head>
<body leftmargin="0" topmargin="0">
	<div align="center">
	  	<div id="corpo">
				<div id="fundotopo"></div>
				<div id="menu"><script type="text/javascript" src="menu.js"></script></div>
		  <div align="center">		
						<div id="consulta">
							<div style="font-size: 16px;position:relative; width: 250; height: 20; background-color: #A4DBFF; layer-background-color: #A4DBFF; border: 0px none #000000;">
										<font face="Arial">Consultar Agendados Por Periodo</font>
							</div>
							<div style="position:relative; width: 250px; height: 200; background-color: #E6E6E6; layer-background-color: #E6E6E6; border: 1px none #000000;">
							<p style="margin-top: 0pt;font-size: 10px"><font face="Arial"><img src="imagens/miniseta.gif"> Insira
							    o periodo que necessita consultar o agendamento
							    dos alunos de sua empresa.</font></P>
							<p style="margin-top: 0pt;font-size: 10px;color:red">&nbsp;</p>
		
									<form style="margin-top: 0pt" action="consulta_agenda.php" method="post" target="_blank">
											
												<label style="font-size:14px;font-family:arial">Data Inicial&nbsp; </label><input id="data1" style="font-size: 12px;height: 20" name="data1" type="text" size="10" maxlength="10" onkeypress="formatadata(this, event)"   onblur="ValidaData(this)" ><br><br>
												<label style="font-size:14px;font-family:arial">Data Final&nbsp;&nbsp;  </label><input id="data2" style="font-size: 12px;height: 20" name="data2" type="text" size="10" maxlength="10" onkeypress="formatadata(this, event)"   onblur="ValidaData(this)"><br>
												<br>
												<input style="width:70; height: 20;margin-top: 2pt" name="botao" type="button" value="Consultar" onClick="validarconsultarfrequencia(this.form)">
							  </form>
						  </div>
							<div style="position:absolute; width: 250px; height: 41px; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000; top: 171px; left: 0px;">
								<p style="margin-top: 0pt;font-size: 10px"><img src="imagens/miniseta.gif">Base
								  de dados para consulta desde 02/09/13</p>
								<p style="margin-top: 0pt;font-size: 10px"><img src="imagens/miniseta.gif">Este aplicativo é somente para fins informativos, não consitituindo assim valor legal.</p>
						  </div>
				  </div>
			        <p>&nbsp;</p>
				</div>		
  		</div>
	</div>	
	

</body>

</html>

