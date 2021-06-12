function ordenarAlmacen(filtro){
	//alert(filtro);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAlmacenamiento/02-cargarOpcionesAlmacenamiento.php?ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function registrarAlmacenamiento(){
	var almacenamiento= document.getElementById("almacenamiento").value;

	almacenamiento=almacenamiento.toUpperCase();

	//alert(clase);
	//alert(categoria);

	if(almacenamiento==""){
		alert("Por favor, ingrese una opción de almacenamiento. Por ejemplo, \"En uso\".");
		document.getElementById("almacenamiento").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdAlmacenamiento/03-crearAlmacenamiento.php?almacenamiento="+almacenamiento, false);
    	xmlhttp.send();
	    if(xmlhttp.responseText.trim()=="si"){
	    	//alert("La opción de almacenamiento "+almacenamiento+" fue registrada con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdAlmacenamiento/02-cargarOpcionesAlmacenamiento.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("La opción de almacenamiento "+almacenamiento+" ya está registrada.");
        	document.getElementById("almacenamiento").value="";
    		document.getElementById("almacenamiento").focus();
    		return false;
        }    
	}		
}

function actualizarInputAlmacen(tdId,numReg,campo,inpId){
	//alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionAlmacen();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:10px; height:10px; position:relative; top:5px" src="../art/ok.svg" onclick="actualizarRegistroAlmacen('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:10px; height:10px; position:relative; top:5px" src="../art/cancelar.svg" onclick="cancelarAccionAlmacen()">';
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
	valor=valor.toLowerCase().replace(/\b\w/g, l => l.toUpperCase());
  
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdAlmacenamiento/04-actualizarAlmacenamiento.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAlmacenamiento/02-cargarOpcionesAlmacenamiento.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionAlmacen(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAlmacenamiento/02-cargarOpcionesAlmacenamiento.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroAlmacen(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAlmacenamiento/05-eliminarAlmacenamiento.php?codAlmacenamiento="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAlmacenamiento/02-cargarOpcionesAlmacenamiento.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}