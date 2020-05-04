<?php require_once("php7_mysql_shim.php"); require_once("php7_mysql_shim.php");
//require("restritos.php");
require("conectadb.php");
?>

<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="configindex.css" type="text/css">
<style type="text/css">
#oficio{
	border: 1px solid #333333;
	width: 750px;

}
th {
	font-family: Arial;
	font-size: 9pt;
	margin: 0px;
	padding: 0px;
	height: 10px;
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
#tabelalista{
	border: 1px solid;
	position: relative;
	width: 724px;
	height: 15px;
	margin: 0px;
	padding: 0px;
	top: 20px;
}

#mensagem{
	position: relative;
	width: 700px;
	top: 10px;
}
#mensagem2{
position: relative;
	width: 700px;
	top: 10px;
	}
#mensagem3{
	position: relative;
	width: 700px;
	top: 10px;
	}
</style>
<!-- saved from url=(0013)about:internet -->
</head>

<body>
<div ID="oficio">
	<div id="fundotopo_simples"><div align="center"><img src="imagens/logo_simples.jpg"></div></div>
	
	<div id="corpo_reldocumentos">
	<div align="center">
	  <div id="mensagem"><strong><font color="#FF0000" face="Arial">Lista de presença - Alunos agendados</font></strong></div>
  	  <div id="mensagem2"><strong>Curso: <? echo $_POST['selcurso'] ?></strong></div>
	  <div id="mensagem3"><strong>Data:<? echo $_POST['consdia'] ?></strong></div>
  	</div>
	
	<table id="tabelalista" border="0" cellspacing="0"  name="tabelalista">
	<th>COD</th><th>NOME</th><th>DATA</th><th>DIA?</th><th>EMPRESA</th><th><div align="center">ASSINATURA ALUNO</div></th>
	<?	
		function trfundo($ind){
			if(($ind % 2)!=0){
		return 'impar';
			}else{
		return 'par';
			}
		}
		function formatadata($data){
					$entrada = trim($data);
					if (strstr($entrada, "/")){
							$aux2 = explode ("/", $entrada);
							$data2 = $aux2[2] . "-". $aux2[1] . "-" . $aux2[0];
							return $data2;
					}
		}
		function formatadatainv($data){
					$entrada = trim($data);
					if (strstr($entrada, "-")){
							$aux2 = explode ("-", $entrada);
							$data2 = $aux2[2] . "/". $aux2[1] . "/" . $aux2[0];
							if ($data2 != "00/00/0000"){
								return $data2;
								}
								else
								{
								return "";
								}
								
							}
					}
		$buscadata = $_POST['consdia'];
		
		$buscadata = formatadata($buscadata);
		$tipocurso= $_POST['selcurso'];
		
		$sql = "select cod,nome,empresa,matricula,dia1,dia2,dia3,dia4 from tbencaminamento WHERE (dia1 = '$buscadata' or dia2 = '$buscadata' or dia3 = '$buscadata' or dia4 = '$buscadata') and curso='$tipocurso'";
		$consulta = mysql_query($sql) or die('Erro ao consultar listadia');
		$i = 0;
		
		while($sql_linha = mysql_fetch_array($consulta)){
			$cod =  intval($sql_linha['cod']);
			$nome = $sql_linha['nome'];
			$matricula = $sql_linha['matricula'];
			$dia1 = formatadatainv($sql_linha['dia1']);
			$dia2 = formatadatainv($sql_linha['dia2']);
			$dia3 = formatadatainv($sql_linha['dia3']);
			$dia4 = formatadatainv($sql_linha['dia4']);
			$empresa = $sql_linha['empresa'];
			if($dia1 == formatadatainv($buscadata)){
				$diaexibir = $dia1;
				$diaseq = "1º dia";
			}elseif($dia2 == formatadatainv($buscadata)){
				$diaexibir = $dia2;
				$diaseq = "2º dia";
			}elseif($dia3 == formatadatainv($buscadata)){
				$diaexibir = $dia3;
				$diaseq = "3º dia";
			}elseif($dia3 == formatadatainv($buscadata)){
				$diaexibir = $dia4;
				$diaseq = "4º dia";
			}		
			echo "<TR CLASS=\"trconfig".trfundo($i).
"\"><td>$cod</td><td>$nome</td><td>$diaexibir</td><td>$diaseq</td><td>$empresa</td><td><div align=\"right\">_______________________________________</div</td></tr>";
			$i++;
			
		}
				
		
	?>
	</table>	
	</div>
</div>
</body>
</html>