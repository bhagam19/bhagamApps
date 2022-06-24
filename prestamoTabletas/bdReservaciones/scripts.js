var nextinput = 0;
var cantidad;
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","../bdReservaciones/numerodeTabletas.php",false);
xmlhttp.send();
var totalTabletas = xmlhttp.response;

function validarFecha(fecha){ 
	
    var fechaMin = new Date();
    var valor1=fechaMin.valueOf();
    var fechaSeleccionada=document.getElementById("fecha").value;
    var valor2=Date.parse(fechaSeleccionada)+(12*60*60*1000);
    var diferencia=(valor2-valor1);
    var diferenciaMinima=((1000*60*60*7)+(1000*60*60*24*1));// 1 día y 7 horas. Las 0:00 de antier.
    
    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		
	var valorFechaSugerida =new Date(Date.parse(fechaSeleccionada)+(2*24*60*60*1000));
	var fechaSugerida=diasSemana[valorFechaSugerida.getDay()] + ", " + valorFechaSugerida.getDate() + " de " + meses[valorFechaSugerida.getMonth()] + " de " + valorFechaSugerida.getFullYear();
  	
  	var valorFechaSel =new Date(Date.parse(fechaSeleccionada)+(12*60*60*1000));
  	var fechaSel=diasSemana[valorFechaSel.getDay()] + ", " + valorFechaSel.getDate() + " de " + meses[valorFechaSel.getMonth()] + " de " + valorFechaSel.getFullYear();
	  		
    /*
    var msecPerMinute = 1000 * 60;
		var msecPerHour = msecPerMinute * 60;
		var msecPerDay = msecPerHour * 24;
    var diferencia=valor2-valor1;
    var dias=Math.floor(diferencia/msecPerDay);
    diferencia=diferencia-(dias*msecPerDay);
    var horas=Math.floor(diferencia/msecPerHour);
    diferencia=diferencia-(horas*msecPerHour);
    var minutos =Math.floor(diferencia/msecPerMinute);
    diferencia =diferencia-(minutos*msecPerMinute);
    var segundos = Math.floor(diferencia/1000);
    
    alert("La diferencia mínima debe ser de " +((1000*60*60*7)+(1000*60*60*24*1))+", y la diferencia actual es de "+(valor2-valor1)+", o sea: "+dias+" dias, "+horas+" horas, "+minutos+" minutos, "+segundos+" segundos.");
    */
    if(fechaSeleccionada==""){
    		alert("Por favor, primero ingrese la fecha de reservación.");
    }else{
    	if(diferencia<diferenciaMinima){
	  		alert("Los sentimos, la reservación para el "+fechaSel+" ya no es posible. "+ 
	  		"La reservación debe hacerse por lo menos con dos días de anticipación. "+
	  		"Intenta para reservar el "+fechaSugerida); 
	  		document.getElementById("fecha").value="";
	    }else{
	    	document.getElementById("fechaLarga").innerHTML=fechaSel;
	    	agregarCampos();
	    }
    }
  }
