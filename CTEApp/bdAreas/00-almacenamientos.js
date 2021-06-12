function ordenarArea(filtro){
	//alert(filtro);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAreas/02-cargarAreas.php?ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function registrarArea(){
	var area= document.getElementById("area").value;

	area=area.toUpperCase();

	if(area==""){
		alert("Por favor, ingrese una opción de area. Por ejemplo, \"CIENCIAS SOCIALES\".");
		document.getElementById("area").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdAreas/03-crearArea.php?area="+area, false);
    	xmlhttp.send();
	    if(xmlhttp.responseText.trim()=="si"){
	    	//alert("La opción de area "+area+" fue registrada con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdAreas/02-cargarAreas.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("La opción de area "+area+" ya está registrada.");
        	document.getElementById("area").value="";
    		document.getElementById("area").focus();
    		return false;
        }    
	}		
}

function actualizarInputAlmacen(tdId,numReg,campo,inpId){
	//alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionAlmacen();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:15px; height:15px" src="../art/ok.svg" onclick="actualizarRegistroAlmacen('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px" src="../art/cancelar.svg" onclick="cancelarAccionAlmacen()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}

function actualizarRegistroAlmacen(id,valor,campo){
	//alert(id+", "+valor+", "+campo);
	valor=valor.toUpperCase();
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdAreas/04-actualizarArea.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAreas/02-cargarAreas.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionAlmacen(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAreas/02-cargarAreas.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroAlmacen(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAreas/05-eliminarAlmacenamiento.php?codAlmacenamiento="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAreas/02-cargarAreas.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}