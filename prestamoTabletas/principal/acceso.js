function mostrarFormularios(clase){ //mostrar formularios
	$('#separador').fadeIn('fast',function(){
		$(clase).animate({'top':'35%','margin-top':'-150px'},500);
	});
}//mostrar formularios
$(document).ready(function(){ //ocultar formularios
	$('.cerrar').click(function(){
		var elemento=$(this).parent().parent();		
		elemento.animate({'top':'-500px'},500,function(){
			$('#separador').fadeOut('fast');
		});
	});
});//ocultar formularios
$(document).ready(function() {//mover formularios
	$("#formulario").draggable({stack:"#formulario"}, {handle:"#handler"});
});//mover formularios
$(document).ready(function() {//mover formulario Mis Reservaciones
	$("#formulario1").draggable({stack:"#formulario"}, {handle:"#handler"});
});//mover formulario Mis Reservaciones
function registrarUsuario(id){ //id=1 representa que no hay formulario que ocultar. (e.g. formularioNuevoUsuario.php)
	var usuario= document.getElementById("usuario").value;
	var contrasena= document.getElementById("contrasena").value;
	var confirmarContrasena=document.getElementById("confirmarContrasena").value;
	var docente=document.getElementById("docente").value;
	if(usuario===""){
		alert("Por favor, ingrese el Usuario.");
		document.getElementById("usuario").focus();
		return false;
	}else if(contrasena===""){
		alert("Por favor, ingrese una Contraseña.");
		document.getElementById("contrasena").focus();
		return false;
	}else if(confirmarContrasena===""){
		alert("Por favor, confurme la Contraseña.");
		document.getElementById("confirmarContrasena").focus();
		return false;
	}else if(docente==="Docente..."){
		alert("Por favor, seleccione un nombre de la lista.");
		document.getElementById("docente").focus();
		return false;
	}else{
		if(contrasena===confirmarContrasena){
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "../bdUsuarios/crearUsuario.php?usuario="+usuario+"&contrasena="+contrasena+"&docente="+docente, false);
	        xmlhttp.send();
	        if(xmlhttp.responseText.trim()=="si"){
				if(id==0){
					var elemento=$("#handler").parent();		
					elemento.animate({'top':'-500px'},500,function(){
						$('#separador').fadeOut('fast');
					});
        			alert("Te damos una afectuosa bienvenida, "+usuario);
        			validarLogin(usuario,contrasena);
        			return true;
				}else{
					return true;
				}
	        }else{
	        	alert("El usuario "+usuario+" ya existe. Intenta con otro usuario.")
	        	document.getElementById("usuario").value="";
        		document.getElementById("usuario").focus();
        		return false;
	        }
		}else{
			alert("Las contraseñas no coinciden. Vuelve a ingresarlas.");
			document.getElementById("usuario").value=usuario;
			document.getElementById("docente").value=docente;
			document.getElementById("contrasena").value="";
			document.getElementById("confirmarContrasena").value="";
			document.getElementById("contrasena").focus();
			return false;
		}
	}
	
} //id=1 representa que no hay formulario que ocultar. (e.g. formularioNuevoUsuario.php)
function validarLogin(usuario,contrasena){
	var xmlhttp = new XMLHttpRequest();
        
        xmlhttp.open("GET", "../login/login.php?usuario="+usuario+"&contrasena="+contrasena, false);
        xmlhttp.send();
        
        if("si" == xmlhttp.responseText.trim()){
        	return true;
        }else{        	
        	alert("El usuario y la contraseña no coinciden.");
        	document.getElementById("usuarioLogin").value=usuario;
        	document.getElementById("contrasenaLogin").value="";
        	document.getElementById("contrasenaLogin").focus();
        	return false;
        }
}
