<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php require_once("php7_mysql_shim.php"); require_once("php7_mysql_shim.php"); 
require_once("conectadb.php"); 
						
						$consulta = mysql_query("SELECT distinct Estado FROM tbmunicipios ORDER BY Estado ASC") or die( mysql_error());

?>
<html>

<head>

<title>NCTEC - Novo Centro T&eacute;cnico de Forma&ccedil;&atilde;o em Seguran&ccedil;a Ltda</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link rel="stylesheet" href="configindex.css" type="text/css">

<link rel="stylesheet" type="text/css" href="menu.css">

<script type="text/javascript" src="menu_corrige.js"></script>
<script type="text/javascript" src="validar.js"></script>
<script type="text/javascript" src="formatar_mascaras.js"></script>
<script type="text/javascript" src="select_lista.js"></script>
<!-- saved from url=(0013)about:internet -->
<style type="text/css">
*{
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px!important;}
li {
	list-style-image: url(imagens/miniseta.gif);
}
#mensagem1{
	position: relative;
	width: 749px;
	background-color: #E6E6E6;
	font-family: Arial;
	font-size: 9px;
	text-align: justify;
}
#quemsomos_esquerda{
	position: relative;
	float: none;
	left: 0px;
}
label{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	position: absolute;
	width: 150px;
	left: 2px;
}
input {
	font-family: "Courier New", Courier, mono;
	font-size: 12px;
	position: absolute;
	left: 150px;
	vertical-align: middle;
	height: 14pt;
}
select {
	font-family: "Courier New", Courier, mono;
	font-size: 12px;
	position: absolute;
	left: 150px;
	vertical-align: middle;
	height: 14pt;
}
textarea{
	font-family: "Courier New", Courier, mono;
	font-size: 12px;
	position: absolute;
	left: 150px;
	vertical-align: middle;
	height: 150px;
	width: 400px;
}
.inputextarea{
	position: relative;
	height: 152px;
	width: 749px;
	left: 0px;
	top: 5;
	margin: 5px;
	vertical-align: middle;
}
</style>

