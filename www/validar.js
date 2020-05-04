// JavaScript Document
function Verifica_CPF(campocpf) {
var CPF = campocpf.value; // Recebe o valor digitado no campo

// Verifica se o campo � nulo
if (CPF == '' ){
	  return false;
   }
if (CPF == '99999999999' || CPF == '55555555555' || CPF == '00000000000' ){
      alert('CPF inv�lido');
      campocpf.value = '';
	  return false;
   }


// Aqui come�a a checagem do CPF
var POSICAO, I, SOMA, DV, DV_INFORMADO;
var DIGITO = new Array(10);
DV_INFORMADO = CPF.substr(9, 2); // Retira os dois �ltimos d�gitos do n�mero informado

// Desemembra o n�mero do CPF na array DIGITO
for (I=0; I<=8; I++) {
  DIGITO[I] = CPF.substr( I, 1);
}

// Calcula o valor do 10� d�gito da verifica��o
POSICAO = 10;
SOMA = 0;
   for (I=0; I<=8; I++) {
      SOMA = SOMA + DIGITO[I] * POSICAO;
      POSICAO = POSICAO - 1;
   }
DIGITO[9] = SOMA % 11;
   if (DIGITO[9] < 2) {
        DIGITO[9] = 0;
}
   else{
       DIGITO[9] = 11 - DIGITO[9];
}

// Calcula o valor do 11� d�gito da verifica��o
POSICAO = 11;
SOMA = 0;
   for (I=0; I<=9; I++) {
      SOMA = SOMA + DIGITO[I] * POSICAO;
      POSICAO = POSICAO - 1;
   }
DIGITO[10] = SOMA % 11;
   if (DIGITO[10] < 2) {
        DIGITO[10] = 0;
   }
   else {
        DIGITO[10] = 11 - DIGITO[10];
   }

// Verifica se os valores dos d�gitos verificadores conferem
DV = DIGITO[9] * 10 + DIGITO[10];
   if (DV != DV_INFORMADO) {
      alert('CPF inv�lido');
      campocpf.value = '';
      
      return false;
   }
}

function validaform(f){
var libera;
libera = 0;	
	for (i = 1;i <= 23;i++){
		if(document.getElementById('nome'+i).value != ""){
			if(document.getElementById('curso'+i).value == 'nulo'){
					alert('Obrigatório selecionar o curso');
					document.getElementById('curso'+i).style.backgroundColor='yellow';
					return false;
			}
			if(document.getElementById('dia1'+i).value==""){
					alert('Obrigatório inserir o 1º dia');
					document.getElementById('dia1'+i).focus();
					return false;
			}
			if(document.getElementById('cpf'+i).value==""){
					alert('Obrigatório inserir o CPF para um melhor controle');
					document.getElementById('cpf'+i).focus();
					return false;
			}
			
		}
		
			//alert(i);
			libera++;
			data1 = document.getElementById('dia1'+i).value;
			data2 = document.getElementById('dia2'+i).value;
			curso2 = document.getElementById('curso'+i).value;
			dt1 = new Date(data1.substr(6,4),data1.substr(3,2)-1,data1.substr(0,2));
			dt2 = new Date(data2.substr(6,4),data2.substr(3,2)-1,data2.substr(0,2));
			semana1 = dt1.getDay(); //aqui pega o primeiro dia da semana
			semana2 = dt2.getDay(); //aqui pega o segundo dia da semana
			if (curso2 == '002Reciclagem de Vigilante'){
				switch(semana1){
					case 1:
						if (semana2 == 2){
							document.getElementById("escala"+i).value = '04 - TURMA D - Segunda/Terça/Quarta/Quinta/Sexta';
							}else if (semana2 == 3){
							document.getElementById("escala"+i).value = '02 - TURMA B - Segunda/Quarta/Sexta/Domingo/Terça';							
							}
						break;
					case 2:
						document.getElementById("escala"+i).value = '01 - TURMA A - Terça/Quinta/Sabado/Segunda/Quarta';				
						break;	
					case 6:
						document.getElementById("escala"+i).value = '03 - TURMA C - Sabado/Domingo/Sabado/Domingo/Sabado';
						break;
					case 3:
						document.getElementById("escala"+i).value = '10 - TURMA J - Quarta/Quinta/Sexta/Sabado/Domingo';
						break;
					default:

				} //fim swicth
			} else if (curso2.substr(0,3) == '003' || curso2.substr(0,3) == '009' || curso2.substr(0,3) == '007' || curso2.substr(0,3) == '008' ||curso2.substr(0,3) == '025' || curso2.substr(0,3) == '202' || curso2.substr(0,3) == '027'){
					document.getElementById("escala1").value = '06 - TURMA H - Extensivos';
					
					
			}//fim if
	
	}//fim for
	
	if (libera == 23){
	f.submit();
	} //fim if libera
}

