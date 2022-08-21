function mostrarLogin(){
	if( $('.appsFormularioLogin').css('visibility') !== 'hidden' ) {
	    $('.appsFormularioLogin').css('visibility', 'hidden');
	  } else {
	    $('.appsFormularioLogin').css('visibility', 'visible');
	  }
}
function mostrarFormularios(clase){	
	//alert(clase);
	$(clase).css({"visibility":"visible"});
	$(clase).animate({'top':'300px'},500);
}
$(document).ready(function(){ //ocultar formularios
	$('.cerrar').click(function(){
		var elemento=$(this).parent().parent();		
		elemento.animate({'top':'-700px'},500,function(){
			$('#separador').fadeOut('fast');
		});
	});
});
function validarLogin(usuario,contrasena){
    var url="adm/02-vst/01-Login/01-login.php?usuario="+usuario+"&contrasena="+contrasena;
    fetch(url)
    .then(texto => {
        return texto.text();
    })
    .then(respTexto => {
        alert(respTexto.trim()); 
        if(responseText.trim()==="S"){
            return true;
        }else if(xmlhttp.responseText.trim()==="C"){
            alert("Recuerde cambiar la contraseña asignada por el administrador. Es poco segura.");
            return true;
            }else{        	
            alert("El usuario y la contraseña no coinciden.");
            document.getElementById("usuarioLogin").value=usuario;
            document.getElementById("contrasenaLogin").value="";
            document.getElementById("contrasenaLogin").focus();
            return false;
        }      
    })
    .catch(error => console.log('Hubo un problema con la petición Fetch:' + error.message));
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
function cargarReporte(v){    
    var url='';
    switch(v){
        case '1':
            url='adm/02-vst/00-Ppal/03-reporte01.php';
        break;
        case '2':
            url='adm/02-vst/00-Ppal/03-reporte02.php';
        break;
        case '3':
            url='adm/02-vst/00-Ppal/03-reporte03.php';
        break;
        case '4':
            url='adm/02-vst/00-Ppal/03-reporte04.php';
        break;
        case '5':
            url='adm/02-vst/00-Ppal/03-reporte05.php';
        break;
        case '6':
            url='adm/02-vst/00-Ppal/03-reporte06.php';
        break;
        case '7':
            url='adm/02-vst/00-Ppal/03-reporte07.php';
        break;
    }     
    fetch(url)
        .then(texto => {
            return texto.text();
        })
        .then(respTexto => {
            document.getElementById('reporte').style.visibility='visible';
            document.getElementById('reporte').innerHTML='';
	        document.getElementById('reporte').innerHTML=respTexto.trim();            
        })
        .catch(error => console.log('Hubo un problema con la petición Fetch:' + error.message));
    
}
function mostrarCargadorDatos(){
    //Requiere https://code.jquery.com/jquery-3.2.1.js
	if( $('.cargadorDatos').css('visibility') !== 'hidden' ) {
	    $('.cargadorDatos').css('visibility', 'hidden');
        document.getElementById("btnCargarDatos").innerHTML="Mostrar Cargadores de Datos";
	  } else {
	    $('.cargadorDatos').css('visibility', 'visible');
        document.getElementById("btnCargarDatos").innerHTML="Ocultar Cargadores de Datos";
	  }
}