<?php 

	            		function datanormal($dt) {
      							if ($dt=="0000-00-00") return "";
								if($dt == "") return "";
    							$yr=strval(substr($dt,0,4));
    							$mo=strval(substr($dt,5,2));
    							$da=strval(substr($dt,8,2));
    							return date("d/m/Y", mktime (0,0,0,$mo,$da,$yr));
								}
						function formatadata($data){
								$entrada = trim($data);
								if (strstr($entrada, "/")){
									$aux2 = explode ("/", $entrada);
									$data2 = $aux2[2] . "-". $aux2[1] . "-" . $aux2[0];
									return $data2;
								}
						}

require_once("conectadb.php");
require_once ("./fpdf/fpdf.php");
$postmatricula = trim($_POST['matricula']);
//$postmatricula = $_SESSION['MeuLogin']['matricula'];
if (isset($postmatricula)){
	$sql = "SELECT * FROM `tbalunos_site` where matricula = '$postmatricula'";
	$query = mysqli_query($conexao,$sql)or die('Erro ao selecionar a tabela');
	$sql_linha = mysqli_fetch_array($query);
    /* @var $nome type */
        $nome = $sql_linha['Nome'];
	$cpf = $sql_linha['cpf'];
	$empresa= $sql_linha ['empresa'];
	$curso = $sql_linha['curso'];
	$situacao = $sql_linha['situacao'];
	$protocolo = $sql_linha['protocolo'];
	$dtprotocolo = datanormal($sql_linha['dtProtocolo']);
	$turma = $sql_linha['turma'];
	$inicio = datanormal($sql_linha['inicio']);
	$conclusao = datanormal( $sql_linha['final']);
	$registro = $sql_linha['registro'];
	$dataatual = formatadata(date("d/m/y"));
	$declaracao = date("d").$postmatricula.date("m").date("h").date("i").date("s");
	$sqlinserir = "INSERT INTO tbvalidarprovisoria (declaracao,nome, cpf,data,curso)
      				VALUES ('$declaracao','$nome','$cpf','$dataatual' ,'$curso')";
	
        $sqlresultado = mysqli_query($conexao, $sqlinserir) or die(mysql_error());


	define("FPDF_FONTPATH","fpdf/font/");
	$PDF = new FPDF( 'P','mm','A4' );
	$PDF -> SetMargins(15, 30, 15);
	$PDF -> SetAuthor('Nctec');
	$PDF -> SetTitle('Documento gerado com FPDF');
	$PDF -> AddPage();
	$PDF -> Image("logo_simples.jpg",92.5,5,25,20,"jpeg");
	$PDF -> SetFont('Arial', '', 12);
	$PDF -> Cell(0,5,"NCTEC - Novo Centro Técnico de Formação em Segurança",0,1,"C");
	$PDF -> Cell(0,1,"","B",1);
	$PDF -> setY(60);
	$PDF -> SetFont('Arial', "B", 14);
	$PDF -> Cell(0,5,"D E C L A R A ÇÃ O    P R O V I S ÓR I A",0,1,"C");
	$PDF -> sety(80);
	$PDF -> SetFont('Arial', '', 12);
	$texto = "             Declaramos para os devidos fins que no periodo de $inicio até $conclusao o Sr. ".
		  "$nome Incrito no CPF/MF sob o n° $cpf , concluiu com aprovação neste Centro de Formação de profissionais de segurança o curso de ".
		  "$curso, junto a turma $turma , estando o seu certificado em fase de registro na Comissão de Vistoria do Departamento".
		  " de Policia Federal.";
	$PDF -> ln();
	$texto4 = "             A presente declaração atesta que o aluno realizou o referido curso e que seu processo ainda encontra-se em tramite junto ao ".
		  "orgão regulador, o qual possui poderes legais para indeferir o processo.";
	$PDF -> MultiCell(0,10,$texto, 0, 'J');
	$PDF -> ln();
	$PDF -> MultiCell(0,10,$texto4, 0, 'J');
	$PDF -> ln();
	$PDF -> cell(0,5,"Registro: $registro ",0,1,'l');
	$PDF -> ln();
	$PDF -> cell(0,5,"Protocolo da comunicação previa VIA GESP n° - $protocolo  em: $dtprotocolo ",0,1,'l');
	//$PDF -> cell(0,5,"Dispensado o numero de protocolo temporariamente - processo informado via GESP ",0,1,'l');
	$PDF -> ln();
	$PDF -> cell(0,3,"Validade para esta declaração provisória são de 30 dias à partir da data de emissão",0,1,'l');
	$PDF -> Image("ass.jpg",92,220,60,30,"jpeg");
	$PDF -> sety(254);
	$texto2 ="Codigo de Segurança da Declaraçãoo: $declaracao         Emitida em: " . date("d/m/Y"). " às " .date("h:m").
	"           A verificação da autenticidade desta declaraçãoo pode ser feita através desde código acima acessando o endereço www.nctecbrasilcursos.com.br no menu consultar processo.";
	$PDF -> SetFont('Arial', 'I', 10);
	$PDF -> MultiCell(0,5,$texto2, 1, 'J');
	$PDF -> sety(271);
	$PDF -> SetFont('Arial', "I", 10);
	$PDF -> cell(0,5,"Rua Dr. Alfredo Barcelos, 720 - Olaria - CEP 21.060-690 - Fone: (21) 2209-9650 whatsapp 21 98490-1736","T",1,'C');
	$PDF->Output("$nome.pdf",'D');
	}
?>
