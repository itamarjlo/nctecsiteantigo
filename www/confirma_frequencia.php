<?php require_once("php7_mysql_shim.php"); require_once("php7_mysql_shim.php");
require("restritos.php");
require("conectadb.php");
?>
<html>
<head>
<title>Modulo de Consulta de Frequencia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="configindex.css" type="text/css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<!-- saved from url=(0013)about:internet -->
<style type="text/css">
<!--
th {
	font-family: Arial;
	font-size: 9pt;
	margin: 0px;
	padding: 0px;
}
.trconfigimpar{
	background-color: #D7D7D7;
	font-family: Arial;
	font-size: 8pt;
}
.trconfigpar{
	font-family: Arial;
	font-size: 8pt;
}
#oficio{
	border: 1px solid #333333;
	width: 750px;
}
-->
</style>
</head>
<body leftmargin="0" topmargin="0">
<div align="center">
<div style="position:relative; width: 900px; height: 850px; top: 1; ">
				<?
				$sql_atualizacao = "select * from tbatualizado_frequencia";
				$query_atualizacao =  mysql_query("$sql_atualizacao")or die('Erro - entrar em contato com o administrador - atualizacao');
				//$total_atualizacao = mysql_num_rows($query_atualizacao);
				while($sql_linha_atualizado = mysql_fetch_array($query_atualizacao))	{
						$hora_atualizacao = datanormal($sql_linha_atualizado['horario']) . " " . horario($sql_linha_atualizado['horario']) ;
			    }
				?>
				<img src="imagens/logo_simples.jpg">
		  		<p><font size="4" face="Arial"><strong>FREQUENCIA DE ALUNOS</strong></font></p>
		  		<P><font face="Arial">Documento nº:</font><font face="Courier New, Courier, mono"> <? echo "". $_SESSION['MeuLogin']['login'] . date("d") . date("m") . date("y") . date("h") . date("i") . "" ?></font></P>
		<div style="position:absolute; top: 150; left: 0; width: 414px; height: 80px;">
				<BR>
				<div style="font-size:14;font-family: arial" align="left">
					Empresa: <? echo "".$_SESSION['MeuLogin']['login'] ."" ?><br>
					Data: <? echo "". date("d/m/y") ?><BR>
					Data da ultima sincronização: <? echo "".  $hora_atualizacao ?>
				</div>
	</div>
		<div style="position:absolute; top:250px; left: 0; width: 900px; height: 17px;" align="center">
				<table width="890" border="0" cellspacing="0">
				<th>NOME</th><th>CPF</th><TH>1º DIA</TH><TH>2º DIA</TH><TH>3º DIA</TH><TH>4º DIA</TH><TH>5º DIA</TH><TH>CURSO</TH>
				<?
				$data1 = $_POST['data1'];
				$data2 = $_POST['data2'];
				$codempresa = $_SESSION['MeuLogin']['codempresa'];
				function trfundo($ind){
					if(($ind % 2)!=0){
						return 'impar';
						}else{
						return 'par';
					}
				}
				function horario ($valor_hora){
							if ($valor_hora=="0000-00-00") return "";
							$hora = strval(substr($valor_hora,11,2));
							$minuto = strval(substr($valor_hora,14,2));
							return $hora . ":" . $minuto;
						}
				function formatadata($data){
					$entrada = trim($data);
					if (strstr($entrada, "/")){
							$aux2 = explode ("/", $entrada);
							$data2 = $aux2[2] . "-". $aux2[1] . "-" . $aux2[0];
							return $data2;
					}
				}
		
				function datanormal($dt) {
 					if ($dt=="0000-00-00") return "";
					if ($dt=="") return "";
  					$yr=strval(substr($dt,0,4));
					$mo=strval(substr($dt,5,2));
  					$da=strval(substr($dt,8,2));
					return date("d/m/Y", mktime (0,0,0,$mo,$da,$yr));
				}
				$data1 = formatadata($data1);
				$data2 = formatadata($data2);
				$sql = "SELECT nome,cpf,dia1,dia2,dia3,dia4,dia5,curso FROM `tbfrequencia_site` where codempresa ='$codempresa' and (dia1 >='$data1' and dia1 <='$data2')  order by nome asc" ;
 				/* where cpf like '$buscacpf'"; */
 				
				$query = mysql_query("$sql")or die('Erro - entrar em contato com o administrador');
				$total = mysql_num_rows($query);
				if($total != 0){
					$i = 0;
					while($sql_linha = mysql_fetch_array($query)){
							$i += 1;
							$nome = $sql_linha['nome'];
							$cpf = $sql_linha['cpf'];
							$dia1 = datanormal($sql_linha['dia1']);
							$dia2 = datanormal($sql_linha['dia2']);
							$dia3 = datanormal($sql_linha['dia3']);
							$dia4 = datanormal($sql_linha['dia4']);
							$dia5 = datanormal($sql_linha['dia5']);
							$curso = $sql_linha['curso'];
							echo "<TR CLASS=\"trconfig".trfundo($i)."\"><TD> $nome </TD><TD>  $cpf </TD><TD><div align=\"center\">$dia1 </div> </TD><TD> $dia2</TD><TD> $dia3 </TD><TD> $dia4</td><TD> $dia5</td><TD> $curso</td></TR>";
					}
				}	
				?>
				</table> 
  </div>
</div>
</div>
</body>
</html>
