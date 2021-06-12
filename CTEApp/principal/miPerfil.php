<?php
    session_name("inventarioIET");
    session_start();
    
    include('../bdconexion/datosConexion.php');
    $tabla='docentes';
    $docente;
    $sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID=".$_SESSION['docenteID']);
    while($fila=mysqli_fetch_array($sql)){
        $docente=$fila['nombres']." ".$fila['apellidos'];
    }
    
    $tabla='asignaturasxDocente';
	$sqlAsignaturas=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID='".$_SESSION['docenteID']."' ORDER BY asignatura");
    
    $tabla='gruposxDocente';
    $sqlGrupos=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID='".$_SESSION['docenteID']."' ORDER BY grupo");
    
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
	
	$sql=mysqli_query($conexion,"SELECT * FROM usuarios WHERE docenteID=".$_SESSION['docenteID']);
	$idDoc;
	while($doc=mysqli_fetch_array($sql)){
		$idDoc=$doc['usuarioID'];
	}
	
?>
<script>
	function actualizarInput(usuarioID,Id,campo,inpId){
		/*alert(usuarioID+", "+Id+", "+campo+", "+inpId);*/
		var etiq=document.getElementById(Id);
		var contenido =	'<input type="text" id="'+inpId+'" value="'+etiq.innerHTML+'" style="position:relative; width:120px; background:#D8F781; top:-5px;">  '+
						'<img src="img_trans.gif" class="tick-cross" style="background:url(tick-cross.jpg) -27px -2px;" onclick="actualizarRegistro('+usuarioID+','+inpId+'.value,\''+campo+'\')">'+
			   			'<img src="img_trans.gif" class="tick-cross" style="background:url(tick-cross.jpg) 0 -1px;" onclick="cancelarAccion('+inpId+'.value,'+usuarioID+')">';
		etiq.innerHTML=contenido;
		etiq.onclick="";
		var obj =document.getElementById(inpId);
		obj.focus();
		if(obj.value!=""){
			obj.value+="";
		}
		
	}
	function actualizarRegistro(id,valor,campo){
		/*alert(id+", "+valor+", "+campo);*/
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("POST", "../bdUsuarios/actualizarUsuario.php", false);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+id+"&valor="+valor+"&campo="+campo);
		
		xmlhttp.open("POST", "../login/actSessionUsuario.php", false);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("usuario="+valor);
		
		document.getElementById("usuario").innerHTML=""
		document.getElementById("usuario").innerHTML=valor;
	}
	function cancelarAccion(valor,id){
		document.getElementById("usuario").innerHTML=""
		document.getElementById("usuario").innerHTML=valor;
	}
	function registrarAsignaturasMiPerfil(){
		var objetoSelect=document.getElementById("asignaturaMiPerfil").value;
		if (objetoSelect=="Asignatura..."){
			alert("Seleccione una asignatura.");
		}else{
		var asignatura=document.getElementById("asignaturaMiPerfil").value;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", "../bdAsignaturasxDocente/registrarAsignaturas.php?asignatura="+asignatura, false);
        xmlhttp.send();
        if(xmlhttp.response!=""){
        	alert(xmlhttp.response);
        }
        
        xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","miPerfilActAsig.php",false);
		xmlhttp.send();
		
		document.getElementById("asignaturaMiPerfil").value="Asignatura...";
		document.getElementById("actualiza-Asg").innerHTML.value="";
		document.getElementById("actualiza-Asg").innerHTML=xmlhttp.responseText.trim();
		
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","../bdReservaciones/listarAsignaturas.php",false);
		xmlhttp.send();
		
		document.getElementById("listarAsignaturas").innerHTML.value="";
		document.getElementById("listarAsignaturas").innerHTML=xmlhttp.responseText.trim();
		
		}
	}
	function eliminarAsignaturas(id){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","../bdAsignaturasxDocente/eliminarAsignatura.php?id="+id,false);
		xmlhttp.send();
		
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","../principal/miPerfilActAsig.php",false);
		xmlhttp.send();
		document.getElementById("actualiza-Asg").innerHTML="";
		document.getElementById("actualiza-Asg").innerHTML=xmlhttp.responseText.trim();
		
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","../bdReservaciones/listarAsignaturas.php",false);
		xmlhttp.send();
		
		document.getElementById("listarAsignaturas").innerHTML.value="";
		document.getElementById("listarAsignaturas").innerHTML=xmlhttp.responseText.trim();
	}
	function registrarGrupoMiPerfil(){
		var objetoSelect=document.getElementById("grupoMiPerfil").value;
		if (objetoSelect=="Grupo..."){
			alert("Seleccione un grupo.");
		}else{
		var grupo=document.getElementById("grupoMiPerfil").value;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", "../bdGruposxDocente/registrarGrupos.php?grupo="+grupo, false);
        xmlhttp.send();
        if(xmlhttp.response!=""){
        	alert(xmlhttp.response);
        }
        
        xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","miPerfilActGrp.php",false);
		xmlhttp.send();
		
		document.getElementById("grupoMiPerfil").value="Grupo...";
		document.getElementById("actualiza-Grp").innerHTML.value="";
		document.getElementById("actualiza-Grp").innerHTML=xmlhttp.responseText.trim();
		
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","../bdReservaciones/listarGrupos.php",false);
		xmlhttp.send();
		
		document.getElementById("listarGrupos").innerHTML.value="";
		document.getElementById("listarGrupos").innerHTML=xmlhttp.responseText.trim();
		
		}
	}
	function eliminarGrupo(id){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","../bdGruposxDocente/eliminarGrupo.php?id="+id,false);
		xmlhttp.send();
		
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","../principal/miPerfilActGrp.php",false);
		xmlhttp.send();
		document.getElementById("actualiza-Grp").innerHTML="";
		document.getElementById("actualiza-Grp").innerHTML=xmlhttp.responseText.trim();
		
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","../bdReservaciones/listarGrupos.php",false);
		xmlhttp.send();
		
		document.getElementById("listarGrupos").innerHTML.value="";
		document.getElementById("listarGrupos").innerHTML=xmlhttp.responseText.trim();
	}
	function mostrarDiv(){
		document.getElementById("cambiarContrasena").style.display='block';
		document.getElementById("lblContrasena").style.background='#E0F8F7';
		document.getElementById("contrasena").innerHTML=""
	}
	function cancelarContrasena(){
		document.getElementById("cambiarContrasena").style.display='none';
		document.getElementById("lblContrasena").style.background='white';
		document.getElementById("contrasena").innerHTML="*************";
	}
	function verificarContrasenas(){
		var contrasenaActual = document.getElementById("contrasenaActual").value;
		var contrasenaNueva = document.getElementById("contrasenaNueva").value;
		var contrasenaConfirmar = document.getElementById("contrasenaConfirmar").value;
		/*alert (contrasenaActual+", "+contrasenaNueva+", "+contrasenaConfirmar);*/
		if(contrasenaNueva==contrasenaConfirmar){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("POST", "../login/cambiarContrasena.php", false);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("actual="+contrasenaActual+"&nueva="+contrasenaNueva);
			if(xmlhttp.responseText.trim()=="no"){
				alert("La contraseña actual no es correcta.");
				document.getElementById("contrasenaActual").value="";
				document.getElementById("contrasenaActual").focus();
			}else{
				/*alert(xmlhttp.responseText.trim());*/
				alert("Contraseña cambiada con exito.");
				
				document.getElementById("contrasenaActual").value="";
				document.getElementById("contrasenaNueva").value="";
				document.getElementById("contrasenaConfirmar").value="";
				
				document.getElementById("cambiarContrasena").style.display='none';
				document.getElementById("lblContrasena").style.background='white';
				document.getElementById("contrasena").innerHTML="*************";
			}
			
		}else{
			alert("La contraseña nueva y la confirmación no coinciden.");
			document.getElementById("contrasenaNueva").value="";
			document.getElementById("contrasenaConfirmar").value="";
			document.getElementById("contrasenaNueva").focus();
		}
	}
