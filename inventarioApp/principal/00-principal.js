//version 2020-04-28 4:25 pm

function mostrarLogin(){
	//alert("Hola");
	if( $('.formularioLogin').css('visibility') !== 'hidden' ) {
	    $('.formularioLogin').css('visibility', 'hidden');
	    
	  } else {
	    $('.formularioLogin').css('visibility', 'visible');
	    
	  }
}
function mostrarDatosUsuario(){
	//alert("Hola");
	if( $('.formularioDatosUsuario').css('visibility') !== 'hidden' ) {
	    $('.formularioDatosUsuario').css('visibility', 'hidden');
	    if( $('.formularioNuevaContrasena').css('visibility') !== 'hidden' ) {
		    $('.formularioNuevaContrasena').css('visibility', 'hidden');
		}
	  } else {	  	
	    $('.formularioDatosUsuario').css('visibility', 'visible');
	    $('.formularioDatosUsuario').fadeIn('fast');	
	  }
}
function mostrarCambiarContrasena(){
	// alert("Hola");
	if( $('.formularioNuevaContrasena').css('visibility') !== 'hidden' ) {
	    $('.formularioNuevaContrasena').css('visibility', 'hidden');
	  } else {	  	
	    $('.formularioNuevaContrasena').css('visibility', 'visible');
	  }
}
function mostrarMenu(){
	$('.menuNavegacion').css({"border-right":"1px solid gray"});
	if(screen.width<800){
		//alert(screen.width);
		$('.menuNavegacion').animate({width:'420px'},"fast",function(){
			$('.li').animate({width:'410px'},"fast",function(){
				$('#listProy').html('<img style="width:40px;height:40px" src="../art/atras.svg">' + 'Ir a Lista de Proyectos');
				$('#verBD').html('<img style="width:40px;height:40px" src="../art/bd.svg">' + 'Ver Base de Datos');
				$('#invBienes').html('<img style="width:40px;height:40px" src="../art/inventario.png">' + 'Inventario de Bienes');
				$('#admon').html('<img style="width:40px;height:40px" src="../art/administracion.svg">' + 'Adminstración');
				$('#reiniciarBD').html('<img style="width:40px;height:40px" src="../art/reiniciar.svg">' + 'Reinstalar BD');
				$('#genActa').html('<img style="width:40px;height:40px" src="../art/acta.svg">' + 'Generar Acta');
				$('#expExcel').html('<img style="width:40px;height:40px" src="../art/exportar.svg">' + 'Exportar a Excel');
			});
		});
	}else{
		$('.menuNavegacion').animate({width:'180px'},"fast",function(){
			$('.li').animate({width:'160px'},"fast",function(){
				$('#listProy').html('<img style="width:15px;height:15px" src="../art/atras.svg">' + 'Ir a Lista de Proyectos');
				$('#verBD').html('<img style="width:15px;height:15px" src="../art/bd.svg">' + 'Ver Base de Datos');
				$('#invBienes').html('<img style="width:15px;height:15px" src="../art/inventario.png">' + 'Inventario de Bienes');
				$('#admon').html('<img style="width:15px;height:15px" src="../art/administracion.svg">' + 'Adminstración');
				$('#reiniciarBD').html('<img style="width:15px;height:15px" src="../art/reiniciar.svg">' + 'Reinstalar BD');
				$('#genActa').html('<img style="width:15px;height:15px" src="../art/acta.svg">' + 'Generar Acta');
				$('#expExcel').html('<img style="width:15px;height:15px" src="../art/exportar.svg">' + 'Exportar a Excel');
			});
		});
	}
}
function ocultarMenu(){
	if(screen.width<800){
		$('.menuNavegacion').animate({width:'50px'},"fast"); 
		$('.menuNavegacion').css({"border-right":"none"});
		$('.li').animate({width:'45px'},"fast");
		$('#listProy').html('<img style="width:40px;height:40px" src="../art/atras.svg">');
		$('#verBD').html('<img style="width:40px;height:40px" src="../art/bd.svg">');
		$('#invBienes').html('<img style="width:40px;height:40px" src="../art/inventario.png">');
		$('#admon').html('<img style="width:40px;height:40px" src="../art/administracion.svg">');
		$('.submenuAdmon').css({"display":"none"});
		$('#reiniciarBD').html('<img style="width:40px;height:40px" src="../art/reiniciar.svg">');
		$('#genActa').html('<img style="width:40px;height:40px" src="../art/acta.svg">');
		$('#expExcel').html('<img style="width:40px;height:40px" src="../art/exportar.svg">');
	}else{
		$('.menuNavegacion').animate({width:'24px'},"fast"); 
		$('.menuNavegacion').css({"border-right":"none"});
		$('.li').animate({width:'20px'},"fast");
		$('#listProy').html('<img style="width:15px;height:15px" src="../art/atras.svg">');
		$('#verBD').html('<img style="width:15px;height:15px" src="../art/bd.svg">');
		$('#invBienes').html('<img style="width:15px;height:15px" src="../art/inventario.png">');
		$('#admon').html('<img style="width:15px;height:15px" src="../art/administracion.svg">');
		$('.submenuAdmon').css({"display":"none"});
		$('#reiniciarBD').html('<img style="width:15px;height:15px" src="../art/reiniciar.svg">');
		$('#genActa').html('<img style="width:15px;height:15px" src="../art/acta.svg">');
		$('#expExcel').html('<img style="width:15px;height:15px" src="../art/exportar.svg">');
	}
}
function mostrarSubMenu(){
	if(screen.width<800){
		if($('.submenuAdmon').css("display")==="none"){
			$('.submenuAdmon').slideDown();
			$('.submenuAdmon').css({"display":"block"});
			$('.menuNavegacion').animate({width:'480px'},"fast");
		}else{
			$('.submenuAdmon').css({"display":"block"});
			$('.submenuAdmon').slideUp("fast",function(){
			$('.menuNavegacion').animate({width:'420px'},"fast");
			});
		}	
	}else{
		if($('.submenuAdmon').css("display")==="none"){
			$('.submenuAdmon').slideDown();
			$('.submenuAdmon').css({"display":"block"});
			$('.menuNavegacion').animate({width:'210px'},"fast");
		}else{
			$('.submenuAdmon').css({"display":"block"});
			$('.submenuAdmon').slideUp("fast",function(){
			$('.menuNavegacion').animate({width:'180px'},"fast");
			});
		}	
	}
}
$(document).ready(function(){

	$(window).resize(function(){
		if ($(document).width() > 450){
			$('.menuNavegacion .menu').css({'display' : 'block'});
		}

		if ($(document).width() < 450){
			$('.menuNavegacion .menu').css({'display' : 'none'});
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
		}
	});
	
});
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
	$("#formulario").draggable({stack:"#formulario"}, {handle:"#handler"});
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
	        if(xmlhttp.responseText.trim()==="si"){
				if(id===0){
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
	        	alert("El usuario "+usuario+" ya existe. Intenta con otro usuario.");
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
        xmlhttp.open("GET", "../login/01-login.php?usuario="+usuario+"&contrasena="+contrasena, false);
        xmlhttp.send();
        //alert(xmlhttp.responseText.trim());        
        if("si" === xmlhttp.responseText.trim()){
        	return true;
        }else if(xmlhttp.responseText.trim()==="cambiar"){
        	alert("Recuerde cambiar la contraseña asignada por el administrador. Es poco segura.");
        	return true;
    	}else{        	
        	alert("El usuario y la contraseña no coinciden.");
        	document.getElementById("usuarioLogin").value=usuario;
        	document.getElementById("contrasenaLogin").value="";
        	document.getElementById("contrasenaLogin").focus();
        	return false;
        }
}

function validarNuevaContrasena(actual,nueva,confirmacion){
	if(actual===""){
		alert("Por favor, ingrese la contraseña actual para poder continuar.");
		document.getElementById("contrasenaActual").focus();
	}else if(nueva===""){
		alert("Por favor, ingrese una nueva contraseña.");
		document.getElementById("nuevaContrasena").focus();
	}else{
		if(nueva!==confirmacion){
			alert("Las contraseñas no coinciden.");
	    	document.getElementById("nuevaContrasena").value=nueva;
	    	document.getElementById("confirmacionContrasena").value=confirmacionContrasena;
	    	document.getElementById("confirmacionContrasena").focus();
		}else{
			var xmlhttp = new XMLHttpRequest();			        
	        xmlhttp.open("GET", "../login/05-cambiarContrasena.php?actual="+actual+"&nueva="+nueva, false);
	        xmlhttp.send();
	        //alert(xmlhttp.responseText.trim());	        
	        if("si" === xmlhttp.responseText.trim()){
	        	alert("La contraseña se cambió exitosamente");
	        	document.getElementById("contrasenaActual").value="";
	        	document.getElementById("nuevaContrasena").value="";
		    	document.getElementById("confirmacionContrasena").value="";
		    	$('.formularioNuevaContrasena').css('visibility', 'hidden');	        	
	        }else{        	
	        	alert("La contraseña no se pudo cambiar");
	        }		
		}
	}		
}

function mostrarFormCargueExcel(){
  if( $('#formCargueExcel').css('visibility') !== 'hidden') {
	    $('#formCargueExcel').css('visibility', 'hidden');	    
	  } else {
	    $('#formCargueExcel').css('visibility', 'visible');	    
	  }  
}

function reinstalarBD(){

	var confirmar=confirm("¿Realmente desea reinstalar la Base de Datos?\n\nEsta acción no se puede deshacer.");

	if(confirmar){		
		window.open("/inventarioIET/03-borrarTablas.php");
		// var xmlhttp = new XMLHttpRequest();
		// xmlhttp.open("GET","../borrarTablas.php",false);
		// xmlhttp.send();
		alert("Se reinstaló la Base de Datos.");
	}else{
		alert("No se reinstaló la Base de Datos.");
	}

}