function validarformvagas(f){
if(document.getElementById('nome').value == "" ){
	alert('Obrigat�rio inserir o NOME');
	document.getElementById('nome').focus();
	return false;
}
if (document.getElementById('cpf').value == "" ) {
	alert('Obrigat�rio inserir o CPF');
	document.getElementById('cpf').focus;
	return false;
}

if (document.getElementById('end').value == "" ) {
	alert('Obrigat�rio inserir o ENDERE�O');
	document.getElementById('end').focus;
	return false;
}
if (document.getElementById('bairro').value == "") {
	alert('Obrigat�rio inserir o BAIRRO');
	document.getElementById('bairro').focus;
	return false;
}
if (document.getElementById('cidade').value == "") {

	alert('Obrigat�rio inserir a CIDADE');
	document.getElementById('cidade').focus;
	return false;
}
if (document.getElementById('tel1').value =="" ) {
	alert('Obrigat�rio inserir pelo menos (1) um TELEFONE');
	document.getElementById('tel1').focus;
	return false;
}
if (document.getElementById('dnasc').value =="" ) {
	alert('Obrigat�rio inserir a DATA DE NASCIMENTO');
	document.getElementById('dnasc').focus;
	return false;
}
f.submit();
}




function clareia(ind){
	document.getElementById('curso'+ind).style.backgroundColor = 'white';
}


function ValidaData(valor){
var verifica;
vardata = valor.value;
if (vardata==''){
return false;
}
tam = valor.value.length;
if (tam == 10) {
  dia = vardata.substring(0,2);
  sep1 = vardata.substring(2,3);
  mes = vardata.substring(3,5);
  sep2 = vardata.substring(5,6);
  ano = vardata.substring(6,10);

// tam = Len(vardata)
  erro = 'Ocorreu o seguinte erro na Data:\n '
  if (tam==8) {
  valor.focus();
  alert('Preencha a Data corratemente\n [ DD/MM/AAAA ]');
  } else {
  if (mes > 12){
    erro = erro + '- M�s Inv�lido';
    verifica = 'false';
  } 

  if (mes==01||mes==03||mes==05||mes==07||mes==08||mes==10||mes==12){
    if (dia > 31) {
    erro = erro + '- Dia Inv�lido para o respectivo m�s';
    verifica = 'false';
    }
  } else if (mes== 04 || mes==06 || mes==10 || mes==11){
    if (dia > 30){
    erro = erro + '- Dia Inv�lido para o respectivo m�s';
    verifica = 'false';
    }
  } else if (mes==02) {
	if (ano == 2016 || ano == 2020 || ano  == 2024 || ano == 2028){
	 	if (dia > 29) {
			erro = erro + '\n Este m�s n�o possui este dia !!!';
    		verifica = 'false';
		}
    }else if (dia > 28){
			erro = erro + '\n Este m�s n�o possui este dia !!!';
    		verifica = 'false';
	
		}
	
  	}
  }
  if(verifica == 'false'){
  erro = erro + '\n Preencha novamente';
  alert(erro);
  valor.focus();
  }
} else {
    alert("Por favor,\n Preencha a data corretamente.");
	valor.focus();
}
}

function validaconsulta(val1 , val2, f){
if(val1.value == "" || val2.value == 'nulo' ){
	alert('Obrigat�rio selecionar as duas op��es');
	val1.focus();
	return false;
	}
	f.submit();
}
function validarconsultaprocesso(f){
var val_cpf;
val_cpf = document.getElementById('cpf').value;

if(val_cpf=='' ){
	alert ('Digite o CPF');
	document.getElementById('cpf').focus();
	return false;
	}else{
	f.submit();
	}
}
function validarconsultaautentica(f){
var val_codigo;
val_codigo = document.getElementById('codigo').value;

if(val_codigo=='' ){
	alert ('Digite o c�digo');
	document.getElementById('codigo').focus();
	return false;
	}else{
	f.submit();
	}
}
function validarconsultarfrequencia(f){
var data_1;
var data_2;
data_1 = document.getElementById('data1').value;
data_2 = document.getElementById('data2').value;
if (data_1 == ''){
	alert ('Obrigatorio preencher o inicio do periodo!');
	document.getElementById('data1').focus();
	return false;
}
if (data_2 == ''){
	alert ('Obrigatorio preencher o inicio do periodo!');
	document.getElementById('data2').focus();
	return false;
}


/*if (data_1 > data_2) {
	alert('A data inicial n�o pode ser maior que a final');
	document.getElementById('data1').focus();
	return false;
	}else{
	f.submit();
	}
}*/
f.submit();
}
function validaralteralogin(f){
var varlogin;
var varpwd;
varlogin = document.getElementById('login1').value;
varpwd = document.getElementById('pwd1').value;
if (varlogin == ''){
	alert('N�o e permitido login em branco!');
	document.getElementById('login1').focus();
	return false;
}
if (varpwd == ''){
	alert('N�o e permitido senha em branco!');
	document.getElementById('pwd1').focus();
	return false;
}
f.submit()
}
function limparform(f){
document.getElementsByName(f).reset()
}
