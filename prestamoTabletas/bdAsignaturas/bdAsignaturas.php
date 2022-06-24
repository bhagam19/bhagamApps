<html style="background:#F2F2F2">
	<head>
		<title>Administración de Asignaturas</title>
		<link rel="shortcut icon" href="../principal/tableta04.ico" />
		<link rel="stylesheet" type="text/css" href="../bdReservaciones/principal.css"/>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="../bdReservaciones/scripts.js"></script>
		<script type="text/javascript" src="../principal/acceso.js"></script>
	</head>
	
	<script>
		function showHint(str) {
			str=str.toUpperCase();
			document.getElementById("asignaturaN").value=str;
			if (str.length == 0) { 
		        document.getElementById("hint").innerHTML = "";
		        return;
		    }else{
		        var xmlhttp = new XMLHttpRequest();
		        xmlhttp.open("GET","gethint.php?q="+str, false);
		        xmlhttp.send();
		        document.getElementById("hint").innerHTML = "Asignaturas ya registradas: <br>"+xmlhttp.responseText;
		    }
		}
	
		function registrarAsignatura(){
			var asignatura= document.getElementById("asignaturaN").value;
			if(asignatura===""){
				alert("Por favor, ingrese una asignatura.");
				document.getElementById("asignaturaN").focus();
				return false;
			}else{
				var xmlhttp = new XMLHttpRequest();
		        xmlhttp.open("GET", "../bdAsignaturas/crearAsignatura.php?asignatura="+asignatura, false);
	        	xmlhttp.send();
			    if(xmlhttp.responseText.trim()=="si"){
			    	alert("La asignatura "+asignatura+" fue registrada con exito.");
					xmlhttp = new XMLHttpRequest();
					xmlhttp.open("GET","actualizarActualizable.php",false);
					xmlhttp.send();
					document.getElementById("asignaturaN").value="";
					document.getElementById("actualizable").innerHTML=""
					document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();	
		        }else{
		        	alert("La asignatura "+asignatura+" ya está registrada.")
		        	document.getElementById("asignaturaN").value="";
		    		document.getElementById("asignaturaN").focus();
		    		return false;
		        }    
			}
		}
	</script>
	
	<?php
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
        		<h1>ADMINISTRACIÓN DE ASIGNATURAS</h1>
            	<div id="volver">
            		<ul style="list-style:none;display:inline">
            			<li style="display:inline"><a href=\'../principal/acceso.php\'>Volver</a></li>
            		</ul>
            	</div>	
				<div id="contenedor" >
					<div class="formularioReservaciones" >
						<div>
    						<table border="1" style="width:60%;!important">
    							<caption> AGREGAR NUEVA ASIGNATURA</caption>
    							<thead style="background:lightblue">
    								<tr>
    									<th>ASIGNATURA</th>
    								</tr>
    							</thead>
    							<tbody style="background:lightgreen">
    					        	<tr>
        								<td style="text-align:left">
        									<input type="text" name"asignaturaN" id="asignaturaN" style="width:250px" onkeyup="showHint(this.value)">
        									<br><span id="hint"> </span>
        								</td>
    								</tr>
    								<tr>
    									<td colspan="2" style="text-align:center">
    										<input value="Registrar" type="button" onclick="registrarAsignatura()" style="width:70px">
    										<input value="Cancelar" type="reset" style="width:70px">
    									</td>
    								</tr>
    							</tbody>
    						</table>
						</div></br>
    					<div style="height:380px;overflow:auto">
        					<table class="tabla" width="100%" >
        						<caption>ASIGNATURAS REGISTRADAS ("Click" para actualizar.)</caption>
    							<thead>
    								<tr>
    									<th>ID</th>
    									<th>ASIGNATURA</th>
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
		function actualizarRegistro(id,valor,campo){
			/*alert(id+", "+valor+", "+campo);*/
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "actualizarAsignatura.php?id="+id+"&valor="+valor+"&campo="+campo, false);
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
			xmlhttp.open("GET","eliminarAsignatura.php?id="+id,false);
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