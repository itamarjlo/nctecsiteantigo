// JavaScript Document
var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
function confirma(){
if (document.form.nome.value == ""){
alert("Por Favor, digite seu nome !");
document.form.nome.focus();
ok = false;
return(false);
}
if(document.form.ref.value == ""){
alert("Por Favor, digite o assunto");
document.form.nome.focus();
ok = false;
return(false);
}
if (document.form.email.value == ""){
alert("Por favor, digite o E-mail");
document.form.nome.focus();
ok = false;
return(false);
}
if(document.form.email.value != ""){
 var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
 var resultado = emailfilter.test(document.form.email.value);
 if (resultado == false){
 alert("Digite o seu endereço de e-mail corretamente");
 document.form.email.focus();
 ok = false;
 return(false);
 }
}
if (document.form.texto.value == ""){
alert("Por favor, digite o Texto");
document.form.texto.focus();
ok = false;
return(false);
}

document.form.submit();

}