<?php
require("restritos.php");
?>
<head>
<title>NCTEC - Planilha de Agendamento</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="configindex.css" type="text/css">
<link rel="stylesheet" type="text/css" href="menu.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<script type="text/javascript" src="validar.js"></script>
<script type="text/javascript" src="menu_corrige.js"></script>
<script type="text/javascript" src="formatar_mascaras.js"></script>
<!-- saved from url=(0013)about:internet -->
<style type="text/css">
#tabledados{
	margin: 0px;
	padding: 0px;
	border: 1px solid #CC00FF;
	top: 10px;
	position: relative;
	left: 0px;
}
#botaoenviar{
	height: 20px;
	width: 150px;
}
th {
	font-family: Arial;
	font-size: 12px;
	color: #003300;
	height: 15px;
	background-color: #EEEEBB;
	margin: 0px;
	padding: 0px;
}
.trimpar{
	background-color: #CECECE;
	margin: 0px;
	padding: 0px;
}	
table {
	margin: 0px;
	padding: 0px;
}
#formenviar{
	position: relative;
	height: 700px;

	width: 748px;

	top: 20px;

	left: 1px;

	text-align: center;

	/*border: 0.1mm solid #999999;*/

	align:"center";

}

select {

	height: 15px;

	font-family: Arial;

	font-size: 8pt;

}

#titulo2{

	position: relative;

	left: 0px;

	width: 300px;

	height: 20px;

	top: 10px;

}

.inputborda{

	border: 1px solid #666666;

}



</style>

</head>

<body leftmargin="0" topmargin="0" onLoad="document.agenda.reset();">
<div align="center"><strong></strong>
	<div id="fundotopo"></div>
	<div id="menu"><script type="text/javascript" src="menu.js"></script></div>
  <div id="corpo_reldocumentos">
		<br>
		<div align="center"><font color="#0033FF" size="3" face="Arial"><strong>Modulo de Encaminhamento de Alunos</strong></font></div>
		<font face="Verdana, Arial, Helvetica, sans-serif">Empresa</font>: <? echo "".$_SESSION['MeuLogin']['empresa'] ."" ?><br>
		<BR>
		<div style="position:relative;font-size:10px;font-family:arial">
			<p>INSTRUÇOES</p>
			<p align="left">Para encaminhar o aluno, o necessário que o mesmo tenha todos os documentos para inicio do curso, inclusive as certidões.</p>
			<p align="left">Caso tenha solicitado as certidões pela NCTEC, somente agendar o aluno para 10 dias após a solicitação ou entrar em contato para informação.</p>
			<p align="left">Antes de agendar, verificar nosso cronograma <a href="Cronogramadoscursos.htm" target="_blank">(Ver Cronograma) </a> , para que se evite de encaminhar o aluno em data que não tenha o curso.</p>
	  </div>
		<br>
		<!-- id="tabledados"-->
		<div id="formenviar" >
			<DIV align="center">
				<form action="confirma_agenda.php" method="post" enctype="multipart/form-data" name="agenda" >
						<table border="0" cellspacing="0" name="tabledados">
						  <th></th><th>Nome *</th><th>CPF *</th><th>Matr.</th><th>1º dia</th><th>2º dia</th><th>3º dia</th><th>4º dia</th><th>5º dia</th><th>Curso *</th>
                                                  <script charset="utf-8" type="text/javascript" src="escreveinputs.js"></script>
  			  			</table>
						<br>
					  	  <input id="botaoenviar" type="button" name="enviar" value="Enviar"  onClick="validaform(this.form);">
						  
                                </form>
		 	</DIV>
		</div>
	</div>
</div>
</body>













