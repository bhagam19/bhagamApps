function ordenarDocentes(o,filtro){
	//alert(o+", "+filtro);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdDocentes/02-cargarDocentes.php?o="+o+"&ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function confirmarAccionDocentes(accion,id,valor,campo,q){
	//alert(accion+", "+id);
	var confirmacion;

	switch(accion){

		case 1:
			confirmacion=confirm("¿Con seguridad desea aprobar el cambio?");
			if(confirmacion){
				actualizarRegistroBien(id,valor,campo,q);
			}

		case 6:
			confirmacion=confirm("¿Con seguridad desea eliminar el registro "+id+" ? \n \n Atención: Esta acción no se puede deshacer.");
			if(confirmacion){
				eliminarRegistroDocente(id);
			}
	}
}

function registrarDocente(){	

	var id= document.getElementById("id").value;
	var apellidos= document.getElementById("apellidos").value;
	var nombres= document.getElementById("nombres").value;
	var usuario= document.getElementById("usuario").value;
	var contrasena= document.getElementById("contrasena").value;
	var genero=document.getElementById("genero").value;
	var permiso= document.getElementById("permiso").value;

	apellidos=ucwords(apellidos);
	nombres=ucwords(nombres);

	//alert(id+", "+apellidos+", "+nombres+", "+usuario+", "+contrasena+", "+permiso);

	if(id==""){
		alert("Por favor, ingrese un número de identificación.");
		document.getElementById("id").focus();
		return false;
	}else if(apellidos==""){
		alert("Por favor, ingrese los apellidos del usuario.");
		document.getElementById("apellidos").focus();
		return false;
	}else if(nombres==""){
		alert("Por favor, ingrese los nombres del usuario.");
		document.getElementById("nombres").focus();
		return false;
	}else if(usuario==""){
		alert("Por favor, ingrese un nombre de usuario para el usuario.");
		document.getElementById("usuario").focus();
		return false;
	}else if(contrasena==""){
		alert("Por favor, ingrese una contraseña para el usuario.");
		document.getElementById("contrasena").focus();
		return false;
	}else if(genero=="Genero..."){
		alert("Por favor, seleccione un género para el usuario.");
		document.getElementById("genero").focus();
		return false;
	}else if(permiso=="Permisos..."){
		alert("Por favor, seleccione un nivel de permisos para el usuario.");
		document.getElementById("permiso").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdDocentes/03-crearDocente.php?id="+id+"&apellidos="+apellidos+"&nombres="+nombres+
        	"&usuario="+usuario+"&contrasena="+contrasena+"&genero="+genero+"&permiso="+permiso, false);
    	xmlhttp.send();

    	//alert(xmlhttp.responseText.trim());

	    if(xmlhttp.responseText.trim()=="si"){
	    	xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdDocentes/02-cargarDocentes.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	

			alert("El docente "+nombres+" "+apellidos+", con número de identificación "+id+" fue registrado con éxito.");

        }else{
        	alert("El número de identificación "+id+" ya está registrado.");
        	//document.getElementById("id").value="";
    		document.getElementById("id").focus();
    		return false;
        }    
	}		
}

function actualizarInputDocente(tdId,numReg,campo,inpId){
	//alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionDocente();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" style="width:100px" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:15px; height:15px" src="../art/ok.svg" onclick="actualizarRegistroDocente('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px" src="../art/cancelar.svg" onclick="cancelarAccionDocente()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}

function actualizarSeleccionDocente(tdId,numReg,campo,selId,value,tabla,campo2){
	// alert(tdId+", "+numReg+", "+campo+", "+selId+", "+value+", "+tabla+", "+campo2);
	
	cancelarAccionDocente();
	
	var td=document.getElementById(tdId);	

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdDocentes/02.1-cargarListasDocentes.php?actual="+td.innerHTML+"&tabla="+tabla+"&campo2="+campo2,false);
	xmlhttp.send();

	//alert(xmlhttp.responseText.trim());
	
	var contenido =	'<select name="'+selId+'" id="'+selId+'"><option value='+value+'>'+td.innerHTML+'</option>'+
					xmlhttp.responseText.trim() + '</select>'+" " +
					'<input type="image" style="width:15px; height:15px" src="../art/ok.svg" onclick="actualizarRegistroDocente('+numReg+','+selId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px" src="../art/cancelar.svg" onclick="cancelarAccionDocente()">';

	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(selId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";	
	}
				
}

function actualizarRegistroDocente(id,valor,campo){
	// alert(id+", "+valor+", "+campo);

	valor=ucwords(valor);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdDocentes/04-actualizarDocente.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdDocentes/02-cargarDocentes.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionDocente(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdDocentes/02-cargarDocentes.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroDocente(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdDocentes/05-eliminarDocente.php?cod="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdDocentes/02-cargarDocentes.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function ucwords(f){
    return f.replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function($1){
       return $1.toUpperCase(); 
    });
}