</script>
<div id="separador" style="display:none;"></div>
<div id="formulario" class="formularioMiPerfil"> 	
	<div id="handler" >
		<a class="cerrar">X</a> 
		<p>MI PERFIL</p>
	</div>
	<div class="miPerfil">
	    <label>
	        <span id="nombreDocente">Nombre:</span>
	        <valor><?php echo mb_convert_case($docente, MB_CASE_TITLE, "UTF-8"); ?></valor>
	        <btn style="" >Modificar</btn>
	    </label>
	    <label>
	        <span>Usuario:</span>
	        <valor id="usuario"><?php echo $_SESSION['usuario']; ?></valor>
	        <btn onclick="actualizarInput(<?php echo $idDoc; ?>,'usuario','usuario','actUsuario')" id="modificarUsuario">Modificar</btn>
	    </label>
	    <label id="lblContrasena">
	        <span>Contraseña:</span>
	        <valor id="contrasena">*************</valor>
	        <btn onclick=mostrarDiv();>Modificar</btn>
	    </label>
	</div>
	<div class="formulario" style="height:330px;overflow:auto;!important">
		<div id="modificable" class="tablaMiPerfil" style="width:700px;margin-left:20px;height:150px;overflow:auto;!important">
			<label>
				<span>Asignaturas Registradas</span>
			    <table style="width:400px;!important">
			    	<thead>
			    		<tr>
			    			<th><select name="asignaturaMiPerfil" id="asignaturaMiPerfil">
									    <option>Asignatura...</option>
										<?php    
									    foreach($asignaturas as $idd =>$asignatura){ 
											echo '
												<option value="'.$idd.'">'.$asignatura.'</option>
											';
										}
									?>
								</select></th>
							<th><li onclick="registrarAsignaturasMiPerfil()">Agregar</li></th>
			    		</tr>
			    	</thead>
			    	<tbody  id="actualiza-Asg" style="height:100px;overflow:auto;">
						<?php include('miPerfilActAsig.php');?>
			        </tbody>
			    </table>
			</label>    
		</div>
		<div id="modificable" class="tablaMiPerfil" style="width:700px;margin-left:20px;height:150px;overflow:auto;!important">  
			<label>
				<span>Grupos Registrados</span>
			    <table style="width:400px;!important">
			    	<thead style="">
			    		<tr>
			    			<th>
			    				<select name="grupoMiPerfil" id="grupoMiPerfil">
								    <option>Grupo...</option>
								<?php    
								    foreach($grupos as $idd =>$grupo){ 
										echo '
											<option value="'.$idd.'">'.$grupo.'</option>
										';
									}
								?>
								</select></th>
							<th><li  onclick="registrarGrupoMiPerfil()">Agregar</li></th>
			    		</tr>
			    	</thead>
			        <tbody id="actualiza-Grp">
			        	<?php include('miPerfilActGrp.php'); ?>
		        	</tbody>
		    	</table>
			</label> 
		</div>
	</div>
	<div id="cambiarContrasena">
		<label>
	        <span>Actual:</span>
	        <valor id="contrasena"><input type="password" id="contrasenaActual"></valor>
	    </label>
	    <label>
	        <span>Nueva:</span>
	        <valor id="contrasena"><input type="password" id="contrasenaNueva"></valor>
	    </label>
	    <label>
	        <span>Confirmar:</span>
	        <valor id="contrasena"><input type="password" id="contrasenaConfirmar"></valor>
	    </label>
	    <div style="position:relative; left:15px; top:68px">
	    	<img src="img_trans.gif" class="tick-cross" style="background:url(tick-cross.jpg) -27px -2px;" onclick="verificarContrasenas()">
    		<img src="img_trans.gif" class="tick-cross" style="background:url(tick-cross.jpg) 0 -1px;" onclick="cancelarContrasena()">
	    </div>
	</div>
</div>