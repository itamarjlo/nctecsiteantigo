// JavaScript Document
function abrirlistadoc(URL) {
  	var width = 354;
  	var height = 150;
	var left = 300;
  	var top = 300;
	window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

}
/*	function abre(){
	abrirlistadoc('popup_supervisor.htm');
	}*/
function IEHoverPseudo() {

   var navItems = document.getElementById("primary-nav").getElementsByTagName("li");
   
   for (var i=0; i<navItems.length; i++) {
      if(navItems[i].className == "menuparent") {
         navItems[i].onmouseover=function() { this.className += " over"; }
         navItems[i].onmouseout=function() { this.className = "menuparent"; }
      }
   }
//document.getElementById('pop').style.display='block';
abrirlistadoc('popup_supervisor.htm');
}

window.onload = IEHoverPseudo;
