<?php require_once("php7_mysql_shim.php"); require_once("php7_mysql_shim.php");
require("restritos.php");
require("conectadb.php");
$data1 = $_POST['data1'];
$data2 = $_POST['data2'];
$dataexibicao = $data1;
$dataexibicao2 = $data2;
$data1 = formatadata($data1);
$data2 = formatadata($data2);

?>

<html>
<head>
<title>NCTEC - Confirmação de encaminhamento</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="links.css" type="text/css">
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
</head>
</style>
<body>
<div align="center">
		<div style="position:relative; width: 749; left: 0; height: 800;">
				<div><img src="imagens/logo_simples.jpg" width="100" height="80"></div>
				<div align="center" style="position:absolute; left: 0; width: 749px; height: 39px;">
		  					<p><font size="4" face="Courier New, Courier, mono"><strong><font face="Arial">Confirmação
          					de encaminhamento - Periodo: <? echo $dataexibicao . " à " . $dataexibicao2 ?> </font></strong></font></p>
		  					<!--<P><font face="Arial">Documento nº:</font><font face="Courier New, Courier, mono"> <? echo "". $_SESSION['MeuLogin']['login'] . date("d") . date("m") . date("y") . date("h") . date("i") . "" ?></font></P>-->
				</div>
				<div align="left" style="position:absolute; left: 0; top: 150;font-family:arial">
						<BR>
						Empresa: <? echo "".$_SESSION['MeuLogin']['login'] ."" ?><br>
						Data: <? echo "". date("d/m/y") ?><BR>
  		 		 </div>
				<div style="position:absolute; left: 2px; top: 199px; width: 746px; height: 30px;">
					<a  href="javascript:window.print()" class="novolink" ><img src="imagens/print.gif" name="sa" width="23" height="26" border="0"><b>Imprimir</b></a>
					
				</div>
				<div style="position: absolute;top: 240px;left: 1px;width: 707px;height: 27px;font-family: Arial;font-size: 8pt;">
							<table width="680" border="0" cellspacing="0">
							<th width="190">NOME \ CURSO</th><th></th><th>ESCALA</th></th><th>MATR</th>
							<TH width="70">1º DIA</TH><TH width="70">2º DIA</TH><TH  width="70">3º DIA</TH><TH  width="70">4º DIA</TH><TH>5º DIA</TH>
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
								function datanormal($dt) {
      									if ($dt=="0000-00-00") return "";
    									$yr=strval(substr($dt,0,4));
    									$mo=strval(substr($dt,5,2));
    									$da=strval(substr($dt,8,2));
    									return date("d/m/Y", mktime (0,0,0,$mo,$da,$yr));
								}

								function formatacpf($cpfsemformato){
									$parte1 = substr($cpfsemformato,0,3);
									$parte2 = substr($cpfsemformato,3,3);
									$parte3 = substr($cpfsemformato,6,3);
									$digito = substr($cpfsemformato,9,2);
									$cpfformatado = "$parte1.$parte2.$parte3-$digito";
									return $cpfformatado;
								}

								$codempresa =$_SESSION['MeuLogin']['codempresa'];
								$consulta_query = mysql_query("select * from tbencaminhamento_fixo where  codempresa ='$codempresa' and (dia1 >='$data1' and dia1 <='$data2')  order by nome asc");
								$i = 0;
								while ($linha = mysql_fetch_array($consulta_query))
								{
									
									$nome = $linha['nome'];
									$matricula = $linha['matricula'];
									$dianormal1 = datanormal($linha['dia1']);
									$dianormal2 = datanormal($linha['dia2']);
									$dianormal3 = datanormal($linha['dia3']);
									$dianormal4 = datanormal($linha['dia4']);
									$dianormal5 = datanormal($linha['dia5']);
									$escala = $linha['escala'];
									$curso = $linha['curso'];
									$i++;
									echo "<TR CLASS=\"trconfig".trfundo($i)."\"><TD> $nome </TD><td></td><td></td><TD><div align=\"center\">$matricula </div> </TD><TD> $dianormal1 </TD><TD> $dianormal2</TD><TD> $dianormal3  </TD><TD> $dianormal4 </TD><TD> $dianormal5 </TD></tr><TR  CLASS=\"trconfig".trfundo($i)."\"><TD colspan=\"2\"> $curso</td><TD> $escala</td><TD></td><TD></td><TD></td><TD></td><TD></td><TD></td></TR>";
												
												//<TD>  $cpf </TD>
								}
							?>
							</table> 
		  </div>
  </div>
  
</div>

</body>
</html>
