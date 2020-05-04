<?php 
header("Content-type: text/html; charset=utf-8");
//require_once("php7_mysql_shim.php"); 
//require_once("php7_mysql_shim.php");
		session_start();
		if (isset($_SESSION['MeuLogin'])) {
			$logado = '1';
			}else{
			$logado = '0';
		}

?>
<html>
<head>
<title>NCTEC - Consultar Processo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="configindex.css" type="text/css">
<link rel="stylesheet" type="text/css" href="menu.css">
<link href="estilos.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="menu_corrige.js"></script>
<style  type="text/css">
.informacao{
	border: 1px solid #666666;
	position: relative;
	height: 230px;
	width: 600px;
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
	height: 60px;
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
					<?

						
						function datanormal($dt) {
      							if ($dt=="0000-00-00") return "";
    									$yr=strval(substr($dt,0,4));
    									$mo=strval(substr($dt,5,2));
    									$da=strval(substr($dt,8,2));
    									return date("d/m/Y", mktime (0,0,0,$mo,$da,$yr));
								}
						function horario ($valor_hora){
                                                        if ($valor_hora=="0000-00-00") return "";
							$hora = strval(substr($valor_hora,11,2));
							$minuto = strval(substr($valor_hora,14,2));
							return $hora . ":" . $minuto;
						}
						function datatostring($data){
								$arr = explode("/", $data);
								$nova_data = "$arr[2]"."$arr[1]"."$arr[0]"; //00/00/0000
								return $nova_data;
						}
						require_once("conectadb.php");
						/*	$buscanome = $_POST['nome'];*/
						$buscacpf = $_POST['cpf'];
						$buscacpf = trim(substr($buscacpf,0,3).'.'.substr($buscacpf,3,3).'.'.substr($buscacpf,6,3).'-'.substr($buscacpf,9,2));
						/*echo $buscacpf; */
						/*	if (!empty($buscanome)){
						$sql = "SELECT * FROM `tbalunos_site` where nome like '$buscanome%' ";
						}
						else
						{*/
						$sql = "SELECT * FROM `tbalunos_site` where cpf like '$buscacpf'";
						$sql_atualizado = "select alunos from tbatualizado";
						 
							/*	}*/
						$query = mysqli_query($conexao, $sql)or die('Erro ao selecionar a tabela');
						$query_atualizado = mysqli_query($conexao, $sql_atualizado) or die('erro ao selecionar a tabela - atualizado');
						$total = mysqli_num_rows($query);
						while($sql_linha_atualizado = mysqli_fetch_array($query_atualizado))
						{
						$hora_atualizacao = datanormal($sql_linha_atualizado['alunos']) . " " . horario($sql_linha_atualizado['alunos']) ;
						
						}
						
						if($total != 0){
							echo("<div id=\"informacao3\">");
							echo("<p><img src=\"imagens/miniseta.gif\">Divergências e duvidas quanto as informações abaixo, clique no link abaixo:</p>");
							echo("<p align=\"center\"><a href=\"contatos.htm\">Fale conosco</a>");
							echo("<p><img src=\"imagens/miniseta.gif\">Base de Dados 2017 à 2018.</a>");
							echo("<p><img src=\"imagens/miniseta.gif\">As informações prestadas abaixo são de carater informativo, não constituindo valor legal.</p>");
							echo("<p></p>");
							echo("<p><b><font color=\"#FF0000\">Ultima atualização do sistema: $hora_atualizacao</font></b></p>");
							echo("</div>");
							while($sql_linha = mysqli_fetch_array($query)){
								$matricula = $sql_linha['Matricula'];
								$nome = $sql_linha['Nome'];
								$cpf = $sql_linha['cpf'];
								$empresa= $sql_linha ['empresa'];
								$curso = $sql_linha['curso'];
								//if ($logado == '0') {
									if  ($sql_linha ['empresa'] == 'Particular' ){
										switch($sql_linha['cod_situacao']){
											case 3: //CERTIFICADO IMPRESSO
												$situacao = 'Aguardando Assinatura';
												$escondebutton = false;
												break;
						
											case 14:// CPF N�O ENCONTRADO NO GESP
												$situacao = '---Favor entrar em contato urgente com a NCTEC - 2209-9650';
												$escondebutton = true;
												break;
											case 15://REJEITADO PELA DELESP
												$situacao = '---Favor entrar em contato urgente com a NCTEC - 2209-9650';
												$escondebutton = true;
												break;
											case 99://REPROVADO
												$situacao = '---Favor entrar em contato urgente com a NCTEC - 2209-9650';
												$escondebutton = true;
												break;
											case 96:
												$situacao = '---Favor entrar em contato urgente com a NCTEC - 2209-9650';
												$escondebutton = true;
												break;
											case 93:
												$situacao = 'Favor entrar em contato urgente com a NCTEC - 2209-9650';
												$escondebutton = true;
												break;
											case 97:
												$situacao = 'Favor entrar em contato urgente com a NCTEC - 2209-9650';
												$escondebutton = true;
												break;
											default:
												$situacao = $sql_linha['situacao'];
												$escondebutton = false;
												break;
												
										}										
									}else{
										$situacao = 'Por favor verifique a posição do seu processo junto ao seu empregador. Caso seja empresa conveniada, realize login para efetuar consulta';	
										$escondebutton = false;
									}

								$protocolo = $sql_linha['protocolo'];
								$turma = $sql_linha['turma'];
								$registro = $sql_linha['registro'];
								$conclusao = datanormal( $sql_linha['final']);
								echo("<div class=\"informacão\">");
									echo("<table width=\"480\" border=\"0\" cellspacing=\"0\">");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">NOME:</td><td style=\"font-size:12px;font-family: Arial, Helvetica, sans-serif\">$nome</td></tr>");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">CPF:</td><td style=\"font-size:12px;font-family: Arial, Helvetica, sans-serif\">$cpf</td></tr>");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">EMPRESA:</td><td style=\"font-size:12px;font-family: Arial, Helvetica, sans-serif\">$empresa</td></tr>");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">CURSO:</td><td style=\"font-size:12px;color: #0000FF;;font-family: Arial, Helvetica, sans-serif\">$curso</td></tr>");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">TURMA:</td><td style=\"font-size:12px;font-family: Arial, Helvetica, sans-serif\">$turma</td></tr>");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">SITUAÇÃO:</td><td style=\"font-size:12px;color: #0000FF;font-family: Arial, Helvetica, sans-serif\">$situacao</td></tr>");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">PROTOCOLO:</td><td style=\"font-size:12px;font-family: Arial, Helvetica, sans-serif\">$protocolo</td></tr>");
											echo("<tr><td style=\"font-size:12px;font-weight: bold;font-family: Arial, Helvetica, sans-serif\">DATA DE CONCLUSÃO:</td><td style=\"font-size:12px;font-family: Arial, Helvetica, sans-serif\">$conclusao</td></tr>");
											echo("<form action=\"dprovisoria.php\" method=\"post\" name=\"solicitaprovisoria\" target=\"_blank\">		<input name=\"matricula\" type=\"hidden\" value='$matricula'>");
												//$protocolo != "" && 
											//$_SESSION['MeuLogin']['matricula'] = $matricula ;
											//if ($registro != "0" && $registro !="" && $protocolo != "" && datatostring($conclusao) <= datatostring(date("d/m/Y"))){
											if ($escondebutton == false && $registro != "0" && $registro !=""  && datatostring($conclusao) <= datatostring(date("d/m/Y"))){
													echo("<p><img src=\"imagens/pdf.jpg\" width=\"45\" height=\"22\" border=\"1\">");
 													echo("<input id=\"botao\" type=\"submit\" value=\"Emitir declaração provisória\">");
													
											}else
													echo("<p align=\"center\" style=\"font-size:12px;font-family:arial;color:brown\">Consulte outro dia para verificar a possibilidade de emissão de declaracao provisória.</p>");
													
											echo("</form>");
																		
									echo("</table>");
								echo("</div><br>");
							}
						}
						else
						{
							
							echo("<div align=\"center\">");
								echo("<div class=\"informacao2\">");
									echo("<p><img src=\"imagens/miniseta.gif\">Não encontramos registros com o seu CPF, o que necessariamente não que dizer que não haja processo em seu nome, nestes casos, pedimos que entre em contato conosco através de nosso telefone (2209-9650) ou clique abaixo para enviar sua duvida.</P><br>");
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