function agregarCampos(){
	if($("#fecha").val()!=""){
		if($("#campo"+nextinput).val()=="Hora..."){
	    	alert("Selecciona la hora de reserva.");
	    }else{
				nextinput++;
				if(nextinput>6){
					alert("Has alcanzado el límite de horas.");
				}else{
					
					var campo =	'<label class ="horas" style="left:-10px">'+
								'<span></span>'+
								'<select class="horas" type="text" onblur="revisarCantReservada(this.value)" style="height:20px;width:80px;margin:1px auto;display:block;" id="campo' + nextinput + '" name="campo' + nextinput + '">'+
									'<option value="Hora...">Hora...</option>'+
									'<option value="1a Hora">1a Hora</option>'+
									'<option value="2a Hora">2a Hora</option>'+
									'<option value="3a Hora">3a Hora</option>'+
									'<option value="4a Hora">4a Hora</option>'+
									'<option value="5a Hora">5a Hora</option>'+
									'<option value="6a Hora">6a Hora</option>'+
									'</select>'+
								'</label>';
					$("#campos").append(campo);
				}
		}
	}else{
		alert("Aún no ha seleccionado una fecha para reservaciones.")
	}
}
function reestablecerCampo(){
	/*
	for(var i=1;i<7;i++){
		$("#campo"+i).remove();
	}*/
	nextinput=0;
	document.getElementById("disponibles").innerHTML="";
	$("#idhoras").remove();
	var campo =	'<div id="idhoras">'+
					'<label>'+
							'<h3>Horas:</h3 >'+
							'<div id="campos" style="position:relative;left:30px;"></div>'+
					'</label>'+
					'<div>'+
						'<ul>'+
							'<li onclick="agregarCampos();" class="add">Añadir horas</li>'+
							'<li onclick="reestablecerCampo();" class="reset">Reestablecer</li>'+
						'<ul>'+
					'</div>'+
				'</div>';
	$("#eliminable").append(campo);
	
}
function reestablecerCampo2(){
	/*
	for(var i=1;i<7;i++){
		$("#campo"+i).remove();
	}*/
	nextinput=0;
	document.getElementById("disponibles").innerHTML="";
	$("#idhoras2").remove();
	var campo =	'<div id="idhoras2">'+
					'<div id="campos" style="position:relative;width:80px;top:20px;left:20px;"></div>'+
					'<div>'+
						'<ul>'+
							'<li onclick="agregarCampos();"  style="cursor:pointer" class="add">Añadir</li>'+
							'<li onclick="reestablecerCampo2();" style="cursor:pointer" class="reset">Reestablecer</li>'+
						'<ul>'+
					'</div>'+
				'</div>';
	$("#eliminable2").append(campo);
	
}
/*
function revisarHora(hora){
	
	var fecha= document.getElementById("fecha").value;
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            	alert(xmlhttp.responseText);
            	document.getElementById("disponibles").innerHTML=xmlhttp.responseText;
            }
        };
        
        xmlhttp.open("GET", "revisarHora.php?hora="+hora+"&fecha="+fecha+"&disponibles="+disponibles.innerHTML, true);
        xmlhttp.send();
        
        revisarCantReservada(hora,fecha);
        
}
*/
function revisarCantReservada(hora,fecha){
	var cant= document.getElementById("cantReservadas").value;
	var fecha= document.getElementById("fecha").value;
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "../bdReservaciones/averiguarCantidad.php?hora="+hora+"&fecha="+fecha+"&cant="+cant, false);
    xmlhttp.send();
    document.getElementById("cantReservadas").value=xmlhttp.response;
	document.getElementById("disponibles").innerHTML="Hay "+(totalTabletas-xmlhttp.response)+" tabletas disponibles.";
}
function validarFormulario(){
	var cantDisponible=totalTabletas-(document.getElementById("cantReservadas").value);
	/*alert($("#asignatura").val());*/
	if($("#nombre").val()=="Docente..."){
		alert("No ha ingresado nombre del Docente.");
		return false;
	}else if($("#asignatura").val()=="Asignatura..."){
		alert ("¿Qué asignatura vas a trabajar?");
		return false;
	}else if($("#grupo").val()=="Grupo..."){
		alert("¿Con cuál grupo vas a trabajar?");
		return false;
	}else if($("#fecha").val()==""){
		alert("¿Qué día vas a trabajar con las tabletas?");
		return false;
	}else if($("#campo1").val()=="Hora..."){
		alert("¿A qué horas vas a trabajar con las tabletas?");
		return false;
	}else if($("#cantidad").val()==""){
		alert("¿Cuántas tabletas vas a reservar?");
		return false;
	}else if($("#cantidad").val()>cantDisponible){
		alert("Revisa la cantidad de tabletas que solicitas. Solo hay "+cantDisponible+" disponibles.");
		return false;
	}else{
		var campo1;
		if($("#campo1").val()){
			campo1 = $("#campo1").val();
		}
		if($("#campo2").val()){
			campo1 = campo1 +", "+$("#campo2").val();
		}
		if($("#campo3").val()){
			campo1 = campo1 +", "+$("#campo3").val();
		}
		if($("#campo4").val()){
			campo1 = campo1 +", "+$("#campo4").val();
		}
		if($("#campo5").val()){
			campo1 = campo1 +", "+$("#campo5").val();
		}
		if($("#campo6").val()){
			campo1 = campo1 +", "+$("#campo6").val();
		}
		
		document.getElementById("horas").value=campo1;
		return true;
	}
}

function imprimir(){
	
	document.getElementById("firma").style.display='block';
	document.getElementById("firma2").style.display='block';
	document.getElementById("volver").style.display='none';
	window.print();
	document.getElementById("volver").style.display='block';
	document.getElementById("firma").style.display='none';
	document.getElementById("firma2").style.display='none';
	
}



