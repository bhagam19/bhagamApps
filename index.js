//version 2020-04-28 4:25 pm

function mostrarLogin(){
	alert("Hola");
	if( $('.appsFormularioLogin').css('visibility') !== 'hidden' ) {
	    $('.appsFormularioLogin').css('visibility', 'hidden');
	  } else {
	    $('.appsFormularioLogin').css('visibility', 'visible');
	  }
}
function mostrarDatosUsuario(){
	//alert("Hola");
	if( $('.appsFormularioDatosUsuario').css('visibility') !== 'hidden' ) {
	    $('.appsFormularioDatosUsuario').css('visibility', 'hidden');
	    if( $('.appsFormularioNuevaContrasena').css('visibility') !== 'hidden' ) {
		    $('.appsFormularioNuevaContrasena').css('visibility', 'hidden');
		}
	  } else {	  	
	    $('.appsFormularioDatosUsuario').css('visibility', 'visible');
	    $('.appsFormularioDatosUsuario').fadeIn('fast');	
	  }
}
function mostrarCambiarContrasena(){
	//alert("Hola");
	if($('.appsFormularioNuevaContrasena').css('visibility') !== 'hidden') {
		$('.appsFormularioNuevaContrasena').css('visibility', 'hidden');
	}else{	  	
		$('.appsFormularioNuevaContrasena').css('visibility', 'visible');
	}
}
function mostrarMenu(){
	$('.menuNavegacion').css({"border-right":"1px solid gray"});
	$('.menuNavegacion').animate({width:'180px'},"fast",function(){
		$('.li').animate({width:'160px'},"fast",function(){
			$('#verBD').html('<img style="width:25px;height:25px" src="appsArt/bdOn.png">' + 'Ver Base de Datos');
			$('#admon').html('<img style="width:25px;height:25px" src="appsArt/administracion.svg">' + 'Administración');
		});
	});
}
function ocultarMenu(){
	$('.menuNavegacion').animate({width:'34px'},"fast"); 
	$('.menuNavegacion').css({"border-right":"none"});
	$('.li').animate({width:'30px'},"fast");
	$('#verBD').html('<img style="width:25px;height:25px" src="appsArt/bdOnPasiva.png">');
	$('#admon').html('<img style="width:25px;height:25px" src="appsArt/administracion.svg">');
		$('.submenuAdmon').css({"display":"none"});	
}
function mostrarSubMenu(){
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
function mostrarFormularios(clase){	
	//alert(clase);
	$(clase).css({"visibility":"visible"});
	$(clase).animate({'top':'238px'},500);
}
$(document).ready(function(){ //ocultar formularios
	$('.cerrar').click(function(){
		var elemento=$(this).parent().parent();		
		elemento.animate({'top':'-500px'},500,function(){
			$('#separador').fadeOut('fast');
		});
	});
});//ocultar formularios
function cambiarFondoInput(id){//Esta función reestablece el color del fondo de un input después de haberse puesto rojo como validación de dato fatante o equivocado.
	//alert(id);
	document.getElementById(id).style.boxShadow="0 1px 10px #abe2f8 inset, 0 0 8px #0076fc";
	if(id=="nombres"||id=="apellidos"){
		var valor=document.getElementById(id).value;
		valor=ucwords(valor.toLowerCase());	
		document.getElementById(id).value = valor;//escribimos la palabra con la primera letra mayuscula
	}
	if(id=="correo"||id=="usuario"){
		var valor=document.getElementById(id).value;
		valor=valor.toLowerCase();
		document.getElementById(id).value = valor;//escribimos el correo en minúsculas
	}
	if(id=="contrasena"){
		document.getElementById("contrasenaCheckList").style.visibility="visible";
		validarContrasenaSegura(id);
	}
	if(id=="nuevaContrasena"){//Este ID pertenece al formulario Nueva Contraseña de la sesión de usuario logueado.
		document.getElementById("contrasenaCheckList").style.visibility="visible";
		validarContrasenaSegura(id);
	}
}
function validarEmail(valor) {
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
		alert("La dirección de email " + valor + " es correcta.");
	} else {
		alert("La dirección de email es incorrecta.");
	}
}
function registrarUsuario(id){ //id=0 representa que no hay formulario que ocultar. (e.g. formularioNuevoUsuario.php)
	//alert("Registro de usuario nuevo");
	//valor=ucwords(valor.toLowerCase());
	var nombres= document.getElementById("nombres").value;
	var apellidos= document.getElementById("apellidos").value;
	var correo= document.getElementById("correo").value;
	var usuario= document.getElementById("usuario").value;
	var contrasena= document.getElementById("contrasena").value;
	var confirmarContrasena=document.getElementById("confirmarContrasena").value;
	if(nombres===""){
		alert("Por favor, ingrese el nombre.");
		document.getElementById("nombres").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("nombres").focus();
		return false;
	}else if(apellidos===""){
		alert("Por favor, ingrese los apellidos.");
		document.getElementById("apellidos").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("apellidos").focus();
		return false;
	}else if(correo===""){
		alert("Por favor, ingrese un correo.");
		document.getElementById("correo").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("correo").focus();
		return false;
	}else if(usuario===""){
		alert("Por favor, ingrese un usuario.");
		document.getElementById("usuario").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("usuario").focus();
		return false;
	}else if(confirmarContrasena===""){
		alert("Por favor, confirme la Contraseña.");
		document.getElementById("contrasena").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("contrasena").focus();
		return false;
	}else{
		if(correo!==""){
			re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
			if(!re.exec(correo)){
				alert("Por favor, revise que el correo esté bien escrito (p.e micorreo@dominio.com) ");
				document.getElementById("correo").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
				document.getElementById("correo").focus();
				return false;			
			}	
		}
		if(contrasena===confirmarContrasena){
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "appsBdUsuarios/03-crearUsuario.php?nombres="+nombres+"&apellidos="+apellidos+"&correo="+correo+"&usuario="+usuario+"&contrasena="+contrasena, false);
	        xmlhttp.send();
	        if(xmlhttp.responseText.trim()==="si"){
				if(id===1){
					var elemento=$("#handler").parent();		
					elemento.animate({'top':'-500px'},500,function(){
						$('#separador').fadeOut('fast');
					});
        			alert("Te damos una cordial bienvenida, "+usuario);
        			validarLogin(usuario,contrasena);
        			return true;
				}else{
					return true;
				}
	        }else{
				if(xmlhttp.responseText.trim()==="NoUsuario"){
					//alert(xmlhttp.responseText.trim());
					alert("Ya existe un usuario "+usuario+". Intenta con otro.");
					document.getElementById("usuario").value="";
					document.getElementById("usuario").focus();
					return false;
				}else if(xmlhttp.responseText.trim()==="NoCorreo"){
					//alert(xmlhttp.responseText.trim());
					alert("Ya hay registrado un correo "+correo+". Intenta con otro.");
					document.getElementById("correo").value="";
					document.getElementById("correo").focus();
					return false;
				}				
	        }
		}else{
			alert("Las contraseñas no coinciden. Vuelve a ingresarlas.");
			document.getElementById("contrasena").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
			document.getElementById("contrasena").focus();
			return false;
		}
	}
	
} //id=1 representa que no hay formulario que ocultar. (e.g. formularioNuevoUsuario.php)

