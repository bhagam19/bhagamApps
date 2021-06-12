function prueba(){
alert('Funciona!');
}

function popup(url,ancho,alto) {
var posicion_x; 
var posicion_y; 
posicion_x=(screen.width/2)-(ancho/2); 
posicion_y=(screen.height/2)-(alto/2); 
window.open(url,"asdf","width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
}

function cerrarVentana() { 
window.close();
}

function validarPassword(){
	pwrd1=document.getElementById('contrasenaInput').value;
	pwrd2=document.getElementById('contrasena2Input').value;
	if(pwrd1!=pwrd2){
		alert('Las contraseñas no coinciden');
		document.getElementById('contrasenaInput').value="";
		document.getElementById('contrasena2Input').value="";
		document.getElementById('contrasenaInput').focus();	
		return 0;	
	}		
}

/*
var materias_0-Computadoras, información y generales=new Array(" ","010 Bibliografía","020 Bibliotecología e informática","030 Enciclopedias generales","040 Este número no tiene ningún uso.","050 Publicaciones en serie","060 Organizaciones y museografía","070 Periodismo, editoriales, diarios","080 Colecciones generales","090 Manuscritos y libros raros");
function cambiarMateria(){
alert('va a cambiar');
var pais;
pais = document.formularioNuevoLibro.areaConocimiento[document.formularioNuevoLibro.areaConocimiento.selectedIndex].value;
if(pais!=""){
	materias=eval("materias_"+pais);
	numMaterias=materias.length;
	document.formularioNuevoLibro.materia.length=numMaterias;
	
	for(i=0;i<numMaterias;i++){
		document.formularioNuevoLibro.materia.options[i].value=materias[i];
		document.formularioNuevoLibro.materia.options[i].text=materias[i];
	}
}else{
	document.formularioNuevoLibro.materia.length=1
	document.formularioNuevoLibro.materia.options[i].value="v";
	document.formularioNuevoLibro.materia.options[i].text="v";
}
document.formularioNuevoLibro.materia.options[0].selected=true;
}

*/