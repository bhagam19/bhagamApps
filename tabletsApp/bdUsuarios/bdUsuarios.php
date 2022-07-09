<html style="background:#F2F2F2">
	<head>
		<title>Administración de Usuarios</title>
		<link rel="shortcut icon" href="../principal/tableta04.ico" />
		<link rel="stylesheet" type="text/css" href="../bdReservaciones/principal.css"/>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="../bdReservaciones/scripts.js"></script>
		<script type="text/javascript" src="../principal/acceso.js"></script>
	</head>
	
	<?php
		session_name("tabletsApp");
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
        	
        		<h1>ADMINISTRACIÓN DE USUARIOS</h1>
        	<div id="volver">
        		<ul style="list-style:none;display:inline">
        			<li style="display:inline"><a href=\'../principal/acceso.php\'>Volver</a></li>
        		</ul>
        	</div>	
				<div id="contenedor" >
					<div class="formularioReservaciones" >
						<div>
						<table border="1" width="100%">
								<caption> AGREGAR NUEVO USUARIO</caption>
									<thead style="background:lightblue">
										<tr>
											<th>USUARIO</th>
											<th>CONTRASEÑA</th>
											<th>CONFIRMAR CONTRASEÑA</th>
											<th>DOCENTE</th>
										</tr>
									</thead>
								<tbody style="background:lightgreen">
						';
						$peticion1=mysqli_query($conexion,"SELECT * FROM docentes ORDER BY apellidos");
						$docentes=array();
						while($docente=mysqli_fetch_assoc($peticion1)){
							$docentes[$docente["docenteID"]] = $docente["apellidos"].' '.$docente["nombres"];
						}
						
						$peticion2=mysqli_query($conexion,"SELECT * FROM asignaturas ORDER BY asignaturaID");
						$asignaturas=array();
						while($asignatura=mysqli_fetch_assoc($peticion2)){
							$asignaturas[$asignatura["asignaturaID"]] = $asignatura["asignatura"];
						}
				        
				        $peticion3=mysqli_query($conexion,"SELECT * FROM grupos ORDER BY grupoID");
						$grupos=array();
						while($grupo=mysqli_fetch_assoc($peticion3)){
							$grupos[$grupo["grupoID"]] = $grupo["grupo"];
						}		
						$tabla = 'tabletas';
						$consulta = mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY tabletaID");
						
						echo
							'<tr>
								<form name="nuevoUsuario" method="POST" action="bdUsuarios.php" onsubmit="return registrarUsuario(1);">
								<td><input type="text" name"usuario" id="usuario" style="width:130px"></td>
								<td><input type="password" name"contrasena" id="contrasena"></td>
								<td><input type="password" name"confirmarContrasena" id="confirmarContrasena"></td>
								<td><select name="docente" id="docente">
								    <option>Docente...</option>
								    ';
								    foreach($docentes as $idd =>$docente){ 
										echo '
											<option value="'.$idd.'">'.$docente.'</option>
										';
									}
								echo'
								</select>    
								</td>
								</tr>
								<tr>
									<td colspan="4" style="text-align:center">
										<input value="Registrar" type="submit" style="width:70px">
										<input value="Cancelar" type="reset" style="width:70px">
									</td>
								</tr>
								</form>
							</tr> 
							</tbody>
						</table>
						</div>
							</br>
							
					<div style="height:400px;overflow:auto">
					<table class="tabla" width="100%" >
						<caption>USUARIOS REGISTRADOS ("Click" para actualizar.)</caption>
							<thead>
								<tr>
									<th>ID</th>
									<th>DOCENTE ID</th>
									<th>DOCENTE</th>
									<th>USUARIO</th>
									<th>PERMISO</th>
									
								</tr>
							</thead>
						<tbody id="actualizable">
						';
						
					$peticion1=mysqli_query($conexion,"SELECT * FROM docentes ORDER BY apellidos");
					$docentes=array();
					while($docente=mysqli_fetch_assoc($peticion1)){
						$docentes[$docente["docenteID"]] = $docente["apellidos"].' '.$docente["nombres"];
					}	
				?>
					<script>
						function actualizarDocente(id,num){//actualmente inhabilitada
							var td=document.getElementById(id);
							var contenido =	'<select onchange="actualizarRegistro('+num+',this.value,\'docenteID\')">'+
	        				    				'<option>Docente...</option>'+
			        				    		<?php	
			        				    		    foreach($docentes as $idd =>$docente){ 
			        				    		        echo '\'<option value="'.$idd.'">'.$docente.'</option>\'+';
			        				    		    }
			        				    		  ?>
			        					        '</select></br>'+
			        					        '<input type="button" value="Cancelar" onclick="cancelarAccion()">';
							td.innerHTML=contenido;
							td.onclick="";
						}
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
						function actualizarPermiso(tdId,numReg,campo,selId){
							/*alert(tdId+", "+numReg+", "+campo+", "+selId);*/
							var td=document.getElementById(tdId);
							if(td.innerHTML==1){
	        				    var contenido =	'<select id="'+selId+'">'+
													'<option value="1" selected>1</option>'+
			        				    			'<option value="3">3</option>'+
			        					        '</select></br>'+
			        					        '<input type="button" value="OK" onclick="actualizarRegistro('+numReg+','+selId+'.value,\''+campo+'\')">'+
					        					'<input type="button" value="Cancelar" onclick="cancelarAccion()">';
					        }else{
								var contenido =	'<select id="'+selId+'">'+
													'<option value="1">1</option>'+
			        				    			'<option value="3" selected>3</option>'+
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
							xmlhttp.open("GET", "actualizarUsuario.php?id="+id+"&valor="+valor+"&campo="+campo, false);
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
	        				xmlhttp.open("GET","eliminarUsuario.php?id="+id,false);
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