// JavaScript Document
function formatadata(campo, e , novocampo)
{
      	
    myVal = campo.value;
    if (myVal.length > 2 && !myVal.match(/\//))
    {
      myVal = '';
    }
    else
    {
        if (window.event)
        {
           keycode = window.event.keyCode;
        }
        else if (e)
        {
            keycode = e.which;
        }
        if (keycode < 48 || keycode > 57)
        {
			if(keycode != 9 && keycode != 13 )
				{
           			myVal = myVal.substr(0, (myVal.length - 1));
        		}	
		}
        if (myVal.length == 2 || myVal.length == 5)
        {
            myVal += '/';
        }
    }
    campo.value = myVal;
 }
function cpf(v){
var valcpf = v.value;
    valcpf=valcpf.replace(/\D/g,"")                    //Remove tudo o que n�o � d�gito
    valcpf=valcpf.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto d�gitos
    valcpf=valcpf.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto d�gitos
                                             //de novo (para o segundo bloco de n�meros)
    valcpf=valcpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um h�fen entre o terceiro e o quarto d�gitos
    v.value = valcpf
}