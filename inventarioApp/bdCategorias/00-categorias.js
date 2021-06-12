function showHint(str) {
	str=str.toUpperCase();
	document.getElementById("grupoN").value=str;
	if (str.length == 0) { 
        document.getElementById("hint").innerHTML = "";
        return;
    }else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","gethint.php?q="+str, false);
        xmlhttp.send();
        document.getElementById("hint").innerHTML = "Grupos ya registrados: <br>"+xmlhttp.responseText;
    }
}

function ordenarCategorias(filtro){
	//alert(filtro);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdCategorias/02-cargarCategoriasBienes.php?ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function registrarCategoria(){
	var clase= document.getElementById("clase").value;
	var categoria = document.getElementById("categoria").value;

	function incialMayuscula(string){
	  return string.charAt(0).toUpperCase() + string.slice(1);
	}
	categoria=incialMayuscula(categoria.toLowerCase());

	//alert(clase);
	//alert(categoria);

	if(clase==="Clase..."){
		alert("Por favor, seleccione una clase de bien.");
		document.getElementById("clase").focus();
		return false;
	}else if(categoria==""){
		alert("Por favor, ingrese una categoría. Por ejemplo, \"Silla\".");
		document.getElementById("categoria").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdCategorias/03-crearCategoria.php?clase="+clase+"&categoria="+categoria, false);
    	xmlhttp.send();
	    if(xmlhttp.responseText.trim()=="si"){
	    	//alert("La categoría "+categoria+" fue registrada con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdCategorias/02-cargarCategoriasBienes.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("La categoría "+categoria+" ya está registrada.");
        	document.getElementById("clase").value="";
        	document.getElementById("categoria").value="";
    		document.getElementById("clase").focus();
    		return false;
        }    
	}		
}

function actualizarSeleccionCategoria(tdId,numReg,campo,selId){
	//alert(tdId+", "+numReg+", "+campo+", "+selId);

	cancelarAccionCategoria();	
	
	var td=document.getElementById(tdId);	

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdCategorias/02-cargarClases.php?actual="+td.innerHTML,false);
	xmlhttp.send();
	
	var contenido =	'<select name="clase" id="'+selId+'"><option>'+td.innerHTML+'</option>'+
					xmlhttp.responseText.trim() + '</select>'+" " +
					'<input type="image" style="width:15px; height:15px; color:green" src="../art/ok.svg" onclick="actualizarRegistroCategoria('+numReg+','+selId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px" src="../art/cancelar.svg" onclick="cancelarAccionCategoria()">';

	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(selId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";	
	}			
}

function actualizarInputCategoria(tdId,numReg,campo,inpId){
	
	cancelarAccionCategoria();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:15px; height:15px; color:green" src="../art/ok.svg" onclick="actualizarRegistroCategoria('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px" src="../art/cancelar.svg" onclick="cancelarAccionCategoria()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}

function actualizarRegistroCategoria(id,valor,campo){
	//alert(id+", "+valor+", "+campo);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdCategorias/04-actualizarCategoria.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdCategorias/02-cargarCategoriasBienes.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionCategoria(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdCategorias/02-cargarCategoriasBienes.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroCategoria(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdCategorias/05-eliminarCategoria.php?codCategoria="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdCategorias/02-cargarCategoriasBienes.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}