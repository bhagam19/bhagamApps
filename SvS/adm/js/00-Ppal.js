
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
		$('.contrasenaCheckList').css('visibility', 'visible');
		validarContrasenaSegura(id);
	}
	if(id=="nuevaContrasena"){//Este ID pertenece al formulario Nueva Contraseña de la sesión de usuario logueado.
		$('.contrasenaCheckList').css('visibility', 'visible');
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
    var url="adm/03-cnt/01-login/01-login.php?usuario="+usuario+"&contrasena="+contrasena;
    fetch(url)
    .then(texto => {
        return texto.text();
    })
    .then(respTexto => {
        //alert(respTexto.trim()); 
        if(respTexto.trim()=="S"){
            return true;
        }else if(respTexto.trim()=="C"){
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
			$('.contrasenaCheckList').css('visibility', 'hidden');
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
            var url="appsLogin/05-cambiarContrasena.php?actual="+actual+"&nueva="+nueva;
            fetch(url)
            .then(texto => {
                return texto.text();
            })
            .then(respTexto => {
                alert(respTexto.trim()); 
                if(responseText.trim()==="si"){
                    alert("La contraseña se cambió exitosamente");
                    document.getElementById("contrasenaActual").value="";
                    document.getElementById("nuevaContrasena").value="";
                    document.getElementById("confirmacionContrasena").value="";
                    $('.contrasenaCheckList').css('visibility', 'hidden');
                    $('.formularioNuevaContrasena').css('visibility', 'hidden');
                    
                }else{        	
                    alert("La contraseña no se pudo cambiar");
                }      
            })
            .catch(error => console.log('Hubo un problema con la petición Fetch:' + error.message));
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
		document.getElementById('barraContrasena').style.width ="7em";
		document.getElementById('barraContrasena').src ="../appsArt/contrasena00.png";
		document.getElementById(id).style.boxShadow="0 1px 10px #fc3504 inset, 0 0 8px #0076fc";
		return false;
	}
}
function cargarReporte(v){  
	var url='';
    switch(v){
        case '1':
            url='adm/02-vst/00-Ppal/05-reporteBasico.php';
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
function showCheckboxes(id) {
	//$('.checkboxes').css('display','none');	
	if( $('#checkboxes'+id).css('display') !== 'none') {
		$('#checkboxes'+id).css('display', 'none');
	}else{
		$('#checkboxes'+id).css('display', 'block');
	}
}
function filtrar(condicion,i){	
	let c=condicion;
	var c1="";
	console.clear();
	console.log(c);
	var cnt=0;
	var cbName="";	
	var filtro =document.getElementById('filtro');
	var cntHijoFiltro=filtro.childNodes.length;
	for(k=0;k<cntHijoFiltro;k++){
		if(filtro.childNodes[k].nodeName==="FORM"){
			var form=filtro.childNodes[k];
			var cntHijoForm=form.childNodes.length;
			for(l=0;l<cntHijoForm;l++){
				if(form.childNodes[l].nodeName==="DIV"){
					var msl=form.childNodes[l];
					var cntHijosMsl=msl.childNodes.length;
					console.log(cntHijosMsl);
					for(m=0;m<cntHijosMsl;m++){
						if(msl.childNodes[m].className==="checkboxes"){
							var div=msl.childNodes[m];
							var cntHijos=div.childNodes;
							for(i=0;i<cntHijos.length;i++){
								if(div.childNodes[i].nodeName==="LABEL"){
									var label=div.childNodes[i];
									var cntNietos=label.childNodes;			
									for(j=0;j<cntNietos.length;j++){
										if(label.childNodes[j].nodeName==="INPUT"){
											var cb=label.childNodes[j];																									
											if(cb.checked===true){
												if(cbName===cb.name){
													if(cnt==0){
														c1=c+" AND "+cb.name+"='"+cb.id+"'";
													}else{
														c1=c1+" OR "+c+" AND "+cb.name+"='"+cb.id+"'";
													}
												}else{
													if(cnt==0){
														c1=c+" AND "+cb.name+"='"+cb.id+"'";
													}else{
														c1=c1+" AND "+c+" AND "+cb.name+"='"+cb.id+"'";
													}													
												}
												cbName=cb.name;																		
												console.log(c1);
												cnt++;
											}
										}
									}
								}
							}

						}
					}
				}
				
			}
		}		
	}	
	var url="adm/02-vst/00-Ppal/05.03-reporteBasicoMatriculaSINAI.php?condicion1="+c1+"&i="+i;
	if(cnt>0){
		fetch(url)
		.then(texto => {
			return texto.text();
		})
		.then(respTexto => {
			//alert(respTexto);
			document.getElementById("contenedor-cuerpo").innerHTML="";
			document.getElementById("contenedor-cuerpo").innerHTML=respTexto;
		})
		.catch(error => console.log('Hubo un problema con la petición Fetch:' + error.message));
	}   
}
function mostrarDivs(c){
	var acc = document.getElementById(c);
	var panel = acc.nextElementSibling;
	if(panel.style.display === "block"){ 
		panel.style.display = "none";
		acc.className="enunciado acordeon";
	}else{
		panel.style.display = "block";
		acc.className="enunciado acordeon enunc-clicked";
	}
}