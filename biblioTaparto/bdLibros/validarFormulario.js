function validar(formulario) {
	var contador=0;
	var elementosSelect=new Array('coleccion','areaConocimiento','materia','especialidad','paisAutor','calidad');
	for(var i=0;i<elementosSelect.length;i++){
		var id1=elementosSelect[i];	
		if(formulario.name!="formularioActualizarLibro"){
            select(id1);
        }				
        var select = function (name1){
            var elemento1=document.getElementsByName(name1);
            var valida1=elemento1[0].selectedIndex!==0;
            if(!valida1){
                document.getElementById(name1).style.color='red';
                elemento1[0].style.color='red';
                contador++;
            }else{
                document.getElementById(name1).style.color='black';
                elemento1[0].style.color='black';
            }
        };
	}
	var elementosText=new Array('titulo','nombreAutor','apellidoAutor','numPaginas','cantEjemplares','ejemplar','yearPublicacion','volumen');
	for(var b=0;b<elementosText.length;b++){
		var id2=elementosText[b];	
		text(id2);		
		var text = function (name2){
			var elemento2=document.getElementsByName(name2);
			var valida2=elemento2[0].value!=="";			
			if(!valida2){
				document.getElementById(name2).style.color='red';
				contador++;
			}else{
				document.getElementById(name2).style.color='black';
			}
		};
	}	
	if(contador!==0){
		alert("Los campos en rojo están vacios.");
		return false;
	}	
}

/*
	patron =/[A-Za-z\s]/; //Se admiten letras mayúsculas A-Z, letras minúsculas a-z y el espacio \s
	patron =/[A-Za-zñÑ\s]/; // igual que el ejemplo, pero acepta también las letras ñ y Ñ
	patron = /\d/; // Solo acepta números
	patron = /\w/; // Acepta números y letras
	patron = /\D/; // No acepta números	
	patron = /[ajt69]/;  solo se acepte a, j, t, 6 y 9:
	
	patron =/[javierb]/; //  queremos aceptar cualquier caracter, menos alguno.
	te = String.fromCharCode(tecla); // 
	return !patron.test(te); // cambia un poco el código de la función que usamos para validar
	*/

function validarNumeros(e){
    var tecla = (document.all) ? e.keyCode : e.which; //Si el navegador es IE se asigna a la variable tecla el valor de e.keyCode, en caso contrario se asigna el valor de e.which.
    if (tecla==8) return true; // se comprueba si es la tecla pulsada es la tecla de retroceso y en ese caso la función termina (retorna). De esta forma se permite borrar caracteres.
    var patron =/\d/; // Solo acepta números
    var te = String.fromCharCode(tecla); 
    return patron.test(te);	
}

function validarTexto(e){
	var tecla = (document.all) ? e.keyCode : e.which; //Si el navegador es IE se asigna a la variable tecla el valor de e.keyCode, en caso contrario se asigna el valor de e.which.
	if (tecla==8) return true; // se comprueba si es la tecla pulsada es la tecla de retroceso y en ese caso la función termina (retorna). De esta forma se permite borrar caracteres.
	var patron =/[A-Za-zñÑ\s]/; // Solo acepta texto y ñ
    var te = String.fromCharCode(tecla); 
    return patron.test(te); 
}

function validarNombreApellido(formulario){	
    var elementos=document.getElementsByName(formulario.name);
	var elemento=elementos[0];
	var entrada=elemento.value;
	validarMayusculaInicial(formulario);
	ponerMayusculaDespuesEspacio(entrada);
}

function validarMayusculaInicial(formulario){
    var elementos=document.getElementsByName(formulario.name);
	var elemento=elementos[0];
	var entrada=elemento.value;
	borrarEspaciosInicio();
	function borrarEspaciosInicio(){
		var entradaSinEspacio="";
		while(entrada.charAt(0)==" "){
			entradaSinEspacio="";
			for(var l=1;l<entrada.length;l++){
				entradaSinEspacio=entradaSinEspacio+entrada.charAt(l);					
			}
			entrada=entradaSinEspacio;
		}
		elemento.value=entrada;	
	}
	ponerMayusculaIncial();
	function ponerMayusculaIncial(){
		var entradaInicialMayuscula="";
		for(var l=0;l<entrada.length;l++){
			if(l===0){
				var primeraLetra=entrada.charAt(l);
				entradaInicialMayuscula=primeraLetra.toUpperCase();
			}else{
			entradaInicialMayuscula=entradaInicialMayuscula+entrada.charAt(l);					
			}
		}
		entrada=entradaInicialMayuscula;
		elemento.value=entrada;	
	}
}

function ponerMayusculaDespuesEspacio(entrada){
    var string="";
	for(var i=0;i<entrada.length;i++){
		var letraActual=entrada.charAt(i);
// 		alert(letraActual);
		if(i!==0){
			if(entrada.charAt(i-1)==" "){
				var letra=entrada.charAt(i);
				var letraMayuscula=letra.toUpperCase();	
				string=string+letraMayuscula;	
			}else{
				string=string+entrada.charAt(i);
			}
		}else{
		string=string+entrada.charAt(i);
		}
	}
	entrada=string;
	elemento.value=entrada;	
}

function validarFormularioAltaUsuario(formulario) {
	var contador=0;
	var elementosText=new Array('usuario','contrasena','contrasena2','nombre','apellido','edad');
	for(var i=0;i<elementosText.length;i++){
		var id=elementosText[i];
		text(id);		
		var text = function (name){
			var elemento=document.getElementsByName(name);
			var valida=elemento[0].value!=="";			
			if(!valida){
				document.getElementById(name).style.color='red';
				contador++;					
			}else{
				document.getElementById(name).style.color='white';
			}
		};
	}	
	if(contador!==0){
		alert("Los campos en rojo están vacios.");
		return false;
	}	
}