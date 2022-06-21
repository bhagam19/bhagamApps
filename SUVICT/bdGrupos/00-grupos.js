function ordenarGrupo(o,filtro){
	//alert(o+", "+filtro);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdGrupos/02-cargarGrupos.php?o="+o+"&ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function confirmarAccionGrupos(accion,id,valor,campo,q){
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
				eliminarRegistroGrupo(id);
			}
	}
}

function registrarGrupo(){	

	var grupo= document.getElementById("grupo").value;

	// alert(grupo);

	grupo=grupo.toUpperCase();

	if(grupo==""){
		alert("Por favor, ingrese un nombre de grupo. Por ejemplo, \"03A\".");
		document.getElementById("grupo").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdGrupos/03-crearGrupo.php?grupo="+grupo, false);
    	xmlhttp.send();
	    if(xmlhttp.responseText.trim()=="si"){
	    	//alert("La opción de grupo "+grupo+" fue registrada con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdGrupos/02-cargarGrupos.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("La opción de grupo "+grupo+" ya está registrada.");
        	document.getElementById("grupo").value="";
    		document.getElementById("grupo").focus();
    		return false;
        }    
	}		
}

function actualizarInputGrupo(tdId,numReg,campo,inpId){
	//alert(tdId+", "+numReg+", "+campo+", "+inpId);
	cancelarAccionGrupo();

	var td=document.getElementById(tdId);
	var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'">'+" "+
		   			'<input type="image" style="width:15px; height:15px" src="../art/ok.svg" onclick="actualizarRegistroGrupo('+numReg+','+inpId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px" src="../art/cancelar.svg" onclick="cancelarAccionGrupo()">';
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";
	}	
}

function actualizarRegistroGrupo(id,valor,campo){
	//alert(id+", "+valor+", "+campo);
	valor=valor.toUpperCase();
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdGrupos/04-actualizarGrupo.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdGrupos/02-cargarGrupos.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionGrupo(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdGrupos/02-cargarGrupos.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroGrupo(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdGrupos/05-eliminarGrupo.php?cod="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdGrupos/02-cargarGrupos.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}