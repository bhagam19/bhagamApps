function averiguarDimensionPantalla(){
	alert("La resolución de tu pantalla es: " + screen.width + " x " + screen.height);
}
function ordenarBien(q,d,c){
	// alert(d+", "+c);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdBienes/01.00-cargarArchivos.php"+q+"&d="+d+"&o="+c,false);
	xmlhttp.send();
	document.getElementById("contenedorTablaBienes").innerHTML="";
	document.getElementById("contenedorTablaBienes").innerHTML=xmlhttp.responseText.trim();	
}
function aplicarFiltros(q,f,v){
	//alert(f+", "+v);	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdBienes/01.00-cargarArchivos.php"+q+"&"+f+"="+v,false);
	xmlhttp.send();
	document.getElementById("contenedorTablaBienes").innerHTML="";
	document.getElementById("contenedorTablaBienes").innerHTML=xmlhttp.responseText.trim();	
}
function actualizarSeleccionBien(tdId,numReg,campo1,selId,value,tabla,campo2,q,c){
	//alert(tdId+", "+numReg+", "+campo1+", "+selId+", "+value+", "+tabla+", "+campo2+", "+q);
	
	cancelarAccionBien(q);
	
	var td=document.getElementById(tdId);
	var texto="";

	inicio=td.innerHTML.indexOf(">");
	texto=td.innerHTML.substring(inicio+1,td.innerHTML.length);

	/*
	img1=td.innerHTML.substring(0,4);
	img2='<img';	
	

	if(campo1=="codEstado"){
		if(img1==img2){ //Se revisa que el contenido de la celda no inicie con una imagen.
			inicio=td.innerHTML.indexOf(">");
			texto=td.innerHTML.substring(inicio+1,td.innerHTML.length);
		}else{
			texto=td.innerHTML;
		}	

		if(texto.length>9){
			texto=texto.substring(0,texto.length-15);
		}

	}else{
		if(img1==img2){ //Se revisa que el contenido de la celda no inicie con una imagen.
			inicio=td.innerHTML.indexOf(">");
			texto=td.innerHTML.substring(inicio+1,td.innerHTML.length);
		}else{
			texto=td.innerHTML;
		}	
	}
	*/
	//alert(texto);

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdBienes/02-cargarListasBienes.php?actual="+texto+"&tabla="+tabla+"&campo1="+campo1+"&campo2="+campo2,false);
	xmlhttp.send();

	// alert(xmlhttp.responseText.trim());
	
	var contenido =	'<select name="'+selId+'" id="'+selId+'" style="width:'+c+'; height:19px;color:gray;font-weight:bold;font-size:9px;font-family:‘Lucida Console’, Monaco, monospace;"><option value='+value+'>'+texto+'</option>'+
					xmlhttp.responseText.trim() + '</select>'+" " +
					'<input type="image" style="width:10px; height:10px;position:relative;top:5px" src="../art/ok.svg" onclick="actualizarRegistroBien('+numReg+','+selId+'.value,\''+campo1+'\',\''+q+'\')">'+" "+
    			'<input type="image" style="width:10px; height:10px;position:relative;top:5px" src="../art/cancelar.svg" onclick="cancelarAccionBien(\''+q+'\')">';
    // alert(contenido);				
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(selId);
	obj.focus();
	if(obj.value!==""){
		obj.value+="";	
	}
}
function actualizarInputBien(tdId,numReg,campo,inpId,q,px,event){
	
	//alert(tdId+", "+numReg+", "+campo+", "+inpId+", "+q);
	cancelarAccionBien(q);

	var td=document.getElementById(tdId);	
	var y = event.clientY;
	var texto="";
	
	inicio=td.innerHTML.indexOf(">");
	texto=td.innerHTML.substring(inicio+1,td.innerHTML.length);
	
	/*	
	img1=td.innerHTML.substring(0,4);
	img2='<img';

	if(img1==img2){//Se revisa que el contenido de la celda no inicie con una imagen.
		inicio=td.innerHTML.indexOf(">");
		texto=td.innerHTML.substring(inicio+1,td.innerHTML.length);
	}else{
		texto=td.innerHTML;
	}	
	*/
	
	
	if(campo==='precio'){
		texto=(texto.substring(1,texto.length-3)).replace(/,/g,""); // Se toma el valor actual y se le quita el signo pesos.
	}
	var contenido="";
	if(campo==='observaciones'){
		contenido =	'<textarea id="'+inpId+'" value="'+texto+'" style="width:'+px+'; height:12px;color:#2D3D9F;font-weight:normal;font-size:10px;" onkeyup="sugerirObservaciones2(this.value,this.id,'+y+')">'+texto+'</textarea>'+" "+
		   			'<input type="image" style="width:10px; height:10px;position:relative;top:0px" src="../art/ok.svg" onclick="actualizarRegistroBien('+numReg+','+inpId+'.value,\''+campo+'\',\''+q+'\')">'+" "+
    				'<input type="image" style="width:10px; height:10px;position:relative;top:0px" src="../art/cancelar.svg" onclick="cancelarAccionBien(\''+q+'\')">';
	}else if(campo==='fechaAdquisicion'){
		contenido =	'<input type="date" id="'+inpId+'" value="'+texto+'" style="width:100px; height:10px;color:#2D3D9F;font-weight:normal;font-size:10px">'+" "+
		   			'<input type="image" style="width:10px; height:10px;position:relative;top:4px" src="../art/ok.svg" onclick="actualizarRegistroBien('+numReg+','+inpId+'.value,\''+campo+'\',\''+q+'\')">'+" "+
    				'<input type="image" style="width:10px; height:10px;position:relative;top:4px" src="../art/cancelar.svg" onclick="cancelarAccionBien(\''+q+'\')">';
  }else{
		contenido =	'<input type="text" id="'+inpId+'" value="'+texto+'" style="width:'+px+'; height:10px;color:#2D3D9F;font-weight:normal;font-size:10px;">'+" "+
		   			'<input type="image" style="width:10px; height:10px;position:relative;top:4px" src="../art/ok.svg" onclick="actualizarRegistroBien('+numReg+','+inpId+'.value,\''+campo+'\',\''+q+'\')">'+" "+
    				'<input type="image" style="width:10px; height:10px;position:relative;top:4px" src="../art/cancelar.svg" onclick="cancelarAccionBien(\''+q+'\')">';
  }
	//alert(contenido);
	td.innerHTML=contenido;
	td.onclick="";
	var obj =document.getElementById(inpId);
	obj.focus();
	if(obj.value!==""){
		obj.value+="";
	}	
	
}
function confirmarAccion(tipo,id,valor,campo,q){
	//alert(q);
	var confirmacion;
	if(tipo===1){
		confirmacion=confirm("¿Con seguridad desea aprobar el cambio?");
		if(confirmacion){
			actualizarRegistroBien(id,valor,campo,q);
		}
	}else{
		confirmacion=confirm("¿Con seguridad desea rechazar el cambio?");
		if(confirmacion){
			actualizarRegistroBien(id,valor,campo,q);
		}
	}
}
function actualizarRegistroBien(id,valor,campo,q){
	// alert(id+", "+valor+", "+campo+", "+q);
	valor=ucwords(valor.toLowerCase());
  
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdBienes/04-actualizarBien.php"+q+"&id="+id+"&valor="+valor+"&campo="+campo, false);
	xmlhttp.send();

	// alert(xmlhttp.responseText.trim());

	var n = q.search("uP");
	n = parseInt(q.substring(n+3,n+4));

	if(n===6){

		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", "../bdBienes/consultarPorModificaciones.php", false);
		xmlhttp.send();

		//alert(xmlhttp.responseText.trim());

		var rows = xmlhttp.responseText.trim();

		if(rows>=1){
			q = q + "&cMod=1";
		}
	//alert(q);
	}	
	
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdBienes/01.00-cargarArchivos.php"+q,false);
	xmlhttp.send();
	document.getElementById("contenedorTablaBienes").innerHTML="";
	document.getElementById("contenedorTablaBienes").innerHTML=xmlhttp.responseText.trim();
}
function cambiarFondoInput(id){//Esta función reestablece el color del fondo de un input después de haberse puesto rojo como validación de dato fatante o equivocado.
	//alert(id);
	document.getElementById(id).style.boxShadow="0 1px 1px rgba(47, 144, 14, 0.075)inset, 0 0 8px rgba(96, 228, 51,0.6)";
}
function agregarBien(qry,id,nomBien,cEspecial,cTamano,material,color,marca,otra,estBien,tipoInv,depend,origen,fecha,precio,cant,almacen,mant,observ){
	//alert("hola");
	//alert(qry+", "+id);	
	//alert(id+", "+nomBien+", "+cEspecial+", "+cTamano+", "+material+", "+color+", "+marca+", "+otra+", "+estBien+", "+tipoInv+", "+depend+", "+origen+", "+fecha+", "+precio+", "+cant+", "+almacen+", "+mant+", "+observ);
	nomBien=ucwords(nomBien.toLowerCase());
	cEspecial=ucwords(cEspecial.toLowerCase());
	cTamano=ucwords(cTamano.toLowerCase());
	material=ucwords(material.toLowerCase());
	color=ucwords(color.toLowerCase());
	marca=ucwords(marca.toLowerCase());
	otra=ucwords(otra.toLowerCase());
	origen=ucwords(origen.toLowerCase());
	observ=ucwords(observ.toLowerCase());  
  	if(nomBien===""){
		alert("Por favor, ingrese el nombre del bien.");
		document.getElementById("inputNomBien").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("inputNomBien").focus();
		return false;
	}else if(estBien===""){
		alert("Por favor, seleccione el Estado del Bien.");
		document.getElementById("selEstBien").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("selEstBien").focus();
		return false;
	}else if(tipoInv===""){
		alert("Por favor, seleccione el Tipo de Inventario.");
		document.getElementById("selTipoInv").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("selTipoInv").focus();
		return false;
	}else if(depend===""){
		alert("Por favor, seleccione la Dependencia.");
		document.getElementById("selDep").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("selDep").focus();
		return false;
	}else if(origen===""){
		alert("Por favor, ingrese el origen del bien. Si no lo sabe escriba '-'.");
		document.getElementById("inputOrigen").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("inputOrigen").focus();
		return false;
	}else if(precio===""){
		alert("Por favor, ingrese el Precio del bien. Si no lo sabe escriba '0'.");
		document.getElementById("inputPrecio").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("inputPrecio").focus();
		return false;
	}else if(cant===""){
		alert("Por favor, ingrese la Cantidad");
		document.getElementById("inputCant").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("inputCant").focus();
		return false;
	}else if(almacen===""){
		alert("Por favor, ingrese el Estado de Uso");
		document.getElementById("selAlmacen").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("selAlmacen").focus();
		return false;
	}else if(mant===""){
		alert("Por favor, ingrese el Estado de Mantenimiento");
		document.getElementById("selMant").style.boxShadow="0 1px 10px #fd0101 inset, 0 0 8px #d80202";
		document.getElementById("selMant").focus();
		return false;
	}
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdBienes/03-crearBien.php?id="+id+"&nomBien="+nomBien+"&cEspecial="+cEspecial+"&cTamano="+cTamano+"&material="+material+"&color="+color+
													"&marca="+marca+"&otra="+otra+"&estBien="+estBien+"&tipoInv="+tipoInv+"&depend="+depend+"&origen="+origen+
													"&fecha="+fecha+"&precio="+precio+"&cant="+cant+"&almacen="+almacen+"&mant="+mant+"&observ="+observ, false);
	xmlhttp.send();
	//alert(xmlhttp.responseText);
	if(xmlhttp.responseText.trim()==="si"){
    	alert("El bien "+nomBien+" fue registrada con exito, con el número "+id+".");
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","../bdBienes/01.00-cargarArchivos.php"+qry,false);
		xmlhttp.send();
		document.getElementById("contenedorTablaBienes").innerHTML="";
		document.getElementById("contenedorTablaBienes").innerHTML=xmlhttp.responseText.trim();  
		var v =$('#formEditBienes').css('visibility');
		if(v!=='hidden') {			
			$('#formEditBienes').css('visibility', 'hidden');
		}else{  	
			var x=event.clientX;
			var y=event.clientY;
			//alert("x: "+x+" || y:"+y);
			$('#formEditBienes').css('visibility', 'visible');
			$('#formEditBienes').css('top', "95px");
			$('#formEditBienes').css('left', "50px");	    
		}	 
	}else{
		alert("El bien "+nomBien+" no se pudo guardar. Por favor, inténtelo de nuevo.");
    }
    var v =$('#formEditBienes').css('visibility');
    if(v!=='hidden') {			
	    $('#formEditBienes').css('visibility', 'hidden');
	  }else{  	
	  	var x=event.clientX;
	 	var y=event.clientY;
	 	//alert("x: "+x+" || y:"+y);
	    $('#formEditBienes').css('visibility', 'visible');
	    $('#formEditBienes').css('top', "95px");
	    $('#formEditBienes').css('left', "50px");	    
	  }		
}
function cancelarAccionBien(q){
	// alert(q);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdBienes/01.00-cargarArchivos.php"+q,false);
	xmlhttp.send();
	document.getElementById("contenedorTablaBienes").innerHTML="";
	document.getElementById("contenedorTablaBienes").innerHTML=xmlhttp.responseText.trim();
}
function registrarAlmacenamiento(){
	var almacenamiento= document.getElementById("almacenamiento").value;

	almacenamiento=almacenamiento.toUpperCase();

	//alert(clase);
	//alert(categoria);

	if(almacenamiento===""){
		alert("Por favor, ingrese una opción de almacenamiento. Por ejemplo, \"En uso\".");
		document.getElementById("almacenamiento").focus();
		return false;
	}else{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "../bdAlmacenamiento/03-crearAlmacenamiento.php?almacenamiento="+almacenamiento, false);
    	xmlhttp.send();
	    if(xmlhttp.responseText.trim()==="si"){
	    	//alert("La opción de almacenamiento "+almacenamiento+" fue registrada con exito.");
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","../bdAlmacenamiento/02-cargarOpcionesAlmacenamiento.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML="";
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
        }else{
        	alert("La opción de almacenamiento "+almacenamiento+" ya está registrada.");
        	document.getElementById("almacenamiento").value="";
    		document.getElementById("almacenamiento").focus();
    		return false;
        }    
	}		
}
function eliminarRegistroAlmacen(id){
	//alert(id);
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdAlmacenamiento/05-eliminarAlmacenamiento.php?codAlmacenamiento="+id,false);
	xmlhttp.send();
		

	xmlhttp.open("GET","../bdAlmacenamiento/02-cargarOpcionesAlmacenamiento.php",false);
	xmlhttp.send();
	document.getElementById("actualizable").innerHTML="";
	document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
}
function sugerirBienes(input){
	var key = input;
	var dataString = 'key='+key;
	$.ajax({
            type: "POST",
            url: "../bdBienes/03.02-cargarSugerenciasBienes.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(500).html(data);
                $('#suggestions').css('top','60px');
                $('#suggestions').css('left','146px');
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#inputNomBien').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(100);
                        //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                        return false;
                });
            }
    });    
}
function sugerirOrigen(input){
	var key = input;
	var dataString = 'key='+key;
	$.ajax({
            type: "POST",
            url: "../bdBienes/03.02-cargarSugerenciasOrigen.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(500).html(data);
                $('#suggestions').css('top','139px');
                $('#suggestions').css('left','398px');
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#inputOrigen').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(100);
                        //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                        return false;
                });
            }
    });    
}
function sugerirObservaciones(input){
	//alert(input);
	var key = input;
	var dataString = 'key='+key;
	$.ajax({
            type: "POST",
            url: "../bdBienes/03.02-cargarSugerenciasObservaciones.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(500).html(data);
                $('#suggestions').css('top','295px');
                $('#suggestions').css('left','146px');
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#inputObserv').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(100);
                        //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                        return false;
                });
            }
    });    
}
function sugerirObservaciones2(input,idd,y){
	//alert("input: "+input+", id: " +idd);
	var key = input;
	var dataString = 'key='+key;
	var idd=idd;
	var y=y;
	var sY=$('#contenedor').scrollTop();
	//	alert(y);
	$.ajax({
            type: "POST",
            url: "../bdBienes/03.02-cargarSugerenciasObservaciones.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions2').fadeIn(500).html(data);
                $('#suggestions2').css('top',sY+y-40+'px');
                $('#suggestions2').css('left','2091px');
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        // alert(idd+", "+id);
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#'+idd).val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions2').fadeOut(100);
                        //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                        return false;
                });
            }
    });    
}
function buscarDatos(consulta,u,uID,uP){ 
	//alert(consulta+", "+u+", "+uID+", "+uP);
	$.ajax({
		url: '../bdBienes/01.00-cargarArchivos.php?u='+u+'&uID='+uID+'&uP='+uP,
		type: 'POST',
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta) {
		$("#contenedorTablaBienes").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	})	
}
function buscarBienes(busqueda,u,uID,uP,boton){
	// alert(busqueda);
	if(event.keyCode==13||boton==1){
		
		if(busqueda!=" "){
			buscarDatos(busqueda,u,uID,uP);
		}else{
			buscarDatos();
		}
	}
}
function mostrarEdicionDetalles(event,dCB,dNB,dDB,q){
	//alert(dNB+"," +dDB+"," +q);	
	var v =$('#formEditDet').css('visibility');
	var x=event.clientX;
	var y=event.clientY;
	var sY=$('#contenedor').scrollTop();
	//alert(sY);
	var h=parseInt($('#formEditDet').css('height').substr(0,3));
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdBienes/04.01-formularioEditarDetalles.php"+q+"&id="+dCB,false);
	xmlhttp.send();
	// alert(xmlhttp.responseText.trim());
	document.getElementById("fEB").innerHTML="";
	document.getElementById("fEB").innerHTML=xmlhttp.responseText.trim();

	var detNomBien = document.getElementById("detNomBien");
	var detDetBien = document.getElementById("detDetBien");
	  detNomBien.innerHTML = "Registro No. "+dCB+": "+dNB;
	  detDetBien.innerHTML = dDB;

	if(v!='hidden') {			
	    $('#formEditDet').css('visibility', 'hidden');	    
	  }else{  	
	  	//alert("x: "+x+" || y:"+y);
	  	//alert("screen= "+screen.height+ " || y="+ y + " || h= "+ h +" || y+h: "+(y+h));
	  	$('#formEditDet').css('visibility', 'visible');
	  	$('#formEditDet').css('top', sY+y-42+"px");
	    $('#formEditDet').css('left', x-40+"px");
	  		  	
	  	// if((y+h)<(screen.height-180)){
	   //  	$('#formEditDet').css('top', sY+y-42+"px");
	   //  	$('#formEditDet').css('left', x-40+"px");
	  	// }else{
	  	// 	$('#formEditDet').css('top', sYy-292+"px");
	   //  	$('#formEditDet').css('left', x-40+"px");
	  	// }	  		    
	  }	 
}
function ucwords(f){
    return f.replace(/^([a-z\u00E0-\u00FC])|[\s()-]+([a-z\u00E0-\u00FC])/g, function($1){
       return $1.toUpperCase(); 
    });
}
function actualizarRegistroDetBien(q){
	//alert(q);
	var id=document.getElementById("detNomBien");
	id=(id.innerHTML.split(":")[0]).substring(12,id.innerHTML.length);
	var vlr1=ucwords(document.getElementById("carEspecial").value);
	var vlr2=ucwords(document.getElementById("tamano").value);
	var vlr3=ucwords(document.getElementById("material").value);
	var vlr4=ucwords(document.getElementById("color").value);
	var vlr5=ucwords(document.getElementById("marca").value);
	var vlr6=ucwords(document.getElementById("otra").value);
	// alert(id+"; "+vlr1+"; "+vlr2+"; "+vlr3+"; "+vlr4+"; "+vlr5+"; "+vlr6+"; "+q);
	//valor=valor.toUpperCase();
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "../bdBienes/04.02-actualizarDetBien.php?id="+id+"&vlr1="+vlr1+"&vlr2="+vlr2+"&vlr3="+vlr3+"&vlr4="+vlr4+"&vlr5="+vlr5+"&vlr6="+vlr6, false);
	xmlhttp.send();
	// alert(xmlhttp.responseText.trim());	
	var xmlhttp = new XMLHttpRequest();	
	xmlhttp.open("GET","../bdBienes/01.00-cargarArchivos.php"+q,false);
	xmlhttp.send();
	document.getElementById("contenedorTablaBienes").innerHTML=""
	document.getElementById("contenedorTablaBienes").innerHTML=xmlhttp.responseText.trim();
}
function mostrarEdicionBienes(event,q,tipo,eCB,u,uID,uP,eNB,eDB,eEB,eTI,eDp,eOr,eFA,ePr,eCnt,eAlm,eMant,eObs){	
	//alert(q+","+tipo+","+eCB+","+u+","+uID+","+uP);	
	var v =$('#formEditBienes').css('visibility');
	// alert($('#formEditBienes').css('visibility'));	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET","../bdBienes/03.01-formularioCrearBienes.php?&id="+eCB+"&u="+u+"&uID="+uID+"&uP="+uP,false);	
	xmlhttp.send();
	// alert(xmlhttp.responseText.trim());
	document.getElementById("fAB").innerHTML="";
	document.getElementById("fAB").innerHTML=xmlhttp.responseText.trim();
	if(tipo==1){
		var forCodBien = document.getElementById("forCodBien");
		forCodBien.innerHTML = "Registro No. "+eCB;
	}else if(tipo==2){
		var forCodBien = document.getElementById("forCodBien");
		var tdNomBien = document.getElementById("tdNomBien").colSpan = "2";;
		var spanNomBien = document.getElementById("spanNomBien");
		var inputNomBien = document.getElementById("inputNomBien");
		var tdDetBien=document.getElementById("tdDetBien");
		var selEstBien=document.getElementById("selEstBien");
		var selTipoInv=document.getElementById("selTipoInv");
		var selDep=document.getElementById("selDep");
		var inputOrigen=document.getElementById("inputOrigen");
		var inputFecha=document.getElementById("inputFecha");
		var inputPrecio=document.getElementById("inputPrecio");
		var inputCant=document.getElementById("inputCant");
		var selAlmacen=document.getElementById("selAlmacen");
		var selMant=document.getElementById("selMant");
		var inputObserv=document.getElementById("inputObserv");

		forCodBien.innerHTML = "Registro No. "+eCB+": "+eNB;
		spanNomBien.innerHTML="Descripción del Bien: ";
		inputNomBien.value=eDB;
		inputNomBien.style.width=580+"px";
		tdDetBien.innerHTML="";
		tdDetBien.style.width=0+"px";
		tdDetBien.style.background="white";
		selEstBien.value=eEB;
		selTipoInv.value=eTI;
		selDep.value=eDp;
		inputOrigen.value=eOr;
		inputFecha.value=eFA;
		inputPrecio.value=ePr;
		inputCant.value=eCnt;
		selAlmacen.value=eAlm;
		selMant.value=eMant;
		inputObserv.value=eObs;		
	}

	if(v!='hidden') {			
	    $('#formEditBienes').css('visibility', 'hidden');
	  }else{  	
	  	var x=event.clientX;
	 	var y=event.clientY;
	 	//alert("x: "+x+" || y:"+y);
	    $('#formEditBienes').css('visibility', 'visible');
	    $('#formEditBienes').css('top', "95px");
	    $('#formEditBienes').css('left', "50px");	    
	  }	 
}
(document).ready(function() {//mover formulario formEditDet
	$("#formEditDet").draggable({stack:"#formEditDet"}, {handle:"#formEditDetheader"});
});//mover formulario formEditDet