function validarLogin(usuario,contrasena){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "/appsLogin/01-login.php?usuario="+usuario+"&contrasena="+contrasena, false);
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
		document.getElementById("contrasenaActual").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("contrasenaActual").focus();
		return false;		
	}else if(nueva===""){
		alert("Por favor, ingrese una nueva contraseña.");
		document.getElementById("nuevaContrasena").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("nuevaContrasena").focus();
		return false;
	}else{
		if(nueva!==confirmacion){
			alert("Las contraseñas no coinciden.");
			document.getElementById("nuevaContrasena").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
			document.getElementById("nuevaContrasena").focus();
			return false;
		}else{
			var xmlhttp = new XMLHttpRequest();			        
	        xmlhttp.open("GET", "appsLogin/05-cambiarContrasena.php?actual="+actual+"&nueva="+nueva, false);
	        xmlhttp.send();
	        alert(xmlhttp.responseText.trim());	        
	        if("si" === xmlhttp.responseText.trim()){
	        	alert("La contraseña se cambió exitosamente");
	        	document.getElementById("contrasenaActual").value="";
	        	document.getElementById("nuevaContrasena").value="";
		    	document.getElementById("confirmacionContrasena").value="";
				$('#contrasenaCheckList').css('visibility', 'hidden');
		    	$('.formularioNuevaContrasena').css('visibility', 'hidden');
	        	
	        }else{        	
	        	alert("La contraseña no se pudo cambiar");
	        }		
		}
	}		
}
function validarContrasenaSegura(id){
	var input=document.getElementById(id);
	var contrasena=input.value;
	//alert(contrasena);
	var cnt=0;
	var cantidad=false;
	var mayuscula=false;
	var minuscula=false;
	var numero=false;
	var simbolo=false;
	var checklist="";
	if(contrasena.length>=8){
		cantidad=true;
		for(var i=0;i<contrasena.length;i++){
			if(contrasena.charCodeAt(i)>=65&&contrasena.charCodeAt(i)<=90){
				mayuscula=true;
			}else if(contrasena.charCodeAt(i)>=97&&contrasena.charCodeAt(i)<=122){
				minuscula=true;
			}else if(contrasena.charCodeAt(i)>=48&&contrasena.charCodeAt(i)<=57){
				numero=true;
			}else{
				simbolo=true;
			}
		}
		if(cantidad==true){
			//alert("cantidad");
			cnt=cnt+1;
			document.getElementById('check01').src ="../appsArt/bien.png";		
		}else{
			document.getElementById('check01').src ="../appsArt/mal.png";
		}
		if(mayuscula==true){	
			//alert("mayuscula");
			cnt=cnt+1;		
			document.getElementById('check02').src ="../appsArt/bien.png";	
		}else{
			document.getElementById('check02').src ="../appsArt/mal.png";
		}
		if(minuscula==true){
			//alert("minuscula");	
			cnt=cnt+1;		
			document.getElementById('check03').src ="../appsArt/bien.png";		
		}else{
			document.getElementById('check03').src ="../appsArt/mal.png";
		}
		if(numero==true){	
			//alert("numero");
			cnt=cnt+1;		
			document.getElementById('check04').src ="../appsArt/bien.png";		
		}else{
			document.getElementById('check04').src ="../appsArt/mal.png";
		}
		if(simbolo==true){
			//alert("simbolo");	
			cnt=cnt+1;		
			document.getElementById('check05').src ="../appsArt/bien.png";		
		}else{
			document.getElementById('check05').src ="../appsArt/mal.png";
		}
		switch (cnt) {			
			case 1:
				//alert(cnt);
				document.getElementById('barraContrasena').src ="../appsArt/contrasena01.png";
				document.getElementById(id).style.boxShadow="0 1px 10px #ff6105 inset, 0 0 8px #0076fc";
				break;
			case 2:
				//alert(cnt);
				document.getElementById('barraContrasena').src ="../appsArt/contrasena02.png";
				document.getElementById(id).style.boxShadow="0 1px 10px #ff8a05 inset, 0 0 8px #0076fc";
				break;
			case 3:
				//alert(cnt);
				document.getElementById('barraContrasena').src ="../appsArt/contrasena03.png";
				document.getElementById(id).style.boxShadow="0 1px 10px #e6ff07 inset, 0 0 8px #0076fc";
				break;
			case 4:
				//alert(cnt);
				document.getElementById('barraContrasena').src ="../appsArt/contrasena04.png";
				document.getElementById(id).style.boxShadow="0 1px 10px #8bff07 inset, 0 0 8px #0076fc";
				break;
			case 5:
				//alert(cnt);
				document.getElementById('barraContrasena').src ="../appsArt/contrasena05.png";
				document.getElementById(id).style.boxShadow="0 1px 10px #02aa64 inset, 0 0 8px #0076fc";
				break;			
		}
		if(cnt==5){
			return true;
		}
	}else{
		if(cantidad==true){
			//alert("cantidad");
			cnt=cnt+1;
			document.getElementById('check01').src ="../appsArt/bien.png";		
		}else{
			document.getElementById('check01').src ="../appsArt/mal.png";
		}
		if(mayuscula==true){	
			//alert("mayuscula");
			cnt=cnt+1;		
			document.getElementById('check02').src ="../appsArt/bien.png";	
		}else{
			document.getElementById('check02').src ="../appsArt/mal.png";
		}
		if(minuscula==true){
			//alert("minuscula");	
			cnt=cnt+1;		
			document.getElementById('check03').src ="../appsArt/bien.png";		
		}else{
			document.getElementById('check03').src ="../appsArt/mal.png";
		}
		if(numero==true){	
			//alert("numero");
			cnt=cnt+1;		
			document.getElementById('check04').src ="../appsArt/bien.png";		
		}else{
			document.getElementById('check04').src ="../appsArt/mal.png";
		}
		if(simbolo==true){
			//alert("simbolo");	
			cnt=cnt+1;		
			document.getElementById('check05').src ="../appsArt/bien.png";		
		}else{
			document.getElementById('check05').src ="../appsArt/mal.png";
		}
		document.getElementById('barraContrasena').src ="../appsArt/contrasena00.png";
		document.getElementById(id).style.boxShadow="0 1px 10px #fc3504 inset, 0 0 8px #0076fc";
		return false;
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
function ucwords(f){
    return f.replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function($1){
       return $1.toUpperCase(); 
    });
}
