function ordenarClases(filtro){
	//alert(filtro);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdClasesBienes/02-cargarClasesBienes.php?ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function registrarClaseBien(){
	var claseBien= document.getElementById("claseBien").value;
  
  claseBien=ucwords(claseBien.toLowerCase());

	//alert(claseBien);

	if(claseBien==""){
		alert("Por favor, ingrese una clase de bien. Por ejemplo, \"Muebles\".");
		document.getElementById("claseBien").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdClasesBienes/03-crearClaseBien.php?claseBien="+claseBien, false);
    	xmlhttp.send();
	    if(xmlhttp.responseText.trim()=="si"){
	    	//alert("La clase de bien "+claseBien+" fue registrada con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdClasesBienes/02-cargarClasesBienes.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("La clase de bien "+claseBien+" ya está registrada.");
        	document.getElementById("almacenamiento").value="";
    		document.getElementById("almacenamiento").focus();
    		return false;
        }    
	}		
}

function actualizarInputClase(tdId,numReg,campo,inpId){
	//alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionClase();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:10px; height:10px; position:relative; top:5px" src="../art/ok.svg" onclick="actualizarRegistroClase('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:10px; height:10px; position:relative; top: 5px" src="../art/cancelar.svg" onclick="cancelarAccionClase()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}

function actualizarRegistroClase(id,valor,campo){
	//alert(id+", "+valor+", "+campo);  
	valor=ucwords(valor.toLowerCase());
	//alert(valor);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdClasesBienes/04-actualizarClaseBien.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdClasesBienes/02-cargarClasesBienes.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionClase(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdClasesBienes/02-cargarClasesBienes.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroClase(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdClasesBienes/05-eliminarClaseBien.php?codClase="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdClasesBienes/02-cargarClasesBienes.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}