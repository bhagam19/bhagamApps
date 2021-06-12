function cargarAsignacionAcademica(){
	start();
	document.getElementById("mensajeEspera").style.visibility='visible';

	$.ajax({
        type: "POST",
        url: 'cargarAsignacionAcademicaBD.php',
        // async:false,
        data: {
        	'url': url
        },
        success: function(resp){
        	// alert("Entra: "+resp);
            document.getElementById("contenedor").innerHTML="";
            document.getElementById("contenedor").innerHTML=resp;
            document.getElementById("mensajeEspera").style.visibility='hidden';            		
        }
    });
}

function ordenarAsignacionAcademica(o,filtro){
	//alert(o+", "+filtro);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAsignacionAcademica/02-cargarAsignacionAcademica.php?o="+o+"&ordenarPor="+filtro,false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function confirmarAccionAsignacionAcademica(accion,id,valor,campo,q){
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
				eliminarRegistroAsignacionAcademica(id);
			}
	}
}

function registrarAsignacionAcademica(){	

	var docente= document.getElementById("docente").value;
	var asignatura= document.getElementById("asignatura").value;
	var grupo= document.getElementById("grupo").value;

	// alert(docente+", "+asignatura+", "+grupo);

	if(docente=="Docente..."){
		alert("Por favor, seleccione un docente de la lista.");
		document.getElementById("docente").focus();
		return false;
	}else if(asignatura=="Asignatura..."){
		alert("Por favor, seleccione una asignatura de la lista.");
		document.getElementById("asignatura").focus();
		return false;
	}else if(grupo=="Grupo..."){
		alert("Por favor, seleccione un grupo de la lista.");
		document.getElementById("grupo").focus();
		return false;	
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdAsignacionAcademica/03-crearAsignacionAcademica.php?docente="+docente+"&asignatura="+asignatura+"&grupo="+grupo, false);
    	xmlhttp.send();

    	// alert(xmlhttp.responseText.trim());

	    if(xmlhttp.responseText.trim()=="si"){
	    	xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdAsignacionAcademica/02-cargarAsignacionAcademica.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	

			alert("La asignacionAcademica fue registrada con éxito.");

        }else{
        	alert("Esta asignación ya está hecha en el registo "+xmlhttp.responseText.trim()+".");
        	//document.getElementById("id").value="";
    		document.getElementById("docente").focus();
    		return false;
        }    
	}		
}

function actualizarSeleccionAsignacionAcademica(tdId,numReg,campo,selId,value,tabla,campo2){
	// alert(tdId+", "+numReg+", "+campo+", "+selId+", "+value+", "+tabla+", "+campo2);
	
	cancelarAccionAsignacionAcademica();
	
	var td=document.getElementById(tdId);	

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAsignacionAcademica/02.1-cargarListasAsignacionAcademica.php?actual="+td.innerHTML+"&tabla="+tabla+"&campo2="+campo2,false);
	xmlhttp.send();

	//alert(xmlhttp.responseText.trim());
	
	var contenido =	'<select name="'+selId+'" id="'+selId+'"><option value='+value+'>'+td.innerHTML+'</option>'+
					xmlhttp.responseText.trim() + '</select>'+" " +
					'<input type="image" style="width:15px; height:15px" src="../art/ok.svg" onclick="actualizarRegistroAsignacionAcademica('+numReg+','+selId+'.value,\''+campo+'\')">'+" "+
    				'<input type="image" style="width:15px; height:15px" src="../art/cancelar.svg" onclick="cancelarAccionAsignacionAcademica()">';

	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(selId);
	obj.focus();
	if(obj.value!=""){
		obj.value+="";	
	}
}

function actualizarRegistroAsignacionAcademica(id,valor,campo){
	// alert(id+", "+valor+", "+campo);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdAsignacionAcademica/04-actualizarAsignacionAcademica.php?id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAsignacionAcademica/02-cargarAsignacionAcademica.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
}

function cancelarAccionAsignacionAcademica(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAsignacionAcademica/02-cargarAsignacionAcademica.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function eliminarRegistroAsignacionAcademica(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAsignacionAcademica/05-eliminarAsignacionAcademica.php?cod="+id,false);
	xmlhttp.send();
		
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAsignacionAcademica/02-cargarAsignacionAcademica.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML=""
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}

function ucwords(f){
    return f.replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function($1){
       return $1.toUpperCase(); 
    });
}