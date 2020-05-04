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
    valcpf=valcpf.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    valcpf=valcpf.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    valcpf=valcpf.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    valcpf=valcpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    v.value = valcpf
}