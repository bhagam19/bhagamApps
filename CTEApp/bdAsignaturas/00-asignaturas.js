function ordenarAsignatura(o,filtro){
	//alert(o+", "+filtro);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAsignaturas/02-cargarAsignaturas.php?o="+o+"&ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function confirmarAccionAsignaturas(accion,id,valor,campo,q){
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
				eliminarRegistroAsignatura(id);
			}
	}
}

function registrarAsignatura(){	

	var asignatura= document.getElementById("asignatura").value;
	var codArea= document.getElementById("codArea").value;

	alert(asignatura+", "+codArea);

	asignatura=asignatura.toUpperCase();

	if(asignatura==""){
		alert("Por favor, ingrese una opción de asignatura. Por ejemplo, \"CÁTEDRA DE LA PAZ\".");
		document.getElementById("asignatura").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdAsignaturas/03-crearAsignatura.php?asignatura="+asignatura+"&codArea="+codArea, false);
    	xmlhttp.send();
	    if(xmlhttp.responseText.trim()=="si"){
	    	//alert("La opción de asignatura "+asignatura+" fue registrada con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdAsignaturas/02-cargarAsignaturas.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("La opción de asignatura "+asignatura+" ya está registrada.");
        	document.getElementById("asignatura").value="";
    		document.getElementById("asignatura").focus();
    		return false;
        }    
	}		
}

function actualizarInputAsignatura(tdId,numReg,campo,inpId){
	//alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionAsignatura();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:15px; height:15px" src="../art/ok.svg" onclick="actualizarRegistroAsignatura('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px" src="../art/cancelar.svg" onclick="cancelarAccionAsignatura()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}

function actualizarSeleccionAsignatura(tdId,numReg,campo,selId,value,tabla,campo2){
	//alert(tdId+", "+numReg+", "+campo+", "+selId+", "+value+", "+tabla+", "+campo2);
	
	cancelarAccionAsignatura();
	
	var td=document.getElementById(tdId);	

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAsignaturas/02.1-cargarListasAsignaturas.php?actual="+td.innerHTML+"&tabla="+tabla+"&campo2="+campo2,false);
	xmlhttp.send();

	//alert(xmlhttp.responseText.trim());
	
	var contenido =	'<select name="'+selId+'" id="'+selId+'"><option value='+value+'>'+td.innerHTML+'</option>'+
					xmlhttp.responseText.trim() + '</select>'+" " +
					'<input type="image" style="width:15px; height:15px" src="../art/ok.svg" onclick="actualizarRegistroAsignatura('+numReg+','+selId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px" src="../art/cancelar.svg" onclick="cancelarAccionAsignatura()">';

	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(selId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";	
	}
				
}

function actualizarRegistroAsignatura(id,valor,campo){
	//alert(id+", "+valor+", "+campo);
	valor=valor.toUpperCase();
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdAsignaturas/04-actualizarAsignatura.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAsignaturas/02-cargarAsignaturas.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionAsignatura(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAsignaturas/02-cargarAsignaturas.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroAsignatura(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAsignaturas/05-eliminarAsignatura.php?cod="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAsignaturas/02-cargarAsignaturas.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}