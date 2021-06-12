	function ordenarMantenimiento(filtro){
	//alert(filtro);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdMantenimiento/02-cargarMantenimiento.php?ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function registrarMantenimiento(){
	var mantenimiento= document.getElementById("mantenimiento").value;

	mantenimiento=mantenimiento.toUpperCase();

	//alert(mantenimiento);

	if(mantenimiento==""){
		alert("Por favor, ingrese una opción de mantenimiento. Por ejemplo, \"AL DÍA\".");
		document.getElementById("mantenimiento").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdMantenimiento/03-crearMantenimiento.php?mantenimiento="+mantenimiento, false);
    	xmlhttp.send();
	    if(xmlhttp.responseText.trim()=="si"){
	    	//alert("La opción de mantenimiento "+mantenimiento+" fue registrada con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdMantenimiento/02-cargarMantenimiento.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("La opción de mantenimiento "+mantenimiento+" ya está registrada.");
        	document.getElementById("mantenimiento").value="";
    		document.getElementById("mantenimiento").focus();
    		return false;
        }    
	}		
}

function actualizarInputMantenimiento(tdId,numReg,campo,inpId){
	//alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionMantenimiento();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:10px; height:10px; position:relative; top:5px" src="../art/ok.svg" onclick="actualizarRegistroMantenimiento('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:10px; height:10px; position:relative; top:5px" src="../art/cancelar.svg" onclick="cancelarAccionMantenimiento()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}

function actualizarRegistroMantenimiento(id,valor,campo){
	//alert(id+", "+valor+", "+campo);
	valor=ucwords(valor.toLowerCase());
  
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdMantenimiento/04-actualizarMantenimiento.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdMantenimiento/02-cargarMantenimiento.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionMantenimiento(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdMantenimiento/02-cargarMantenimiento.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroMantenimiento(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdMantenimiento/05-eliminarMantenimiento.php?codMantenimiento="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdMantenimiento/02-cargarMantenimiento.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}