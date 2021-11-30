<?php

	echo 	
		'
			<div id="baseDeDatos">
				<div class="baseDeDatos">
					<table class="tablaBD tablaBienes" border=1>
						<thead>								
							<tr>';

							if(!isset($_SESSION['usuario'])){
								echo 
									'										
										<td style="width:5px" class="img"></td>
										<td style="width:5px" class="img"></td>
									';						
							}else{
								$codigo=$_SESSION['permiso'];

									$sql=mysqli_query($conexion,"SELECT MAX(codBien) AS codBien FROM bienes");
									if ($row = mysqli_fetch_row($sql)) {
										$codBien = trim($row[0])+1;
									}
								echo 
									'										
										<th colspan="2"><img style="width:20px;height:20px;z-index:99;" title ="Agregar un bien." src="../art/agregar.svg" onclick="mostrarEdicionBienes(event,\''.$queryUrl.'\',1,'.$codBien.',\''.$u.'\',\''.$uID.'\',\''.$uP.'\')"/></th>
									';		
							}	

							echo'
								<th style="width:40px" class="encabezadoTabla">COD.<img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'codBien\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'codBien\')"/></th>
								<th style="width:90px" class="encabezadoTabla">ESTADO<img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'codEstado\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'codEstado\')"/></th>
								<th style="width:100px" class="encabezadoTabla">BIEN ASIGNADO <img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'nomBien\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'nomBien\')"/></th>
								<th style="width:50px" class="encabezadoTabla">CANT <img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'cantBien\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'cantBien\')"/></th>
								<th style="width:120px" class="encabezadoTabla">DETALLE DEL BIEN ASIGNADO <img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'detalleDelBien\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'detalleDelBien\')"/></th>
								<th style="width:140px" class="encabezadoTabla">TIPO DE INVENTARIO<img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'codCategoria\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'codCategoria\')"/></th>
								<th style="width:140px" class="encabezadoTabla">DEPENDENCIA <img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'codDependencias\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'codDependencias\')"/></th>';

					if(!isset($_SESSION['usuario'])){
						echo 
							'
								
								<th style="width:120px" class="encabezadoTabla">RESPONSABLE <img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'usuarioID\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'usuarioID\')"/></th>
							';						
					}else{
						$codigo=$_SESSION['permiso'];
						if($codigo==6){
							echo 
							'
								<th style="width:120px" class="encabezadoTabla">RESPONSABLE <img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'usuarioID\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'usuarioID\')"/></th>
								<th style="width:80px" class="encabezadoTabla">ID RESPONSABLE </th>
							';														
						}		
					}
					echo
					'								
								<th style="width:80px" class="encabezadoTabla">SERIE</th>
								<th style="width:80px" class="encabezadoTabla">ID DEL BIEN</th>
								<th style="width:80px" class="encabezadoTabla">ORIGEN <img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'origenDelBien\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'origenDelBien\')"/></th>								
								<th style="width:80px" class="encabezadoTabla">FECHA <img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'fechaAdquisicion\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'fechaAdquisicion\')"/><br>ADQUISIC. AAAA/MM/DD</th>
								<th style="width:80px" class="encabezadoTabla">PRECIO <img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'precio\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'precio\')"/><br>UNITARIO </th>
								<th style="width:90px" class="encabezadoTabla">UBICACIÓN</th>
								<th style="width:110px" class="encabezadoTabla">ESTADO DE USO <img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'codAlmacenamiento\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'codAlmacenamiento\')"/></th>
								<th style="width:110px" class="encabezadoTabla">MANTENIMIENTO <img class="imgOrden" src="../art/ordenarAZ.svg" onclick="ordenarBien(\''.$queryUrl.'\',0,\'codMantenimiento\')"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarBien(\''.$queryUrl.'\',1,\'codMantenimiento\')"/></th>	
								<th style="width:400px" class="encabezadoTabla">OBSERVACIONES</th>
							</tr>								
							
						</thead>

						<tbody id="actualizable">							
		';

?>