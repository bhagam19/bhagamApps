function ordenarPermisos(o, filtro){
	//alert(o+", "+filtro);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdPermisos/02-cargarPermisos.php?o="+o+"&ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function confirmarAccionPermisos(accion,id,valor,campo,q){
	//alert(accion+", "+id);
	var confirmacion;

	switch(accion){

		case 1:
			confirmacion=confirm("¿Con seguridad desea aprobar el cambio?");
			if(confirmacion){
				actualizarRegistroPermiso(id,valor,campo,q);
			}

		case 6:
			confirmacion=confirm("¿Con seguridad desea eliminar el registro "+id+" ? \n \n Atención: Esta acción no se puede deshacer.");
			if(confirmacion){
				eliminarRegistroPermiso(id);
			}
	}
}

function registrarPermiso(){
	var permiso= document.getElementById("permiso").value;

	permiso=permiso.toUpperCase();

	if(permiso==""){
		alert("Por favor, ingrese una opción de permiso. Por ejemplo, \"administrador\".");
		document.getElementById("permiso").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdPermisos/03-crearPermiso.php?permiso="+permiso, false);
    	xmlhttp.send();
	    if(xmlhttp.responseText.trim()=="si"){
	    	//alert("La opción de permiso "+permiso+" fue registrada con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdPermisos/02-cargarPermisos.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("La opción de permiso "+permiso+" ya está registrada.");
        	document.getElementById("permiso").value="";
    		document.getElementById("permiso").focus();
    		return false;
        }    
	}		
}

function actualizarInputPermiso(tdId,numReg,campo,inpId){
	//alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionPermiso();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:15px; height:15px" src="../art/ok.svg" onclick="actualizarRegistroPermiso('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px" src="../art/cancelar.svg" onclick="cancelarAccionPermiso()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}

function actualizarRegistroPermiso(id,valor,campo){
	alert(id+", "+valor+", "+campo);
	valor=valor.toUpperCase();
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdPermisos/04-actualizarPermiso.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdPermisos/02-cargarPermisos.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionPermiso(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdPermisos/02-cargarPermisos.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroPermiso(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdPermisos/05-eliminarPermiso.php?cod="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdPermisos/02-cargarPermisos.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}