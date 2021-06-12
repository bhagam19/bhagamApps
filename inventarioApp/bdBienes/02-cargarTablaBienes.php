	<?php

	$row=mysqli_num_rows($consPaginada);

	$columnas =array('codBien','nomBien','detalleDelBien','serieDelBien','origenDelBien','fechaAdquisicion','precio','cantBien','codCategoria','codDependencias','codEstado','codAlmacenamiento','codMantenimiento','observaciones');	
		
	if($row>0){	//Esto parece ser el resultado de una búsqueda. Aquí mostraría si hay algún resultado. En el ELSE mostraría si no hay ninguno.

		while($fila1=mysqli_fetch_array($consPaginada)){		

			$mod=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0);
			$vlr=array("","","","","","","","","","","","","","");
			$vlrOr=array("","","","","","","","","","","","","","");

			$sql=mysqli_query($conexion,"SELECT * FROM modificacionesBienes WHERE codBien=".$fila1['codBien']);
    		$rw = mysqli_num_rows($sql); //Verificamos cuántas filas cumplen con la consulta "$sql"

    		if($rw>=1){  
    			while($f2=mysqli_fetch_array($sql)){

					foreach($columnas as $campo){
		    			$valor=$f2[$campo];
	    					if($valor!=NULL||$valor!=""){
		    					$sql=mysqli_query($conexion,"SELECT ".$campo." FROM bienes WHERE codBien=".$fila1['codBien']);
								while($f01=mysqli_fetch_array($sql)){
									$valorBienes=$f01[$campo];
								}
								$sql=mysqli_query($conexion,"SELECT ".$campo." FROM modificacionesBienes WHERE codBien=".$fila1['codBien']);
								while($f02=mysqli_fetch_array($sql)){
									$valorModBienes=$f02[$campo];
								}
								if($valorModBienes!=$valorBienes){
									
									for($i=0;$i<=13;$i++){
										if($campo==$columnas[$i]){
											$mod[$i]=1;	
											$vlrOr[$i]=$valorBienes;	
											$vlr[$i]=$valorModBienes;
										}
									}
								}
	    					}						   			
		   			}
		   			// echo $fila1['codBien'].' || ';
		   			for($i=0;$i<=13;$i++){
						// echo $mod[$i].' || ';
					}
					// echo ' <br> ';
										
				}  
    		}

			//identificamos la categoria
	    	$sql02=mysqli_query($conexion,"SELECT * FROM clasesDeBienes WHERE codClase=".$fila1["codCategoria"]);
			while($fila2=mysqli_fetch_array($sql02)){
				$nomClase=$fila2["nomClase"];
				//identificamos la clase
				/*$sql03=mysqli_query($conexion,"SELECT * FROM clasesDeBienes WHERE codClase=".$fila2["codClase"]);
				while($fila3=mysqli_fetch_array($sql03)){
					//guardamos el nombre de la clase
					$nomClase=$fila3["nomClase"];
				}*/
			}
			//identificamos la dependencia
			$sql02=mysqli_query($conexion,"SELECT * FROM dependencias WHERE codDependencias=".$fila1["codDependencias"]);
			while($fila2=mysqli_fetch_array($sql02)){
				//guardamos el nombre de la dependencia
				$nomDependencia=$fila2["nomDependencias"];
				//identificamos la ubicacion
				$sql03=mysqli_query($conexion,"SELECT * FROM ubicaciones WHERE codUbicacion=".$fila2["codUbicacion"]);
				while($fila3=mysqli_fetch_array($sql03)){
					//guardamos el nombre de la ubicacion
					$nomUbicacion=$fila3["nomUbicacion"];
				}
				//identificamos al responsable
				$sql03=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuarioID=".$fila2["usuarioID"]);
				while($fila3=mysqli_fetch_array($sql03)){
					//guardamos el nombre del responsable
					$nomResponsable=$fila3["nombres"]." ".$fila3["apellidos"];
					//y guardamos el ID del responsable
					$usuarioCED=$fila3["usuarioCED"];
				}
			}
			//identificamos el estado del bien
	    	$sql02=mysqli_query($conexion,"SELECT * FROM estadoDelBien WHERE codEstado=".$fila1["codEstado"]);
			while($fila2=mysqli_fetch_array($sql02)){
				//guardamos el estado
				$nomEstado=$fila2["nomEstado"];
			}
			//identificamos el estado de Almacenamiento
	    	$sql02=mysqli_query($conexion,"SELECT * FROM almacenamiento WHERE codAlmacenamiento=".$fila1["codAlmacenamiento"]);
			while($fila2=mysqli_fetch_array($sql02)){
				//guardamos el almacenamiento
				$nomAlmacenamiento=$fila2["nomAlmacenamiento"];
			}
			$sql02=mysqli_query($conexion,"SELECT * FROM mantenimiento WHERE codMantenimiento=".$fila1["codMantenimiento"]);
			while($fila2=mysqli_fetch_array($sql02)){
				//guardamos el almacenamiento
				$nomMantenimiento=$fila2["nomMantenimiento"];
			}
			

			//================= Comenzamos a escribir la tabla =================
			
			//Definimos los colores para los estados REGULAR y MALO
			
			if($nomEstado=="REGULAR"){
				$salida.='<tr class="regular">';
			}else if($nomEstado=="MALO"){
				$salida.='<tr class="malo">';
			}else{
				$salida.='<tr>';
			}

			//======Cargamos tabla según permisos de modificaciones. ==================

			if(isset($_SESSION['usuario'])){
				$codigo=$_SESSION['permiso'];
				if($codigo==6){
					include('02-cargarTablaBienes06.php');
				}else{
					include('02-cargarTablaBienes01.php');
				}
							
			}else{
				include('02-cargarTablaBienes00.php');
			}
		}					

	}else{

		$salida.='<div style="position:absolute;top:30%;left:30%;border:1px solid black;padding:0 25px;maring 0 auto;width:400px;border-radius:10px;font-family:‘Lucida Console’, Monaco, monospace;font-size:24px;text-align:center">Lo sentimos. <br><br>Su búsqueda no tiene resultados disponibles. <br><br>Intenta con una nueva búsqueda.</div>';
	}	

	echo $salida;	   
	
?>