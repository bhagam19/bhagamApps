<?php

	$salida="";

	$tabla="bienes";	
	
		$consTtalRg=mysqli_query($conexion,"SELECT * FROM ".$tabla." ".$cr);	
		$resultCant = mysqli_query($conexion,"SELECT SUM(cantBien) as total FROM ".$tabla." ".$cr);  
		$rowCant = mysqli_fetch_array($resultCant, MYSQLI_ASSOC);

		if($o){ //$o = orden
			//echo "Entra aquí cuando no hay filtros, ni búsqueda, pero sí hay orden específico. <br>";		
			
			switch ($d) {
				case 0:
					$consPaginada=mysqli_query($conexion,"SELECT * FROM ".$tabla." ".$cr." ORDER BY ".$o." ASC LIMIT ".$in.",". $tp);
					// $consPaginada=mysqli_query($conexion,"SELECT b.* FROM (SELECT * FROM ".$tabla." ".$cr." LIMIT ".$in.",". $tp.")b ORDER BY ".$o." ASC ");
					break;
				case 1:
					$consPaginada=mysqli_query($conexion,"SELECT * FROM ".$tabla." ".$cr." ORDER BY ".$o." DESC LIMIT ".$in.",". $tp);
					//$consPaginada=mysqli_query($conexion,"SELECT b.* FROM (SELECT * FROM ".$tabla." ".$cr." LIMIT ".$in.",". $tp.")b ORDER BY ".$o." DESC ");
					break;
			}

		}else{
			// echo "Entra aquí cuando no hay filtros, ni búsqueda, ni orden específico. <br>"; //Entrada estándar.			
			//Revisada y funciona

			if(@$cMod==1){
				$consPaginada=mysqli_query($conexion,"SELECT bienes.* FROM bienes INNER JOIN modificacionesBienes ON bienes.codBien=modificacionesBienes.codBien ".$cr." ORDER BY modificacionesBienes.codBien ASC LIMIT ".$in.",". $tp);
			}else{
				$consPaginada=mysqli_query($conexion,"SELECT * FROM ".$tabla." ".$cr. " LIMIT ".$in.",". $tp);
			}
			
			
		}

	// AQUÍ SE CARGAN LAS BÚSQUEDAS	
	if(isset($_POST['consulta'])){
		$q = mysqli_real_escape_string($conexion,$_POST['consulta']);
		$consTtalRg = mysqli_query($conexion,"SELECT * FROM bienes WHERE UPPER(nomBien) LIKE UPPER('%".$q."%') OR UPPER(detalledelBien) LIKE UPPER('%".$q."%')");
		$consPaginada = mysqli_query($conexion,"SELECT * FROM bienes WHERE UPPER(nomBien) LIKE UPPER('%".$q."%') OR UPPER(detalledelBien) LIKE UPPER('%".$q."%')");
		$resultCant = mysqli_query($conexion,"SELECT SUM(cantBien) as total FROM ".$tabla." WHERE UPPER(nomBien) LIKE UPPER('%".$q."%') OR UPPER(detalledelBien) LIKE UPPER('%".$q."%')");  
		$rowCant = mysqli_fetch_array($resultCant, MYSQLI_ASSOC);		 
	}
	
	//miro a ver el número total de campos que hay en la tabla con esa búsqueda 
	$num_total_registros = mysqli_num_rows($consTtalRg); 
	//calculo el total de páginas 
	$total_paginas = ceil($num_total_registros / $tp); 	

	echo "<div id='avisosFijos' class='totalBienes'>TOTAL BIENES: ".$rowCant["total"]."</div>";
  
  if(isset($_SESSION['usuario'])){
    $codigo=$_SESSION['permiso'];
    if($codigo==6){ 
      echo'
        <div id="reestablecerBD">
          <form enctype="multipart/form-data" action="../bdBienes/07-cargarBienesExcel.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
            <input name="subir_archivo" type="file" />
            <input type="submit" value="Reestablecer BD" />
          </form>
        </div><br>
      ';
    }
  }
	
	//pongo el número de registros total, el tamaño de página y la página que se muestra 
	echo "<span id='avisosFijos' class='regEncontrados'>" .$num_total_registros." </span> registros encontrados. "; 
	echo 
		'
			Mostrar <select id="avisosFijos" class="select" onchange=location.href=\'00-principal.php'.$queryUrl.'&tp=\'+this.value>';
					
					if($tp){
						echo '<option>'.$tp.'</option>';
					}
					echo'
					<option value=25>25</option>
					<option value=50>50</option>
					<option value=75>75</option>
					<option value=100>100</option>
					<option value=200>200</option>
					<option value=500>500</option>
				</select> registros por página. <br>'; 

?>