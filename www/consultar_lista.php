<?php require_once("php7_mysql_shim.php"); require_once("php7_mysql_shim.php");
require("conectadb.php");
$categoria = addslashes($_GET["id"]); // pegamos o id passado pelo select
$consulta = mysql_query("SELECT Municipio,Cod,Estado from tbmunicipios where Estado ='$categoria'"); // selecionamos todas as subcategorias que pertencem à categoria selecionada
while( $row = mysql_fetch_assoc($consulta) )
{
  echo $row["Municipio"] . "|" . $row["Municipio"] . ","; // apresentamos cada subcategoria dessa forma "NOME|CODIGO,NOME|CODIGO,NOME|CODIGO,...", exatamente da maneira que iremos tratar no JavaScript
  //echo $row["Municipio"] . ","; // apresentamos cada subcategoria dessa forma "NOME|CODIGO,NOME|CODIGO,NOME|CODIGO,...", exatamente da maneira que iremos tratar no JavaScript

}
?>