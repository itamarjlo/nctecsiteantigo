<?php
/* AreaRestrita.php */
require("restritos.php");

?>
<p> P�gina de acesso Registro. Bem vindo <b><? echo $login; ?></b>! <a href="logout.php">logout</a></p> <br>
<p> Identifica��o de acesso: <? echo $_SESSION['MeuLogin']['chave']?></p>