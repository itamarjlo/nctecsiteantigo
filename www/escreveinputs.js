// JavaScript Document

function formatar(valor){
	if (valor < 10){
		return("0" + valor)
	}else{
		return(valor)

	} 
}
function configtr(indice){
	if ((indice % 2) != 0 ){
		return('trimpar')
	}else{
		return('trpar')
	}

}

for (i = 1; i<= 23; i++){
		document.write('<tr class=' + configtr(i)+'>');
		document.write('<td><label>' + formatar(i)+ '</label></td>');
		document.write('<td><input class ="inputborda" id="nome'+i+'" name="nome['+i+']" type="text" size="30" maxlength="50" ></td>');
        document.write('<td><input class ="inputborda"id="cpf'+i+'" name="cpf['+i+']" type="text" size="10" maxlength="11" onblur="Verifica_CPF(this);"></td>');
		document.write('<td><input class ="inputborda"id="matricula'+i+'" name="matricula['+i+']" type="text" size="9" maxlength="9"></td>');
		document.write('<td><input class ="inputborda"id="dia1'+i+'" name="dia1['+i+']" type="text" size="10" maxlength="10" onkeypress="formatadata(this, event)" onblur="ValidaData(this)"></td>');
		document.write('<td><input class ="inputborda" id="dia2'+i+'" name="dia2['+i+']" type="text" size="10" maxlength="10" onkeypress="formatadata(this, event)"  onblur="ValidaData(this)"></td>');
		document.write('<td><input class ="inputborda" id="dia3'+i+'" name="dia3['+i+']" type="text" size="10" maxlength="10" onkeypress="formatadata(this, event)" onblur="ValidaData(this)"></td>');
		document.write('<td><input class ="inputborda" id="dia4'+i+'" name="dia4['+i+']" type="text" size="10" maxlength="10" onkeypress="formatadata(this, event)" onblur="ValidaData(this)"></td>');
		document.write('<td><input class ="inputborda" id="dia5'+i+'" name="dia5['+i+']" type="text" size="10" maxlength="10" onkeypress="formatadata(this, event)" onblur="ValidaData(this)"></td>');
		document.write('<td><select class ="inputborda" name="curso['+i+']" size="1" id="curso'+i+'" onClick="clareia('+i+');">');
				document.write('<option value="nulo">Selecione o curso</option>');
				document.write('<option value="002Reciclagem de Vigilante">Reciclagem Patrimonial</option>');
				document.write('<option value="003Extensão em Seg. Pessoal Privada">Ext. Seg. Pessoal Privada</option>');
				document.write('<option value="009Reciclagem de SPP">Rec. Seg. Pessoal Privada</option>');
				document.write('<option value="007Curso de Extensão em Transporte de Valores">Ext. Transporte de Valores</option>');
				document.write('<option value="008Reciclagem em Transporte de Valores">Rec. de Transporte de Valores</option>');
				document.write('<option value="025Curso de Extensão em Escolta Armada">Ext. Escolta Armada</option>');
				document.write('<option value="027Curso de Reciclagem em Escolta Armada">Rec. Escolta Armada</option>');
				document.write('<option value="015Supervisor de Segurança">Supervisor</option>');
				document.write('<option value="001Curso Básico de Formação em Vigilante">Formação de Vigilante</option>');
				document.write('<option value="200Curso de Monitoramento Eletrônico e CFTV">Monitoramento e CFTV</option>');
		document.write('</select></td>');
		document.write('<td><input id="escala'+i+'" name="escala['+i+']"  type="hidden"></td>');
		document.write('</tr>');
		
	
}
