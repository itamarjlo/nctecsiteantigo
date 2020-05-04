<? require("restritos.php")?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<title><? 
if (isset($_SESSION['MeuLogin']['login'])){
echo "Serviços On Line - - -  " ."  " .$_SESSION['MeuLogin']['empresa'] . "";
}?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="configindex.css" type="text/css">
<link rel="stylesheet" type="text/css" href="menu.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<link rel="stylesheet" type="text/css" href="menulateral.css">
<script type="text/javascript" src="menu_corrige.js"></script>

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
				<div id="menu"><script type="text/javascript" src="menu.js"></script></div>
				<div id="saudacao" align="center" ><? 
						if (isset($_SESSION['MeuLogin']['login'])){
								echo "Bem vindo " ."  " .$_SESSION['MeuLogin']['empresa'] . "";
						}?>
				</div>
				<div style="POSITION:absolute; width: 749; height: 500; left: 0;" align="left">
					<div style="POSITION:absolute; left: 0; float:left; width: 157px; height: 100px;">
						<ul id="menu2" name="menu2">
    						<li><a href="consultaprocesso.php" target="_blank">Consultar Processo</a></li>
    						<li><a href="agenda.php" target="_self">Encaminhar Alunos</a></li>
							<li><a href="consulta_agenda_form.php" target="_blank">Consultar Agendados</a></li>							
							<li><a href="consulta_frequencia.php" target="_self">Consultar Frequencia</a></li>
    						<li><a href="altersenha.php" target="_self">Alterar Senha</a></li>
							<li><a href="" target="_self">Sair - Logoff</a></li>
  				  		</ul>
  			 	  </div>
					<div style="POSITION:absolute; width: 589px; right:0; height: 300px; left: 160px;" align="left">
								<p class="PTitulo1">Empresa On Line</p>
								<p><img src="imagens/linha_verde_amarela.jpg" width="600" height="3"></p>
								<p class="paragrafo_1"><img src="imagens/miniseta.gif">Visando o estreitamento operacional 
													junto aos nossos clientes. Criamos o sistema de Empresa On-Line onde o usuário poderá acessar consultas de processos,
													emitir declarações provisórias, encaminhar seus vigilantes (agendamento),  consultar freqüência de alunos, 
													alterar senha de login.
                        		<br>
								<br>						                        
                        		<p class="paragrafo_1"><img src="imagens/miniseta.gif">	O sistema Empresa On-Line irá criar uma melhor interatividade operacional entre a NCTEC 
													e as empresas de vigilância, onde a qualquer momento e dia poderá obter informações necessárias aos seus respectivos serviços.
								<br>
								<br>	
								<p class="paragrafo_1"><img src="imagens/miniseta.gif">	Lembramos que todo e qualquer sistema estará sempre em processo evolutivo, desta forma, 
													estamos sempre aberto a criticas e sugestões.
						
	  			  </div>
  				</div>
		</div>
</div>
</body>
</html>

