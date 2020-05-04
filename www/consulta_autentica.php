<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link rel="stylesheet" href="configindex.css" type="text/css">

<link rel="stylesheet" type="text/css" href="menu.css">

<link href="estilos.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="menu_corrige.js"></script>
<style  type="text/css">
.informacao{
	border: 1px solid #666666;
	position: relative;
	height: 150px;
	width: 500px;
	left: 0px;
	top: 20px;
	background-color: #E0E0E0;
}
.informacao2{
	border: 1px solid #666666;
	position: relative;
	height: 100px;
	width: 500px;
	left: 0px;
	top: 20px;
	background-color: #E0E0E0;
	font-family: Arial;
	font-size: 12px;
	text-align: justify;
}
#informacao3{
	font-family: Arial;
	font-size: 10px;
	background-color: #EEEEEE;
	position: relative;
	height: 50px;
	width: 500px;
	top:2px;
}
</style>
<!-- saved from url=(0013)about:internet -->



<style type="text/css">
<!--
#Titulo_resultado {
	position: relative;
	height: 25px;
	width: 749px;
	left: 0px;
	top: 2px;
	text-align: center;
	background-color: #E2E2E2;
	font-family: Arial;
	font-size: 16px;
	color: #000000;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #91D2FF;
}
#botao{
	height: 22px;
	width:150px;
	font-family: Arial;
	font-size: 10px;
	padding: 0px;
}
-->
</style>
</head>



<body  leftmargin="0" topmargin="0">
<div align="center">
			<div id="corpo">
					<div id="fundotopo"></div>
					<div id="menu"><script type="text/javascript" src="menu.js"></script></div>
					<div id="Titulo_resultado">Resultado da Consulta</div>
					<?php require_once("php7_mysql_shim.php"); require_once("php7_mysql_shim.php");
						function datanormal($dt) {
      							if ($dt=="0000-00-00") return "";
    									$yr=strval(substr($dt,0,4));
    									$mo=strval(substr($dt,5,2));
    									$da=strval(substr($dt,8,2));
    									return date("d/m/Y", mktime (0,0,0,$mo,$da,$yr));
								}
						function datatostring($data){
								$arr = explode("/", $data);
								$nova_data = "$arr[2]"."$arr[1]"."$arr[0]"; //00/00/0000
								return $nova_data;
						}
						require_once("conectadb.php");
						$buscacodigo = $_POST['codigo'];
						$buscacodigo = trim($buscacodigo);
						$sql = "SELECT * FROM `tbvalidarprovisoria` where declaracao = '$buscacodigo'";
						$query = mysql_query("$sql")or die('Erro ao selecionar a tabela');
						$total = mysql_num_rows($query);
						if($total != 0){
							echo("<div id=\"informacao3\">");
							echo("<p><img src=\"imagens/miniseta.gif\">Divergências e duvidas quanto as informações abaixo, clique no link abaixo:</p>");
							echo("<p align=\"center\"><a href=\"contatos.htm\">Fale conosco</a>");
							echo("<p><img src=\"imagens/miniseta.gif\">As informações prestadas abaixo são de carater informativo, não constituindo valor legal.</p>");
							
							echo("</div>");
							$sql_linha = mysql_fetch_array($query);
							$declaracao = $sql_linha['declaracao'];
							$nome = $sql_linha['nome'];
							$cpf = $sql_linha['cpf'];
							$curso = $sql_linha['curso'];
							$dataemissao = datanormal($sql_linha['data']);
							echo("<div class=\"informacao\">");
									echo("<table width=\"450\" border=\"0\" cellspacing=\"0\">");
											echo("<tr><td colspan=\"2\" align=\"center\" style=\"font-size:16px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">DECLARAÇÃO PROVISÓRIA EMITIDA PARA:</td></tr>");
											echo("<tr><td colspan=\"2\" align=\"center\" style=\"font-size:16px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">.</td></tr>");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">CODIGO DE SEGURANÇA:</td><td style=\"font-size:12px;font-family: Arial, Helvetica, sans-serif\">$declaracao</td></tr>");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">NOME:</td><td style=\"font-size:12px;color: #0000FF;font-family: Arial, Helvetica, sans-serif\">$nome</td></tr>");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">CPF:</td><td style=\"font-size:12px;font-family: Arial, Helvetica, sans-serif\">$cpf</td></tr>");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">CURSO:</td><td style=\"font-size:12px;;font-family: Arial, Helvetica, sans-serif\">$curso</td></tr>");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">DATA DE EMISSÃO:</td><td style=\"font-size:12px;font-family: Arial, Helvetica, sans-serif\">$dataemissao</td></tr>");
									echo("</table>");
							echo("</div><br>");
							}
						
						else
						{
							
							echo("<div align=\"center\">");
								echo("<div class=\"informacao2\">");
									echo("<p><img src=\"imagens/miniseta.gif\">Certidão não encontrada em nossa base de dados. Favor verifique o código digitado.</P><br>");
									echo("<p align=\"center\"><a href=\"contatos.htm\">Fale conosco</a>");
								echo("</div>");
							echo("</div>");
						}
						
						?>
						
	</div
	
			
  ></div>
</body>
</html>

<!--   cpf identidade mae cod_empresa empresa cod_curso curso -->