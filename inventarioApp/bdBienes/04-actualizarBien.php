<?php
	include('../conexion/datosConexion.php');
	
	if(!isset($_SESSION['usuario'])){		

		if(@$_GET['u']){
			@session_start();
			$_SESSION['usuario']=@$_GET['u'];	
			$_SESSION['usuarioID']=substr(@$_GET['uID'],1);
			$_SESSION['permiso']=@$_GET['uP'];
		}else{
			$respuesta='aqui no';
		}

	}	

	$respuesta="";

	$columnas =array('codBien','nomBien','detalleDelBien','serieDelBien','origenDelBien','fechaAdquisicion','precio','cantBien','codCategoria','codDependencias','codEstado','codAlmacenamiento','codMantenimiento','observaciones');

	//Obtener variables.
	$id=$_REQUEST['id'];
	//$valor=$_REQUEST['valor'];
	$valor=str_replace(chr(126),chr(34),$_REQUEST['valor']);
	$vlrSplit=explode(";",$valor);
	$campo=$_REQUEST['campo'];
	@$md=$_GET['md'];
	$respuesta.= $md." || ";
	@$usuarioID=""; // Esta variable está reservada para actualizar el usuario responsable del bien, cuando el campo sea codDependencias.

	if($campo=="codClase"){
		$campo='codCategoria';
	}

	if($campo=="codDependencias"){// Esta instrucción está reservada para cargar el usuario responsable del bien, cuando el campo sea codDependencias.
		$sql=mysqli_query($conexion,"SELECT usuarioID from dependencias WHERE codDependencias=".$valor);
		while($fila=mysqli_fetch_array($sql)){
			$usuarioID=$fila['usuarioID'];
		}
	}

	if(isset($_SESSION['usuario'])){
		
		$codigo=$_SESSION['permiso'];
		if($codigo==6){

			if($md==1||!$md){
				$respuesta.= "Entro aqui 01 || ";
				$sql=mysqli_query($conexion,"UPDATE bienes SET ".$campo."='".$valor."' WHERE codBien=".$id);
				$sql=mysqli_query($conexion,"UPDATE detallesDeBienes SET carEspecial='".$vlrSplit[0]."' AND tamano='".$vlrSplit[1]."' AND material ='".$vlrSplit[2]."' AND color='".$vlrSplit[3]."' AND marca='".$vlrSplit[4]."' AND otra='".$vlrSplit[5]."' WHERE codBien=".$id);
				if($campo=="codDependencias"){
					$sql=mysqli_query($conexion,"UPDATE bienes SET usuarioID =".$usuarioID." WHERE codBien=".$id);
				}
				if(!$sql){
					$respuesta.= 'Bienes: No se pudo guardar en "bienes"';
				}else{
					$respuesta.= 'Bienes: Los datos se guardaron de manera exitosa';
				}
			}else if($md==2){
				$respuesta.= "Entro aqui 02 || ";
				$sql=mysqli_query($conexion,"UPDATE modificacionesBienes SET ".$campo."='".$valor."' WHERE codBien=".$id);
				if(!$sql){
					$respuesta.= 'modificacionesBienes: No se pudo guardar en "bienes"';
				}else{
					$respuesta.= 'modificacionesBienes: Los datos se guardaron de manera exitosa';
				}
			}
			

		}else if($codigo==1){
			//Guardamos la información en la tabla temporal "modificacionesBienes"
			$sql01=mysqli_query($conexion,"SELECT * FROM modificacionesBienes WHERE codBien=".$id);    
		    $row = mysqli_num_rows($sql01); //Verificamos cuántas filas cumplen con la consulta "$sql"

			if($row==0){
				mysqli_query($conexion,"INSERT INTO modificacionesBienes (codBien, ".$campo.") VALUES (".$id.",'".$valor."')");
			}else{
				mysqli_query($conexion,"UPDATE modificacionesBienes SET ".$campo."='".$valor."' WHERE codBien=".$id);
			}

			//Verificamos si la información de las tablas "bienes" y "modificacionesBienes" sean similares
			// Si el registro tiene la misma información en todos sus campos, la tabla "bienes" fue actualizada exitosamente
			// Se puede borrar el registro temporal en la tabla "modificacionesBienes"
		}

		$cnt=0;

		$sql01=mysqli_query($conexion,"SELECT * FROM modificacionesBienes WHERE codBien=".$id);    
		$row = mysqli_num_rows($sql01); //Verificamos cuántas filas cumplen con la consulta "$sql"

		if($row!=0){

			foreach($columnas as $columna){

				$sql01=mysqli_query($conexion,"SELECT ".$columna." FROM modificacionesBienes WHERE codBien=".$id);
				while($f01=mysqli_fetch_array($sql01)){
					$vl01=$f01[$columna];			
				}

				$sql02=mysqli_query($conexion,"SELECT ".$columna." FROM bienes WHERE codBien=".$id);
				while($f02=mysqli_fetch_array($sql02)){
					$vl02=$f02[$columna];
				}
				
				if($vl01==Null||$vl01==$vl02){
					$cnt++;
				}
			}

			if($cnt==14){//Si el contador es igual al número de campos en la tabla.
				mysqli_query($conexion,"DELETE FROM modificacionesBienes WHERE codBien=".$id);
			}
		}
	}			

	echo $respuesta;

	mysqli_close($conexion);
?>