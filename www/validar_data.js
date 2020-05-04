// JavaScript Document
function Verifica_CPF(campocpf) {
var CPF = campocpf.value; // Recebe o valor digitado no campo

// Verifica se o campo é nulo
if (CPF != '') {
	
  
  return false;
   }

// Aqui começa a checagem do CPF
var POSICAO, I, SOMA, DV, DV_INFORMADO;
var DIGITO = new Array(10);
DV_INFORMADO = CPF.substr(9, 2); // Retira os dois últimos dígitos do número informado

// Desemembra o número do CPF na array DIGITO
for (I=0; I<=8; I++) {
  DIGITO[I] = CPF.substr( I, 1);
}

// Calcula o valor do 10º dígito da verificação
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

// Calcula o valor do 11º dígito da verificação
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

// Verifica se os valores dos dígitos verificadores conferem
DV = DIGITO[9] * 10 + DIGITO[10];
   if (DV != DV_INFORMADO) {
      alert('CPF inválido');
      campocpf.value = '';
      
      return false;
   }
}

function validaform(){
	
	for (i = 1;i <= 23;i++){
	/*document.getElementById('curso'+i).style.backgroundColor = 'red';*/
		if(document.getElementById('nome'+i).value != ""){
			if(document.getElementById('cpf'+i).value =="" ){
				alert('insira o cpf');
				document.getElementById('cpf'+i).focus();
				/*document.getElementById('cpf'+i).style.backgroundColor = 'yellow';
				break;*/
			}else if(document.getElementById('curso'+i).value == 'nulo'){
					document.getElementById('curso'+i).style.backgroundColor='yellow';
					}
			
		}
	}
}

function clareia(ind){
	document.getElementById('curso'+ind).style.backgroundColor = 'white';
}


function ValidaData(valor){
var verifica;
vardata = valor.value;
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
    erro = erro + '- Mês Inválido';
    verifica = 'false';
  } 

  if (mes==01||mes==03||mes==05||mes==07||mes==08||mes==10||mes==12){
    if (dia > 31) {
    erro = erro + '- Dia Inválido para o respectivo mês';
    verifica = 'false';
    }
  } else if (mes== 04 || mes==06 || mes==10 || mes==11){
    if (dia > 30){
    erro = erro + '- Dia Inválido para o respectivo mês';
    verifica = 'false';
    }
  } else if (mes==02) {
    if (dia > 28) {
    erro = erro + '- Dia Inválido para o respectivo mês';
    verifica = 'false';
    }
  }
  }
  if(verifica == 'false'){
  erro = erro + '\nPreencha novamente';
  alert(erro);
  valor.focus();
  }
} else {
    alert("Por favor,\nPreencha a data corretamente,\nno formato (dd/mm/aaaa)");
}
}