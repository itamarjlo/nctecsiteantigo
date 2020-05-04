// JavaScript Document

function pesquisar_dados( valor )
{
	campo_select = document.forms[0].cidade;
	campo_select.options.length = 0;
  http.open("GET", "consultar_lista.php?id=" + valor, true);
  http.onreadystatechange = handleHttpResponse;
  http.send(null);
}

function handleHttpResponse()
{
  campo_select = document.forms[0].cidade;
  if (http.readyState == 4) {
    campo_select.options.length = 0;
    results = http.responseText.split(",");
    for( i = 0; i < results.length; i++ )
    { 
      string = results[i].split( "|" );
	  //string = results[i];
      campo_select.options[i] = new Option( string[0], string[1] );
	  
	  //campo_select.options[i] = new Option(string)
    }
  }
}

function getHTTPObject() {
  var xmlhttp;
  /*@cc_on
  @if (@_jscript_version >= 5)
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {
        xmlhttp = false;
      }
    }
  @else
  xmlhttp = false;
  @end @*/
  if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
    try {
      xmlhttp = new XMLHttpRequest();
    } catch (e) {
      xmlhttp = false;
    }
  }
  return xmlhttp;
}
var http = getHTTPObject();
