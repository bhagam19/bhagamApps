<div id="separador" style="display:none;"></div>
	<div id="formulario" class="formularioNuevoUsuario"> 	
		<div id="handler">
			<a class="cerrar">X</a>
			<p>REGISTRO DE NUEVO USUARIO</p>
		</div>
	
	
		<?php
		    include('../conexion/datosConexion.php');
			//Establecer y Ejecutar la consulta.
			$tabla='responsables';
			$consultaSql=mysqli_query($conexion,"SELECT * FROM ".$tabla); 
		
			$peticion1=mysqli_query($conexion,"SELECT * FROM responsables ORDER BY apellidos");
			$docentes=array();
			while($docente=mysqli_fetch_assoc($peticion1)){
				$docentes[$docente["docenteID"]] = $docente["apellidos"].' '.$docente["nombres"];
			}
			
			$peticion2=mysqli_query($conexion,"SELECT * FROM asignaturas ORDER BY asignaturaID");
			$asignaturas=array();
			while($asignatura=mysqli_fetch_assoc($peticion2)){
			    $contador = 0;
				$asignaturas[$asignatura["asignaturaID"]] = $asignatura["asignatura"];
			}
		?>
		<script>
		    var nextinput=0;
			function agregarCampos(){
	        	if($("#campo"+nextinput).val()=="Asignatura..."){
	        	    alert("Selecciona una Asignatura.");
	        	    }else{
	    				nextinput++;
	    				var campo =	'<select name="asignatura" id="campo' + nextinput + '" name="campo' + nextinput + '">'+
	        				    		'<option>Asignatura...</option>'+
	        				    		<?php	
	        				    		    foreach($asignaturas as $idd =>$asignatura){ 
	        				    		        echo '\'<option value="'.$asignatura.'">'.$asignatura.'</option>\'+';
	        				    		    }
	        				    		  ?>
	        					        '</select>';
	    					$("#campos").append(campo);
	    		    }
	        } 
	    </script>
	    
		<form method="POST" name="formularioNuevoUsuario" action="acceso.php" onsubmit="return registrarUsuario(0);">
			<table class="registro-usuario" border=0>
				<tr>
					<td><span>Usuario: <br></span><input class="input" type="text" name="usuario" id="usuario"><span id="x" class="usuario">X</span></td>
				</tr>
				<tr>
					<td><span>Contraseña: <br></span><input class="input" type="password" name="contrasena" id="contrasena"><span id="x" class="contrasena">X</span></td>
				</tr>
				<tr>
					<td><span>Confirmar Contraseña: <br></span><input class="input" type="password" name="confirmarContrasena" id="confirmarContrasena"><span id="x" class="confirmarContrasena">X</span></td>
				</tr>
				<tr>
					<td><span>Docente: <br></span>
					<select name="nombre" id="docente">
					    	<option>Docente...</option>
			<?php
				foreach($docentes as $idd =>$docente){ 
					echo '
							<option value="'.$idd.'">'.$docente.'</option>
						';
				}
			?>
						</select>
					</td>
				</tr>
	        <!--<div id="modificable">  
	            <div id="idAsignaturas">
	    			<tr>
	    			    <td><span>Asignaturas:<br></span>
	    			        <div id="campos"></div>
	    			    </td>
	    			</tr>
	    			<div style="position:relative;top:280px;left:310px;z-index:12;display:block">
						<a href="#" onclick="agregarCampos();" style="background:#5858FA;">Más</a><br>
						<a href="#" onclick="reestablecerCampo();" style="background:#FE2E64;">Rest.</a>
	    			</div>
				</div>
			</div>-->
				<tr>
					<td><input style="left:30px" type="submit" class="submit" value="Mandar"></td>
				</tr>			
			</table>
		</form>
		
	</div>	
</div>