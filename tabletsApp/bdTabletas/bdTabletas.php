<html style="background:#F2F2F2">
	<head>
		<title>Administración de Tabletas</title>
		<link rel="shortcut icon" href="../principal/tableta04.ico" />
		<link rel="stylesheet" type="text/css" href="../bdReservaciones/principal.css"/>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="../bdReservaciones/scripts.js"></script>
		<script type="text/javascript" src="../principal/acceso.js"></script>
	</head>
	
	<script>
		function registrarTableta(){
			var serial= document.getElementById("serial").value;
			if(serial===""){
				alert("Por favor, ingrese el nuevo serial.");
				document.getElementById("serial").focus();
				return false;
			}else{
				var xmlhttp = new XMLHttpRequest();
		        xmlhttp.open("GET", "../bdTabletas/crearTableta.php?serial="+serial, false);
	        	xmlhttp.send();
			    if(xmlhttp.responseText.trim()=="si"){
			    	alert("La tableta con el serial "+serial+" fue registrada con exito.");
					xmlhttp = new XMLHttpRequest();
					xmlhttp.open("GET","actualizarActualizable.php",false);
					xmlhttp.send();
					document.getElementById("actualizable").innerHTML=""
					document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
		        }else{
		        	alert("El serial "+serial+" ya está registrado. Intenta con otro serial.")
		        	document.getElementById("serial").value="";
		    		document.getElementById("serial").focus();
		    		return false;
		        }    
			}
		}
	</script>
	
	<?php
		session_name("presTablet");
	session_start();
		if(isset($_SESSION['usuario'])){
			$codigo=$_SESSION['permiso'];
			if($codigo==1){
				echo'
					<script>alert("Lo sentimos, no tiene permisos suficientes para esta opción.");</script>
					<html>
						<head>
							<meta HTTP-equiv=\'REFRESH\' content=\'0;url=principal/acceso.php\'>
						</head>
					</html>
					';
			}else{
				header('Content-Type: text/html; charset=UTF-8');
				include('../conexion/datosConexion.php');
				//Establecer y Ejecutar la consulta.
				echo '
        	<body style="width:850px;margin:0 auto;">
        		<h1>ADMINISTRACIÓN DE TABLETAS</h1>
            	<div id="volver">
            		<ul style="list-style:none;display:inline">
            			<li style="display:inline"><a href=\'../principal/acceso.php\'>Volver</a></li>
            		</ul>
            	</div>	
				<div id="contenedor" >
					<div class="formularioReservaciones" >
						<div>
    						<table border="1" style="width:40%;!important">
    							<caption> AGREGAR NUEVA TABLETA</caption>
    							<thead style="background:lightblue">
    								<tr>
    									<th>SERIAL</th>
    								</tr>
    							</thead>
    							<tbody style="background:lightgreen">
    					        	<tr>
        								<td style="text-align:center"><input type="text" name"serial" id="serial" style="width:200px"> 
        								<br>Por defecto, el estado de las tabletas es "Buena"</td>
        								
    								</tr>
    								<tr>
    									<td colspan="2" style="text-align:center">
    										<input value="Registrar" type="button" onclick="registrarTableta()" style="width:70px">
    										<input value="Cancelar" type="reset" style="width:70px">
    									</td>
    								</tr>
    							</tbody>
    						</table>
						</div></br>
    					<div style="height:380px;overflow:auto">
        					<table class="tabla" width="100%" >
        						<caption>TABLETAS REGISTRADAS ("Click" para actualizar.)</caption>
    							<thead>
    								<tr>
    									<th>ID</th>
    									<th>SERIAL</th>
    									<th>ESTADO</th>
    								</tr>
    							</thead>
        					<tbody id="actualizable">
    						';
	?>
	<script>
		function actualizarInput(tdId,numReg,campo,inpId){
			/*alert(tdId+", "+numReg+", "+campo+", "+inpId);*/
			var td=document.getElementById(tdId);
			var contenido =	'<input type="text" id="'+inpId+'" value="'+td.innerHTML+'"></br>'+
				   			'<input type="button" value="OK" onclick="actualizarRegistro('+numReg+','+inpId+'.value,\''+campo+'\')">'+
	        				'<input type="button" value="Cancelar" onclick="cancelarAccion()">';
			td.innerHTML=contenido;
			td.onclick="";
			var obj =document.getElementById(inpId);
			obj.focus();
			if(obj.value!=""){
				obj.value+="";
			}
			
		}
		function actualizarEstado(tdId,numReg,campo,selId){
			/*alert(tdId+", "+numReg+", "+campo+", "+selId);*/
			var td=document.getElementById(tdId);
			if(td.innerHTML=="Mala"){
			    var contenido =	'<select id="'+selId+'">'+
									'<option value="0" selected>Mala</option>'+
    				    			'<option value="1">Buena</option>'+
    					        '</select></br>'+
    					        '<input type="button" value="OK" onclick="actualizarRegistro('+numReg+','+selId+'.value,\''+campo+'\')">'+
	        					'<input type="button" value="Cancelar" onclick="cancelarAccion()">';
	        }else{
				var contenido =	'<select id="'+selId+'">'+
									'<option value="0">Mala</option>'+
    				    			'<option value="1" selected>Buena</option>'+
    					        '</select></br>'+
    					        '<input type="button" value="OK" onclick="actualizarRegistro('+numReg+','+selId+'.value,\''+campo+'\')">'+
	        					'<input type="button" value="Cancelar" onclick="cancelarAccion()">';
	        }
			
			td.innerHTML=contenido;
			td.onclick="";
		}
		function actualizarRegistro(id,valor,campo){
			/*alert(id+", "+valor+", "+campo);*/
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "actualizarTableta.php?id="+id+"&valor="+valor+"&campo="+campo, false);
			xmlhttp.send();
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","actualizarActualizable.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
			
		}
		function cancelarAccion(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","actualizarActualizable.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
		}
		function eliminarRegistro(id){
			/*alert(id);*/
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","eliminarTableta.php?id="+id,false);
			xmlhttp.send();
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","actualizarActualizable.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML=""
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
		}
	</script>
	<?php
		include('actualizarActualizable.php');
		echo '
							</tbody>
						    </table>
					    </div>
				    </div>
			    </div>	
			';
			}
		}else{
		    echo'
				<script>alert("Lo sentimos, no tiene permisos suficientes para esta opción.");</script>
				<html>
					<head>
						<meta HTTP-equiv=\'REFRESH\' content=\'0;url=../principal/acceso.php\'>
					</head>
				</html>
				';
		}
	//Cerrar la conexión.
	mysqli_close($conexion);
	?>
	
	       </body>
</html>