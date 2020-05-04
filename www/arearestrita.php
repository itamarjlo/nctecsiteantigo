<?php
/* AreaRestrita.php */
require("restritos.php");

?>
<p> Página de acesso Registro. Bem vindo <b><? echo $login; ?></b>! <a href="logout.php">logout</a></p> <br>
<p> Identificação de acesso: <? echo $_SESSION['MeuLogin']['chave']?></p>