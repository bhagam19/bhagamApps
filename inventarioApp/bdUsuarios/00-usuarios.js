function ordenarUsuario(campo,direccion){
	//alert(filtro);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUsuarios/02-cargarUsuarios.php?campo="+campo+"&direccion="+direccion,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function registrarNuevoUsuario(){
	var usuario= document.getElementById("usuario").value;
	var contrasena= document.getElementById("contrasena").value;
	var usuarioCED= document.getElementById("usuarioCED").value;
	var apellidos= document.getElementById("apellidos").value;
	var nombres= document.getElementById("nombres").value;
	var defUsuario= document.getElementById("defUsuario").value;
	var permiso= document.getElementById("permiso").value;
	
	apellidos=apellidos.replace(/\b\w/g, l => l.toUpperCase());
	nombres=nombres.replace(/\b\w/g, l => l.toUpperCase());
	
	//alert(usuario+", "+contrasena+", "+usuarioCED+", "+apellidos+", "+nombres+", "+defUsuario+", "+permiso);
	
	if(usuario==""){
		alert("Por favor, ingrese el número de identificación del usuario.");
		document.getElementById("usuario").focus();
		return false;
	}else if(contrasena==""){
		alert("Por favor, ingrese una contraseña.");
		document.getElementById("contrasena").focus();
		return false;
	}else if(usuarioCED==""){
		alert("Por favor, ingrese el número de identificación del usuario.");
		document.getElementById("usuarioCED").focus();
		return false;
	}else if(apellidos==""){
		alert("Por favor, ingrese los apellidos del usuario.");
		document.getElementById("apellidos").focus();
		return false;
	}else if(nombres==""){
		alert("Por favor, ingrese los nombres del usuario.");
		document.getElementById("nombres").focus();
		return false;
	}else if(defUsuario==""||!(defUsuario==0||defUsuario==1)){
		alert("Por favor, ingrese 0 o 1 para definir la responsabilidad del usuario");
		document.getElementById("defUsuario").focus();
		return false;
	}else if(permiso==""||!(permiso==0||permiso==1||permiso==2||permiso==3||permiso==4||permiso==5||permiso==6)){
		alert("Por favor, ingrese un número de 0 a 6 para definir los permisos del usuario");
		document.getElementById("permiso").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdUsuarios/03-crearUsuario.php?	usuario="+usuario+"&contrasena="+contrasena+"&usuarioCED="+usuarioCED+
        														"&apellidos="+apellidos+"&nombres="+nombres+"&defUsuario="+defUsuario+
        														"&permiso="+permiso, false);
    	xmlhttp.send();

    	//alert(xmlhttp.responseText.trim());
	    if(xmlhttp.responseText.trim()=="si"){
	    	alert("El usuario "+usuario+" fue registrado con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdUsuarios/02-cargarUsuarios.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("Ya existe un usuario "+usuario+" registrado.");
        	document.getElementById("usuario").value="";
    		document.getElementById("usuario").focus();
    		return false;
        }    
	}
			
}

function actualizarSeleccionUsuario(tdId,numReg,campo,selId,value){
	// alert(tdId+", "+numReg+", "+campo+", "+selId+", "+value);

	cancelarAccionUsuarios();	
	
	var td=document.getElementById(tdId);	
	var textoOpcion;

	if(campo=="defUsuario"){
		if(value==1){
			textoOpcion= '<option value=0>NO</option></select>'
		}else{
			textoOpcion= '<option value=1>SÍ</option></select>'
		}
	}else{
		if(value==1){
			textoOpcion= 	'<option value=2>SSO</option>'+
							'<option value=3>Responsable Inventario</option>'+
							'<option value=4>Administrador 01</option>'+
							'<option value=5>Rector</option>'+
							'<option value=6>Desarrollador</option></select>'
		}else if(value==2){
			textoOpcion= 	'<option value=1>Responsable</option>'+
							'<option value=3>Responsable Inventario</option>'+
							'<option value=4>Administrador 01</option>'+
							'<option value=5>Rector</option>'+
							'<option value=6>Desarrollador</option></select>'
		}else if(value==3){
			textoOpcion= 	'<option value=1>Responsable</option>'+
							'<option value=2>SSO</option>'+
							'<option value=4>Administrador 01</option>'+
							'<option value=5>Rector</option>'+
							'<option value=6>Desarrollador</option></select>'
		}else if(value==4){
			textoOpcion= 	'<option value=1>Responsable</option>'+
							'<option value=2>SSO</option>'+
							'<option value=3>Responsable Inventario</option>'+
							'<option value=5>Rector</option>'+
							'<option value=6>Desarrollador</option></select>'
		}else if(value==5){
			textoOpcion= 	'<option value=1>Responsable</option>'+
							'<option value=2>SSO</option>'+
							'<option value=3>Responsable Inventario</option>'+
							'<option value=4>Administrador 01</option>'+
							'<option value=6>Desarrollador</option></select>'
		}else if(value==6){
			textoOpcion= 	'<option value=1>Responsable</option>'+
							'<option value=2>SSO</option>'+
							'<option value=3>Responsable Inventario</option>'+
							'<option value=4>Administrador 01</option>'+
							'<option value=5>Rector</option></select>'
		}
	}
	var contenido =	'<select name="'+selId+'" id="'+selId+'">'+
						'<option value='+value+'>'+td.innerHTML+'</option>'+textoOpcion+' '+				
					'<input type="image" style="width:15px; height:15px" src="../art/ok.svg" onclick="actualizarRegistroUsuario('+numReg+','+selId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px" src="../art/cancelar.svg" onclick="cancelarAccionUsuarios()">';

	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(selId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";	
	}			
}

function actualizarInputUsuario(tdId,numReg,campo,inpId){
	// alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionUsuarios();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:15px; height:15px" src="../art/ok.svg" onclick="actualizarRegistroUsuario('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px" src="../art/cancelar.svg" onclick="cancelarAccionUsuarios()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}

function actualizarRegistroUsuario(id,valor,campo){
	// alert(id+", "+valor+", "+campo);

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdUsuarios/04-actualizarUsuario.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUsuarios/02-cargarUsuarios.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionUsuarios(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUsuarios/02-cargarUsuarios.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroUsuario(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUsuarios/05-eliminarUsuario.php?usuarioID="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUsuarios/02-cargarUsuarios.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function reestablecerTablaUsuarios(archivoFuente){

	af=archivoFuente.replace(/\\/g, "/");
	u=af.lastIndexOf("/");
	l=af.length;
	af=af.substr(u+1,l);
	alert(af);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUsuarios/06-cargarUsuariosExcel.php?archivoFuente="+archivoFuente,false);
	xmlhttp.send();
	//xhttp.open("POST", "../bdUsuarios/06-cargarUsuariosExcel.php", true);
    //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhttp.send(archivoFuente);

	alert(xmlhttp.responseText.trim());
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUsuarios/02-cargarUsuarios.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}