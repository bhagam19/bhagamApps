function ordenarUbicacion(filtro){
	//alert(filtro);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUbicaciones/02-cargarUbicaciones.php?ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function registrarUbicacion(){
	var ubicacion= document.getElementById("ubicacion").value;

	ubicacion=ubicacion.toUpperCase();

	//alert(ubicacion);

	if(ubicacion==""){
		alert("Por favor, ingrese una opción de ubicacion. Por ejemplo, \"SALÓN\".");
		document.getElementById("ubicacion").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdUbicaciones/03-crearUbicacion.php?ubicacion="+ubicacion, false);
    	xmlhttp.send();
	    if(xmlhttp.responseText.trim()=="si"){
	    	//alert("La opción de ubicacion "+ubicacion+" fue registrada con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdUbicaciones/02-cargarUbicaciones.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("La opción de ubicacion "+ubicacion+" ya está registrada.");
        	document.getElementById("ubicacion").value="";
    		document.getElementById("ubicacion").focus();
    		return false;
        }    
	}		
}

function actualizarInputUbicacion(tdId,numReg,campo,inpId){
	//alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionUbicacion();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:10px; height:10px; position:relative; top:5px" src="../art/ok.svg" onclick="actualizarRegistroUbicacion('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:10px; height:10px; position:relative; top:5px" src="../art/cancelar.svg" onclick="cancelarAccionUbicacion()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}

function actualizarRegistroUbicacion(id,valor,campo){
	valor=ucwords(valor.toLowerCase());
	//alert(id+", "+valor+", "+campo);

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdUbicaciones/04-actualizarUbicacion.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();	
	xmlhttp.open("GET","../bdUbicaciones/02-cargarUbicaciones.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionUbicacion(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUbicaciones/02-cargarUbicaciones.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroUbicacion(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUbicaciones/05-eliminarUbicacion.php?codUbicacion="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdUbicaciones/02-cargarUbicaciones.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}