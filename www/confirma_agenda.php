<?php 

require("restritos.php");
require("conectadb.php");
?>

<html>
<head>
<title>NCTEC - Confirmação de encaminhamento</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

</style>
</head>
<body>
<div align="center">
		<div style="position:relative; width: 749; left: 0; height: 800;">
				<div><img src="imagens/logo_simples.jpg" width="100" height="80"></div>
				<div align="center" style="position:absolute; left: 0; width: 749px; height: 39px;">
		  					<p><font size="4" face="Courier New, Courier, mono"><strong><font face="Arial">Confirmação de encaminhamento </font></strong></font></p>
		  					<P><font face="Arial">Documento nº:</font><font face="Courier New, Courier, mono"> <? echo "". $_SESSION['MeuLogin']['login'] . date("d") . date("m") . date("y") . date("h") . date("i") . "" ?></font></P>
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
								function formatacpf($cpfsemformato){
									$parte1 = substr($cpfsemformato,0,3);
									$parte2 = substr($cpfsemformato,3,3);
									$parte3 = substr($cpfsemformato,6,3);
									$digito = substr($cpfsemformato,9,2);
									$cpfformatado = "$parte1.$parte2.$parte3-$digito";
									return $cpfformatado;
								}
								for($i=1; $i <=23;$i++){
										if (isset($_POST["nome"][$i])){
										/*if (!empty($_POST['nome'][$i]) && !empty($_POST['cpf'][$i])){*/				
											if (!empty($_POST['nome'][$i])){
												$nome = $_POST['nome'][$i];
												$cpf = formatacpf($_POST['cpf'][$i]);
												$matricula = $_POST['matricula'][$i];
												$dia1 = formatadata($_POST['dia1'][$i]);
												$dia2 = formatadata($_POST['dia2'][$i]);
												$dia3 = formatadata($_POST['dia3'][$i]);
												$dia4 = formatadata($_POST['dia4'][$i]);
												$dia5 = formatadata($_POST['dia5'][$i]);
												$dianormal = array(0 => $_POST['dia1'][$i] , 1 => $_POST['dia2'][$i] , 2 => $_POST['dia3'][$i], 3 => $_POST['dia4'][$i], 4 => $_POST['dia5'][$i]);
												$dtencaminhamento = formatadata(date("d/m/y"));
												$codencaminhamento = $_SESSION['MeuLogin']['login'] . date("d") . date("m") . date("y") . date("h") . date("i") ;
												$empresa = $_SESSION['MeuLogin']['login'];
												$codempresa =$_SESSION['MeuLogin']['codempresa'];
												$codcurso =substr($_POST['curso'][$i],0,3);
												$curso = substr($_POST['curso'][$i],3);
												$escala = $_POST['escala'][$i];
												$sqlinserir = "INSERT INTO tbencaminhamento (nome, cpf,matricula, dia1, dia2, dia3, dia4, dia5, dtencaminhamento, codcomunicado,codcurso, curso,codempresa,empresa,escala)
							       				VALUES ('$nome','$cpf','$matricula','$dia1','$dia2','$dia3','$dia4','$dia5','$dtencaminhamento','$codencaminhamento','$codcurso','$curso','$codempresa','$empresa','$escala')";
												$sqlinserir_fixo = "INSERT INTO tbencaminhamento_fixo (nome, cpf,matricula, dia1, dia2, dia3, dia4, dia5, dtencaminhamento, codcomunicado,codcurso, curso,codempresa,empresa,escala)
							       				VALUES ('$nome','$cpf','$matricula','$dia1','$dia2','$dia3','$dia4','$dia5','$dtencaminhamento','$codencaminhamento','$codcurso','$curso','$codempresa','$empresa','$escala')";
												$sqlresultado_fixo = mysqli_query($conexao,$sqlinserir_fixo)or die(mysqli_error());
												$sqlresultado = mysqli_query ($conexao,$sqlinserir)or die(mysqli_error());
												echo "<TR CLASS=\"trconfig".trfundo($i)."\"><TD> $nome </TD><td></td><td></td><TD><div align=\"center\">$matricula </div> </TD><TD> $dianormal[0] </TD><TD> $dianormal[1] </TD><TD> $dianormal[2] </TD><TD> $dianormal[3] </TD><TD> $dianormal[4] </TD></tr><TR  CLASS=\"trconfig".trfundo($i)."\"><TD colspan=\"2\"> $curso</td><TD> $escala</td><TD></td><TD></td><TD></td><TD></td><TD></td><TD></td></TR>";
												//<TD>  $cpf </TD>
											} // FIM IF							  	 
										} // FIM FOR
						
 	 								}//FIM IF	
							?>
							</table> 
		  </div>
  </div>
  
</div>

</body>
</html>
