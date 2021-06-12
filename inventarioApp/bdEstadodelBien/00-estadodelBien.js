function ordenarEstadodelBien(filtro){
	//alert(filtro);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdEstadodelBien/02-cargarEstados.php?ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function registrarEstadodelBien(){
	var estadoDelBien= document.getElementById("estadoDelBien").value;

	estadoDelBien=estadoDelBien.toUpperCase();

	//alert(clase);
	//alert(categoria);

	if(estadoDelBien==""){
		alert("Por favor, ingrese un tipo de estado para los bienes. Por ejemplo, \"NUEVO\".");
		document.getElementById("estadoDelBien").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdEstadodelBien/03-crearEstadodelBien.php?estadoDelBien="+estadoDelBien, false);
    	xmlhttp.send();
	    if(xmlhttp.responseText.trim()=="si"){
	    	//alert("El tipo de estado para los bienes "+estadoDelBien+" fue registrado con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdEstadodelBien/02-cargarEstados.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("El tipo de estado para los bienes "+estadoDelBien+" ya está registrada.");
        	document.getElementById("estadoDelBien").value="";
    		document.getElementById("estadoDelBien").focus();
    		return false;
        }    
	}		
}

function actualizarInputEstadodelBien(tdId,numReg,campo,inpId){
	//alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionEstadodelBien();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:10px; height:10px; position:relative; top:5px" src="../art/ok.svg" onclick="actualizarRegistroEstadodelBien('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:10px; height:10px; position:relative; top:5px" src="../art/cancelar.svg" onclick="cancelarAccionEstadodelBien()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}

function actualizarRegistroEstadodelBien(id,valor,campo){
	valor=valor.toLowerCase().replace(/\b\w/g, l => l.toUpperCase());
	//alert(id+", "+valor+", "+campo);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdEstadodelBien/04-actualizarEstadodelBien.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdEstadodelBien/02-cargarEstados.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionEstadodelBien(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdEstadodelBien/02-cargarEstados.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroEstadodelBien(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdEstadodelBien/05-eliminarEstadodelBien.php?codEstado="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdEstadodelBien/02-cargarEstados.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}