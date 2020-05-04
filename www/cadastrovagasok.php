<?php require_once("php7_mysql_shim.php"); require_once("php7_mysql_shim.php");

require("conectadb.php");

?>
<html>
<head>
<title>NCTEC - Cadastro de Candidatos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="configindex.css" type="text/css">

<link rel="stylesheet" type="text/css" href="menu.css">



<script type="text/javascript" src="menu_corrige.js"></script>

<!-- saved from url=(0013)about:internet -->

<style type="text/css">
#mensagem1{
	position: relative;
	width: 749px;
	height: 20px;
	text-align: center;
	left: 0px;
	top: 50px;
	font-family: Arial, Helvetica, sans-serif;
	background-color: #98D7EB;
	font-size: 14px;
}
#mensagem2{
	position: relative;
	height: 20px;
	width: 749px;
	left: 0px;
	top: 55px;
	background-color: #CCCCCC;
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
	font-size: 14px;
}

*{
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px!important;}
-->
</style>
</head>
<body>
<?
function formatadata($data){
					$entrada = trim($data);
					if (strstr($entrada, "/")){
							$aux2 = explode ("/", $entrada);
							$data2 = $aux2[2] . "-". $aux2[1] . "-" . $aux2[0];
							return $data2;
					}
		}
$nome=$_POST['nome'];
$cpf=$_POST['cpf'];	
$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$uf=$_POST['uf'];
$cep=$_POST['cep'];
$tel1=$_POST['tel1'];
$tel2=$_POST['tel2'];
$contato=$_POST['contato'];
$celular=$_POST['celular'];
$email=$_POST['email'];
$dtcadastro=formatadata(date("d/m/y"));
$dtnascimento = formatadata($_POST['dtnascimento']);
$cargo1=$_POST['cargo1'];
$cargo2=$_POST['cargo2'];
$cargo3=$_POST['cargo3'];
$cargo4=$_POST['cargo4'];
$altura=$_POST['altura'];
$sexo=$_POST['sexo'];
$ultimoemprego=$_POST['ultimoemprego'];
$habilidades=$_POST['habilidades'];
$cnh=$_POST['cnh'];
$buscacpf = $cpf;
$sql_cpf = "select * from tbcpfcandidatos where cpf like '$buscacpf'";
$query_cpf = mysql_query("$sql_cpf")or die('Erro ao selecionar a tabela');
$total_cpf = mysql_num_rows($query_cpf);
if ($total_cpf == 0 ){
	$sqlinserir = "INSERT INTO tbcandidatos_site(nome,cpf,endereco,bairro,cidade,uf,cep,tel1,tel2,contato,celular,email,cargo1,cargo2,cargo3,cargo4,dtcadastro,dtnascimento,altura, sexo,ultimoemprego,habilidades,cnh)
								 values('$nome','$cpf','$endereco','$bairro','$cidade','$uf','$cep','$tel1','$tel2','$contato','$celular','$email','$cargo1','$cargo2','$cargo3','$cargo4','$dtcadastro','$dtnascimento','$altura','$sexo','$ultimoemprego','$habilidades','$cnh')";
	$sqltabelacpf = "INSERT INTO tbcpfcandidatos(cpf) values ('$buscacpf')";
	$sqlresultado = mysql_query($sqlinserir)or die(mysql_error()) ;
	$sqlresultadotbcpf = mysql_query($sqltabelacpf)or die(mysql_error()) ;
	$cadastro_ok = 1;
 }else{
 	$cadastro_ok = 0;
 }
?>
<div align="center">
<div id="corpo">

	<div id="fundotopo"></div>

	<div id="menu"><script type="text/javascript" src="menu.js"></script></div>

	<div id="barraauxiliar">
			<form id= "formlogin" action="/logar.php" method="post" name="logar">
	  		Usuário:<input name="login" type="text" size="11" maxlength="10">
			Senha:<input name="senha" type="password" size="8" maxlength="8">
			<input name="submit" type="submit" value="ok" class="submit">
            </form>	
	</div>
	<div id="mensagem1">
		<?
		if ($cadastro_ok == 0){
			print "O cadastro não pode ser realizado, o cpf : " . $cpf . " Já Existe em nossos cadastros de candidatos.";
			}else{
			print "Parabéns, a sua ficha de cadastro de candidatos foi enviado com sucesso. Pedimos que aguarde o contato.";
			}
		?>
		</div>
	<div id="mensagem2">
			"A NCTEC agradece e deseja boa sorte.";
	</div>
	<div style="position:relative; top: 80;width:749;text-align: center;font:arial;font-size: 10px;"><a href="index.php">Voltar a pagina inicial</a></div>


</div>
</div>
</body>
</html>
