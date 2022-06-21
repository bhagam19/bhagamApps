function cargarPagina(url){
	// alert(url);
	start();
	document.getElementById("mensajeEspera").style.visibility='visible';

	$.ajax({
        type: "POST",
        url: 'consultaCargador.php',
        // async:false,
        data: {
        	'urld': url
        },
        success: function(resp){
        	// alert("Entra: "+resp);
            document.getElementById("contenedor").innerHTML="";
            document.getElementById("contenedor").innerHTML=resp;
            document.getElementById("mensajeEspera").style.visibility='hidden';            		
        }
    });
}

$(document).ready(function(){
	// alert("hola");
	$(contenedor).scroll(function(){
		if($(contenedor).scrollTop()>20){
			document.getElementById("volverArriba").style.visibility='visible';
		}else{
			document.getElementById("volverArriba").style.visibility='hidden';
		}
	})
})

function volverArriba(){
	document.getElementById("contenedor").scrollTop=0;
}

//====CRONOMETRO====
	var isMarch = false; 
	var acumularTime = 0;
	var pantalla = document.getElementById("screen");
	function start(){
		reset();
		if (isMarch == false){ 
			timeInicial = new Date();
			control = setInterval(cronometro,10);
			isMarch = true;
		}
	}
	function cronometro () {
		var pantalla = document.getElementById("screen");	
		timeActual = new Date();
		acumularTime = timeActual - timeInicial;
		acumularTime2 = new Date();
		acumularTime2.setTime(acumularTime); 
		cc = Math.round(acumularTime2.getMilliseconds()/10);
		ss = acumularTime2.getSeconds();
		mm = acumularTime2.getMinutes();
		hh = acumularTime2.getHours()-18;
		if (cc < 10) {cc = "0"+cc;}
		if (ss < 10) {ss = "0"+ss;} 
		if (mm < 10) {mm = "0"+mm;}
		if (hh < 10) {hh = "0"+hh;}
		pantalla.innerHTML = "";
		pantalla.innerHTML = mm+" : "+ss+" : "+cc;
	}
	function stop () { 
		if (isMarch == true) {
			clearInterval(control);
			isMarch = false;
		}     
	}
	function resume () {
		if (isMarch == false) {
			timeActu2 = new Date();
			timeActu2 = timeActu2.getTime();
			acumularResume = timeActu2-acumularTime;

			timeInicial.setTime(acumularResume);
			control = setInterval(cronometro,10);
			isMarch = true;
		}     
	}
	function reset(){
		if(isMarch == true){
			clearInterval(control);
			isMarch=false;
		}
		acumularTime=0;
	}

function mostrarLogin(){
	//alert("Hola");
	if( $('.formularioLogin').css('visibility') != 'hidden' ) {
	    $('.formularioLogin').css('visibility', 'hidden');
	  } else {	  	
	    $('.formularioLogin').css('visibility', 'visible');
	  }
}
function mostrarCambiarContrasena(){
	// alert("Hola");
	if( $('.formularioNuevaContrasena').css('visibility') != 'hidden' ) {
	    $('.formularioNuevaContrasena').css('visibility', 'hidden');
	  } else {	  	
	    $('.formularioNuevaContrasena').css('visibility', 'visible');
	  }
}
$(document).ready(function(){

	// alert($('.btnMenu').css('display'));

	// if($('.btnMenu').css('display')=='none'){
	// 	$('.btnMenu').css('display','block');
	// }

	$('.menu li:has(ul)').click(function(){
		e.preventDefault();

		if ($(this).hasClass('activado')){
			$(this).removeClass('activado');
			$(this).children('ul').slideUp();
		} else {
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
			$(this).addClass('activado');
			$(this).children('ul').slideDown();
		}
	});

	$('.btnMenu').click(function(){
		// $('.menuNavegacion .menu').slideToggle();

		if($('.menuNavegacion').css('width')=='380px'){
			$('.menuNavegacion').animate({width:'1px'},0);		
        	$('#contenedor').animate({width:'97.3%'},0);
        	$('#contenedor').animate({left:'1px'},0);        	
		}else{
			$('.menuNavegacion').animate({width:'380px'},0);	
			$('#contenedor').animate({width:'86.8%'},0);	
			$('#contenedor').animate({left: '380px'},0);			
        	
		}	

	});

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

	$('.menu li ul li a').click(function(){
		window.location.href = $(this).attr("href");
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
	// alert(usuario+", "+contrasena);
	var xmlhttp = new XMLHttpRequest();        
    xmlhttp.open("GET", "../login/login.php?usuario="+usuario+"&contrasena="+contrasena, false);
    xmlhttp.send();
    // alert(xmlhttp.responseText.trim());        
    if("si" == xmlhttp.responseText.trim()){
    	return true;	
    }else if(xmlhttp.responseText.trim()=="cambiar"){
    	alert("recuerde cambiar la contraseña asignada por el administrador. Es poco segura.");
    	return true;
	}else{        	
    	alert("El usuario y la contraseña no coinciden.");
    	document.getElementById("usuarioLogin").value=usuario;
    	document.getElementById("contrasenaLogin").value="";
    	document.getElementById("contrasenaLogin").focus();
    	return false;
    }
}
function validarNuevaContrasena(usuario,actual,nueva,confirmacion){
	// alert(usuario+", "+actual+", "+nueva+", "+confirmacion);
	var xmlhttp = new XMLHttpRequest();        
    xmlhttp.open("GET", "../login/login.php?usuario="+usuario+"&contrasena="+actual, false);
    xmlhttp.send();
    if(xmlhttp.responseText.trim()=="si"||xmlhttp.responseText.trim()=="cambiar"){
    	if(nueva!=confirmacion){
			alert("Las contraseñas no coinciden.");
	    	document.getElementById("nuevaContrasena").value=nueva;
	    	document.getElementById("confirmacionContrasena").value=confirmacion;
	    	document.getElementById("nuevaContrasena").focus();
		}else{
			var xmlhttp = new XMLHttpRequest();			        
	        xmlhttp.open("GET", "../login/cambiarContrasena.php?usuario="+usuario+"&actual="+actual+"&nueva="+nueva, false);
	        xmlhttp.send();
	        // alert(xmlhttp.responseText.trim()); 	        
	        if("si" == xmlhttp.responseText.trim()){
	        	alert("La contraseña se cambió exitosamente");
	        	document.getElementById("contrasenaActual").value="";
	        	document.getElementById("nuevaContrasena").value="";
		    	document.getElementById("confirmacionContrasena").value="";
		    	$('#formularioNuevaContrasena').css('visibility', 'hidden');	        	
	        }else{        	
	        	alert("La contraseña no se pudo cambiar");
	        }		
		}
    }else{
    	alert("La contraseña actual ingresada no coincide con la base de datos.");
    	document.getElementById("contrasenaActual").value=""
    	document.getElementById("contrasenaActual").focus();
    }		
}
function reinstalarBD(){
	var confirmar=confirm("¿Realmente desea reinstalar la Base de Datos?\n\nEsta acción no se puede deshacer.!!!");
	if(confirmar){
		cargarPagina("../borrarTablas.php");
		cargarPagina("../instalacion.php");
	}else{
		alert("No se reinstaló la Base de Datos.");
	}

}

