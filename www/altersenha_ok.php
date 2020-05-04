<?php require_once("php7_mysql_shim.php"); require_once("php7_mysql_shim.php");
require_once("conectadb.php");
require("restritos.php");
$novasenha = $_POST['novasenha'];
$usuario = $_SESSION['MeuLogin']['login'];
if(!empty($novasenha) || !empty($usuario)){
	//echo "valor ". $usuario ;
	
	$atualizar = mysql_query("update tblogin set senha='$novasenha' WHERE login = '$usuario'") or		
							die("Não foi possivel atualizar");
	echo "Senha Atualizada com sucesso !!!";

}


?>