<style type="text/css">
<!--
.inputseparador {
	position: relative;
	height: 20;
	width: 746px;
	left: 2px;
	top: 2px;
	margin: 5px;
	vertical-align: middle;
}
.dicas{
	position: relative;
	font-family: Arial;
	font-size: 9px;
	font-style: italic;
	width: 237px;
	height: 12px;
	left: 1px;
}
-->
</style>
</head>
<body leftmargin="0" topmargin="0"  onLoad="document.formcadastrovagas.reset();">
<div align="center">
<div id="corpo">
	<div id="fundotopo"></div>
	<div id="menu"><script type="text/javascript" src="menu.js"></script></div>
	<div id="barraauxiliar">
	</div>
	<div class="TituloPagina">Cadastro de candidatos</div>
	<div >
	<div id="mensagem1">
		<p><img src="imagens/miniseta.gif">A NCTEC não é agencia de empregos ou recrutamento
		  e seleção, sendo que possuimos várias empresas conveniadas que em muitas
		  das vezes solicitam candidatos,	desta &nbsp;&nbsp;&nbsp;&nbsp;forma, decidimos
		  disponiblizar este cadastramento afim de ajudar o processo de sele&ccedil;&atilde;o
		  das empresas e da busca de emprego por parte dos candidatos.</p>	
		
		<p><img src="imagens/miniseta.gif">O ideal é sempre manter um telefone de bom contato</p>
		<p><img src="imagens/miniseta.gif">Preencha com sinceridade o formulário abaixo:</p>
	
	</div>
	<form action="cadastrovagasok.php" method="post" name="formcadastrovagas">
			<br>
			<div class="inputseparador">
				<label>Nome:</label>
				<input id="nome" name="nome" type="text" size="50" maxlength="100">
				<div style="	position: absolute;font-family: Arial;font-size: 9px;
					font-style: italic;
					left: 510px;">Campo obrigatório
				</div>
			</div>
			<div class="inputseparador">
				<label>CPF:</label>
				<input id="cpf" name="cpf" type="text" size="20" maxlength="100" onblur="Verifica_CPF(this);">
				<div style="	position: absolute;font-family: Arial;font-size: 9px;
					font-style: italic;
					left: 310px;">Campo obrigatório</div>
	    	</div>
			
			<div class="inputseparador">
				<label>Endereço:</label>
				<input id="end" name="endereco" type="text" size="50" maxlength="100">
                <div style="	position: absolute;font-family: Arial;font-size: 9px;
				font-style: italic;
				left:510px;">Campo obrigatório</div>
			</div>
			
			<div class="inputseparador">
				<label>Bairro:</label>
				<input id = "bairro"name="bairro" type="text" size="50" maxlength="100">
				<div style="	position: absolute;font-family: Arial;font-size: 9px;
				font-style: italic;
				left:510px;">Campo obrigatório</div>
			</div>
			

			<div class="inputseparador">
				<label>UF:</label>
				<select id="uf" name="uf" onChange="pesquisar_dados( this.value );">
					<option value=""></option>
					<? 
					while( $row = mysql_fetch_assoc($consulta) )
								{
								echo "<option value=\"{$row['Estado']}\">{$row['Estado']}</option>\n";
								}
					?>
				</select>
			</div>
			
				<div class="inputseparador">
					<label>Cidade:</label>
					<select id="cidade" name = "cidade">
					</select>
								
				<div style="	position: absolute;font-family: Arial;font-size: 9px;
					font-style: italic;
					left:510px;">Campo obrigatório
				</div>
			</div>
		
		
		
		
			
			<div class="inputseparador">
				<label>CEP:</label>
				<input name="cep" type="text" size="20" maxlength="100">
			</div>
			
			<div class="inputseparador">
				<label>Telefone Próprio:</label>
				<input id="tel1" name="tel1" type="text" size="20" maxlength="100">
				<div style="	position: absolute;font-family: Arial;font-size: 9px;
				font-style: italic;
				left:310px;">Campo obrigatório</div>
			</div>
			
			<div class="inputseparador">
				<label>Telefone Celular:</label>
				<input name="celular" type="text" size="20" maxlength="100">
			</div>
			
			<div class="inputseparador">
				<label>Telefone Contato:</label>
				<input name="tel2" type="text" size="20" maxlength="100">
			</div>
			
			<div class="inputseparador">
				<label>Contato:</label>
				<input name="contato" type="text" size="30" maxlength="100">
			</div>
			<div class="inputseparador">
				<label>Email:</label>
				<input name="email" type="text" size="20" maxlength="100">
			</div>
			
			<div class="inputseparador">
				<label>Data de Nascimento:</label>
				<input id = "dnasc" name="dtnascimento" type="text" size="20" maxlength="100" onkeypress="formatadata(this, event);" onBlur="ValidaData(this);">
				<div style="	position: absolute;font-family: Arial;font-size: 9px;
				font-style: italic;
				left:310px;">Campo obrigatório</div>
			</div>
			
			<div class="inputseparador">
				<label>Altura:</label>
				<input name="altura" type="text" size="10" maxlength="100">
			</div>
			<div class="inputseparador">
				<label>Sexo</label>
				<select name="sexo">
					<option value="Masculino">Masculino</option>
					<option value="Feminino">Feminino</option>
				</select>
			</div>
			<div class="inputseparador">
				<label>1º Cargo pretendido</label>
				<select name="cargo1">
					<option value=""></option>
					<option value="Vigilante">Vigilante Patrimonial</option>
					<option value="SPP">Segurança Pessoal Privada</option>
					<option value="Escolta">Escolta Armada</option>
					<option value="ETV">Transporte de Valores</option>
					<option value="Guardete">Guardete</option>
					<option value="Supervisor">Supervisor</option>
				</select> 
				<div style="position: absolute; font-family: Arial; font-size: 9px; font-style: italic; left:360;">Coloque aqui, a 1º opção do cargo pretendido</div>
			</div>
			<div class="inputseparador">
				<label>2º Cargo pretendido</label>
				<select name="cargo2">
					<option value=""></option>
					<option value="Vigilante">Vigilante Patrimonial</option>
					<option value="SPP">Segurança Pessoal Privada</option>
					<option value="Escolta">Escolta Armada</option>
					<option value="ETV">Transporte de Valores</option>
					<option value="Guardete">Guardete</option>
					<option value="Supervisor">Supervisor</option>
				</select> 
				<div style="position: absolute; font-family: Arial; font-size: 9px; font-style: italic; left:360;">Coloque aqui, a 2º opção do cargo pretendido</div>
			</div>
			<div class="inputseparador">
				<label>3º Cargo pretendido</label>
				<select name="cargo3">
					<option value=""></option>
					<option value="Vigilante">Vigilante Patrimonial</option>
					<option value="SPP">Segurança Pessoal Privada</option>
					<option value="Escolta">Escolta Armada</option>
					<option value="ETV">Transporte de Valores</option>
					<option value="Guardete">Guardete</option>
					<option value="Supervisor">Supervisor</option>
				</select> 
				<div style="position: absolute; font-family: Arial; font-size: 9px; font-style: italic; left:360;">Coloque aqui, a 3º opção do cargo pretendido</div>
			</div>
			<div class="inputseparador">
				<label>4º Cargo pretendido</label>
				<select name="cargo4">
					<option value=""></option>
					<option value="Vigilante">Vigilante Patrimonial</option>
					<option value="SPP">Segurança Pessoal Privada</option>
					<option value="Escolta">Escolta Armada</option>
					<option value="ETV">Transporte de Valores</option>
					<option value="Guardete">Guardete</option>
					<option value="Supervisor">Supervisor</option>
				</select> 
				<div style="position: absolute; font-family: Arial; font-size: 9px; font-style: italic; left:360;">Coloque aqui, a 4º opção do cargo pretendido</div>
			</div>
			<div class="inputseparador">
				<label>Ultimo Emprego</label>
				<input name="ultimoemprego" type="text" size="50">
			</div>
			<div class="inputseparador">
			<label>Cart. de habilitação:</label>
			<div class="inputseparador">
				<select name="cnh">
					<option value="n">Não</option> 
					<option value="a">Sim - Cat. A</option>
					<option value="b">Sim - Cat. B</option>
					<option value="c">Sim - Cat. C</option>
					<option value="d">Sim - Cat. D</option>
					<option value="e">Sim - Cat. E</option>
					<option value="ab">Sim - Cat. AB</option>
					<option value="ad">Sim - Cat. AD</option>
				</SELECT>
			</div>
			<div class="inputextarea">
				<label>Habilidades</label>
				<textarea name="habilidades">
				</textarea>
				<div style="position: absolute; font-family: Arial; font-size: 9px; font-style: italic; left:570px; width: 137px; height: 53px;">
				  <p>Descreva aqui as habilidades, as experiências, cursos e etc...</p>
				  <p>&nbsp;</p>
				  <p>Descreva se possui habilita&ccedil;&otilde;es especiais, tais como condutor de c&atilde;es,
				    idiomas, artes marciais, etc..</p>
				</div>
		</div>
			<br>
			<div class="inputseparador">
				<input name="enviar" type="button" value="Enviar ficha" size="50" onClick="validarformvagas(this.form);">
		</div>
	</form>
  </div>
	
</div>

<div>
</div>



</div>

</body>

</html>

