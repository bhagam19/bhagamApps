	<html style="background:#F2F2F2">
	<head>
		<title>Administración de Grupos por Docente</title>
		<link rel="shortcut icon" href="../principal/tableta04.ico" />
		<link rel="stylesheet" type="text/css" href="../bdReservaciones/principal.css"/>
		<link rel="stylesheet" media="screen" type="text/css" href="../principal/acceso.css"/>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="../bdReservaciones/scripts.js"></script>
		<script type="text/javascript" src="../principal/acceso.js"></script>
	</head>
	
	<script>
		function registrarGruposAdmin(){
			var grupo=document.getElementById("grupo").value;
			var docenteID=document.getElementById("docente").value;
			if (grupo=="Grupo..."){
				alert("Seleccione un grupo.");
			}else{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "../bdGruposxDocente/registrarGruposAdmin.php?grupo="+grupo+"&docenteID="+docenteID, false);
	        xmlhttp.send();
	        if(xmlhttp.response!=""){
	        	alert(xmlhttp.response);
	        }
	        xmlhttp.open("GET","adminActGrp.php?docenteID="+docenteID,false);
			xmlhttp.send();
			document.getElementById("grupo").value="Grupo...";
			document.getElementById("actualiza-Grp").innerHTML.value="";
			document.getElementById("actualiza-Grp").innerHTML=xmlhttp.responseText.trim();
			
			xmlhttp.open("GET","actualizarActualizable.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML="";
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
			}
		}
		function cargarGrupo(docenteID){
			alert(docenteID);
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET","adminActGrp.php?docenteID="+docenteID,false);
			xmlhttp.send();
			document.getElementById("actualiza-Grp").innerHTML="";
			document.getElementById("actualiza-Grp").innerHTML=xmlhttp.responseText.trim();
			
		}
		function eliminarGrupoAdmin(id){
			/*alert(id);*/
			var docenteID=document.getElementById("docente").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","eliminarGrupoAdmin.php?id="+id,false);
			xmlhttp.send();
			
			xmlhttp.open("GET","adminActGrp.php?docenteID="+docenteID,false);
			xmlhttp.send();
			document.getElementById("actualiza-Grp").innerHTML="";
			document.getElementById("actualiza-Grp").innerHTML=xmlhttp.responseText.trim();
			
			xmlhttp.open("GET","actualizarActualizable.php",false);
			xmlhttp.send();
			document.getElementById("actualizable").innerHTML="";
			document.getElementById("actualizable").innerHTML=xmlhttp.responseText.trim();
		}
	</script>
	
	<?php
		session_start();
		if(isset($_SESSION['usuario'])){
			$codigo=$_SESSION['permiso'];
			if($codigo==1){
				echo'
					<script>alert("Lo sentamos, no tiene permisos suficientes para esta opción.");</script>
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
        		<h1>ADMINISTRACIÓN DE GRUPOS POR DOCENTE</h1>
            	<div id="volver">
            		<ul style="list-style:none;display:inline">
            			<li style="display:inline"><a href=\'../principal/acceso.php\'>Volver</a></li>
            		</ul>
            	</div>	
				<div id="contenedor">
					<div class="formularioReservaciones" >
						<div>
							<span> AGREGAR NUEVO GRUPO</span>
							<div id="modificable" class="tablaAdministrador" style="width:750px;margin-left:20px;height:150px;overflow:auto;!important">
								<span>Primero, seleccione el docente.</span><br>
								<label>
									<span>
									    <select name="docente" id="docente" onchange="cargarGrupo(this.value)">
											<option>Docente...</option>
											';
											$docentesI=array();
											$docentesF=array();
											$contador=0;
											$tabla='gruposxDocente';
											$consultaSql=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY docenteID ASC"); 
											while($fila=mysqli_fetch_array($consultaSql)){
												$docentesI[$contador]=$fila["docenteID"];
												$contador++;
											}											
											$contador=0;
											foreach($docentesI as $docente){
												if(!in_array($docente,$docentesF)){
													$docentesF[$contador]=$docente;
													$contador++;
												}
											}											
											$consulta=mysqli_query($conexion,"SELECT * FROM docentes ORDER BY docenteID ASC");
											$contador=0;
											while($fila=mysqli_fetch_array($consulta)){
												echo $fila["docenteID"]." docentesF[".$contador."]=".$docentesF[$contador].", ";
												if($fila["docenteID"]==$docentesF[$contador]){
													echo '<option value='.$fila["docenteID"].'>'.$fila["nombres"]." ".$fila["apellidos"].'</option>';
													$contador++;	
												}
												echo '<option value='.$fila["docenteID"].'>'.$fila["nombres"]." ".$fila["apellidos"].'</option>';
													$contador++;
											}
									echo '
										</select>
									</span>
									<table style="width:450px;!important">
								    	<thead>
								    		<tr>
								    			<th><select name="grupo" id="grupo">
														    <option>Grupo...</option> ';
													$peticion2=mysqli_query($conexion,"SELECT * FROM grupos ORDER BY grupoID");
													$grupos=array();
													while($grupo=mysqli_fetch_assoc($peticion2)){
														$grupos[$grupo["grupoID"]] = $grupo["grupo"];
													}	    
													foreach($grupos as $idd =>$grupo){ 
														echo '
															<option value="'.$idd.'">'.$grupo.'</option>
														';
													}			    
											echo'		
													</select></th>
												<th><li onclick="registrarGruposAdmin()">Agregar</li></th>
								    		</tr>
								    	</thead>
								    	<tbody  id="actualiza-Grp" style="height:100px;overflow:auto;">
											';
											//include('adminActGrp.php');
									echo'
								        </tbody>
							    	</table>			
								</label>  
							</div>
						</div></br>
						
    					<div style="height:340px;overflow:auto">
        					<table class="tabla" width="100%" >
        						<caption>GRUPOS REGISTRADOS POR DOCENTE ("Click" para actualizar.)</caption>
    							<thead>
    								<tr>
    									<th>ID</th>
    									<th>USUARIO</th>
    									<th>DOCENTE</th>
    									<th>GRUPO</th>
    								</tr>
    							</thead>
        					<tbody id="actualizable">
    						';
	?>
	
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