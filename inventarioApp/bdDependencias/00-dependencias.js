function ordenarDependencias(filtro){
	//alert(filtro);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdDependencias/02-cargarDependencias.php?ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML="";
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function registrarDependencia(){
	var dependencia= document.getElementById("dependencia").value;
	var ubicacion= document.getElementById("ubicacion").value;
	var nomResponsable= document.getElementById("nomResponsable").value;
	dependencia=ucwords(dependencia.toLowerCase());
	if(dependencia===""){
		alert("Por favor, ingrese una dependencia. Por ejemplo, \"AULA B1 A-101 (03A)\".");
		document.getElementById("dependencia").focus();
		return false;
	}else if(ubicacion==="Ubicación..."){
		alert("Por favor, seleccione una ubicación.");
		document.getElementById("ubicacion").focus();
		return false;
	}else if(nomResponsable==="Responsable..."){
		alert("Por favor, seleccione un responsable.");
		document.getElementById("nomResponsable").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdDependencias/03-crearDependencia.php?dependencia="+dependencia+"&ubicacion="+ubicacion+"&nomResponsable="+nomResponsable, false);
    	xmlhttp.send();
	    if(xmlhttp.responseText.trim()==="si"){
	    	//alert("La clase de bien "+dependencia+" fue registrada con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdDependencias/02-cargarDependencias.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML="";
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("La dependencia "+dependencia+" ya está registrada.");
        	document.getElementById("almacenamiento").value="";
    		document.getElementById("almacenamiento").focus();
    		return false;
        }    
	}		
}

function actualizarSeleccionDependencia(tdId,numReg,campo,selId,value,tabla,campo2){
	//alert(tdId+", "+numReg+", "+campo+", "+selId+", "+value+", "+tabla+", "+campo2);	
	cancelarAccionDependencia();	
	var td=document.getElementById(tdId);	

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdDependencias/02-cargarListaDependencias.php?actual="+td.innerHTML+"&tabla="+tabla+"&campo2="+campo2,false);
	xmlhttp.send();
	//alert(xmlhttp.responseText.trim());
	var contenido =	'<select name="'+selId+'" id="'+selId+'" style="width:150px"><option value='+value+'>'+td.innerHTML+'</option>'+
					xmlhttp.responseText.trim() + '</select>'+" " +
					'<input type="image" style="width:10px; height:10px; position:relative; top:5px" src="../art/ok.svg" onclick="actualizarRegistroDependencia('+numReg+','+selId+'.value,\''+campo+'\')">'+" "+
    			'<input type="image" style="width:10px; height:10px; position:relative; top:5px" src="../art/cancelar.svg" onclick="cancelarAccionDependencia()">';

	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(selId);
	obj.focus();
	if(obj.value!==""){
		obj.value+="";	
	}
				
}

function actualizarInputDependencia(tdId,numReg,campo,inpId){	
	//alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionDependencia();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:10px; height:10px; position:relative; top:5px; color:green" src="../art/ok.svg" onclick="actualizarRegistroDependencia('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:10px; height:10px; position:relative; top:5px" src="../art/cancelar.svg" onclick="cancelarAccionDependencia()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!==""){
		obj.value+="";
	}	
}

function actualizarRegistroDependencia(id,valor,campo){
	//alert(id+", "+valor+", "+campo);
  valor=ucwords(valor.toLowerCase());
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdDependencias/04-actualizarDependencia.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	xmlhttp.open("GET","../bdDependencias/02-cargarDependencias.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML="";
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function cancelarAccionDependencia(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdDependencias/02-cargarDependencias.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML="";
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroDependencia(id){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdDependencias/05-eliminarDependencia.php?codDependencia="+id,false);
	xmlhttp.send();
	alert("El registro "+id+" fue eliminado con éxito.");
	xmlhttp.open("GET","../bdDependencias/02-cargarDependencias.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML="";
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}