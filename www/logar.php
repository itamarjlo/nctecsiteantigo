<?php 



require_once("conectadb.php");

session_start();
// pegando dados do formulario

$login = str_replace("'","",$_POST["login"]);
//echo $login
$senha = $_POST["senha"];
//$senha = md5($senha);
// verificado login no banco de dados
if ($login <> "" and $senha <> ""){
	$query = mysqli_query($conexao,"select * from tblogin where login = '$login' and senha = '$senha'");
	if (!$query) {
	die("Erro ao select da tabela login. T�cnico:" . mysqli_error());
	}	
	// verificando se encontrou registros do login e senha no banco de dados.
       
	if (mysqli_num_rows($query) > 0) {
		$dados = mysqli_fetch_array($query); // pegando dados do banco.
		$codlogin = $dados['codlogin'];
		$login = $dados["login"];
		$codempresa = $dados["cod_empresa"];
		$empresa = $dados["nome_empresa"];
		$chave = "1a2cf8gk68gj67gf784kh69fo6"; // chave secreca
		$ip = $_SERVER["REMOTE_ADDR"]; // ip do usuario
		$hora = time(); // pegado horario atual.
		$chave = md5($login . $chave . $ip . $hora);
		// registrando a session com um array com o codLogin, login e a chave.
		$_SESSION['MeuLogin'] = array("id" => $codlogin,"login" => $login,"chave" => $chave,"hora" => $hora, "codempresa" => $codempresa ,"empresa" => $empresa,"matricula" => '');
		// redirecionando para a pagina registrada.
		if ($codlogin <> 547){
			if ($dados['ativo'] == 1){
				header("location: servicosonline.php");
				}else{
				header("location: login.php?e=4");
				}
			}
			else
			{
			header("location: logmanutencao.php");
		}
		} 
	else {
		// redirecionando para o formulario de login com o erro.
		header("location: login.php?e=0");	
		}
	}
else{
	header("location: login.php?e=0");
	}	
?>