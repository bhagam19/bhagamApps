<?php
	
	$salida.= 
				'	
					<tr class="filaFiltros">		
						<th class="img" colspan="3" style="text-align:right;background:white;font-weight:bolder">Filtrar: ======> </th>
						
						<th class="encabezadoTabla">';

							if($f9==""||$f9=="por Estado..."){
								$salida.='
								<select style="';
							}else{
								$salida.='
								<select style="background:#BDCEFB;color:#4163B8;';
							}

							$salida.='
								font-size:9px; width:96px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f9\',this.value)">';
							
								if($f9){
									//Cambio el "codEstado" por el "nomEstado"
									$consulta=mysqli_query($conexion,"SELECT * FROM estadoDelBien WHERE codEstado=".$f9);
									while($f=mysqli_fetch_array($consulta)){
										$e = $f['nomEstado'];
									}
									$salida.= '<option>'.$e.'</option>';
									$salida.= '<option value="por Estado..." style="background:white">Quitar filtro</option>';
								}else{
									$salida.= '<option>por Estado...</option>';
								}
								
								if(!isset($_SESSION['usuario'])){
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codEstado FROM bienes ".$cr." ORDER BY codEstado ASC");	
								}else{
									$codigo=$_SESSION['permiso'];
									if($codigo==1){
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codEstado FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY codEstado ASC");
									}else{										
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codEstado FROM bienes ".$cr." ORDER BY codEstado ASC");
									}									
								}
								$estados=array();										
								while($fila1=mysqli_fetch_array($consulta)){

									$consulta2=mysqli_query($conexion,"SELECT codEstado,nomEstado FROM estadoDelBien WHERE codEstado=".$fila1["codEstado"]);
									while($estado=mysqli_fetch_assoc($consulta2)){
									$estados[$estado["codEstado"]] = $estado["nomEstado"];
									}
								}								
									    
								$e2=array_unique($estados);
								foreach($e2 as $idd =>$e){ 
										if($idd!=$f9){
											$salida.='<option value="'.$idd.'">'.$e.'</option>';
										}
									}

								/*$tf4=(microtime(true)-$ti);
								echo '<br>filtro Dependencia: '.number_format($tf4,5).'<br>';
								$ti=microtime(true);*/

								// mysqli_free_result($consulta);

						$salida.= '		
							</select></th>
						<th class="encabezadoTabla" style="text-align:left">';
							if($f1==""||$f1=="por Bien..."){
								$salida.='
								<select style="';
							}else{
								$salida.='
								<select style="background:#BDCEFB;color:#4163B8;';
							}

							$salida.='
								font-size:9px; width:90px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f1\',this.value)">';

							if($f1){
								$salida.= '<option>'.$f1.'</option>';
								$salida.= '<option value="por Bien..." style="background:white">Quitar filtro</option>';
							}else{
								$salida.= '<option>por Bien...</option>'; 	
							}
							
							if(!isset($_SESSION['usuario'])){			
								$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, nomBien FROM  bienes ".$cr." ORDER BY nomBien ASC");	
							}else{
								$codigo=$_SESSION['permiso'];
									if($codigo==1){
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, nomBien FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY nomBien ASC");
									}else{										
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, nomBien FROM  bienes ".$cr." ORDER BY nomBien ASC");
									}								
							}

							$bienes=array();
							while($bien=mysqli_fetch_assoc($consulta)){
								$bienes[$bien["codBien"]] = $bien["nomBien"];
							}

							$b2=array_unique($bienes);
							foreach($b2 as $idd =>$b){ 
									if($b!==$f1){
										$salida.='<option value="'.$b.'">'.$b.'</option>';
									}													
								}

							/*$tf1=(microtime(true)-$ti4);
							echo '<br>filtro bienes: '.number_format($tf1,5).'<br>';	
							$ti=microtime(true);*/

							$salida.= '		
								</select></th>
						<td class="encabezadoTabla"></td>						
						<td class="encabezadoTabla">';
							
							if($f2==""||$f2=="por Detalle..."){
								$salida.='
								<select style="';
							}else{
								$salida.='
								<select style="background:#BDCEFB;color:#4163B8;';
							}

							$salida.='
								font-size:9px; width:150px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f2\',this.value)">';

								if($f2){
									$salida.= '<option>'.$f2.'</option>';
									$salida.= '<option value="por Detalle..." style="background:white">Quitar filtro</option>';
								}else{
									$salida.= '<option>por Detalle...</option>';
								}

								if(!isset($_SESSION['usuario'])){			
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, detalleDelBien FROM bienes ".$cr." ORDER BY detalleDelBien ASC");	
								}else{
									$codigo=$_SESSION['permiso'];
									if($codigo==1){
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, detalleDelBien FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY detalleDelBien ASC");
									}else{										
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, detalleDelBien FROM bienes ".$cr." ORDER BY detalleDelBien ASC");
									}									
								}

								$detalles=array();
								while($detalle=mysqli_fetch_assoc($consulta)){
									$detalles[$detalle["codBien"]] = $detalle["detalleDelBien"];
								}	    
								$d2=array_unique($detalles);
								foreach($d2 as $idd =>$d){ 
									if($d!=$f2){
										//echo '<br>d: "'.$d.'" f2: "'.$f2.'"<br>';
										$salida.='<option value="'.$d.'">'.$d.'</option>';
									}
								}
							/*$tf2=(microtime(true)-$ti);
							echo '<br>filtro detalles: '.number_format($tf2,5).'<br>';	
							$ti=microtime(true);*/

						$salida.= '		
							</select></td>
						<td class="encabezadoTabla">';

							if($f3==""||$f3=="por Tipo Inventario..."){
								$salida.='
								<select style="';
							}else{
								$salida.='
								<select style="background:#BDCEFB;color:#4163B8;';
							}

							$salida.='
								font-size:9px; width:150px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f3\',this.value)">';
																
								if($f3){
									//Cambio el "codClase" por el "nomClase"
									$consulta=mysqli_query($conexion,"SELECT * FROM clasesDeBienes WHERE codClase=".$f3);
									while($f=mysqli_fetch_array($consulta)){
										$c = $f['nomClase'];
									}
									$salida.= '<option>'.$c.'</option>';
									$salida.= '<option value="por Tipo Inventario..." style="background:white">Quitar filtro</option>';
								}else{
									$salida.= '<option>por Tipo Inventario...</option>';
								}
								
								if(!isset($_SESSION['usuario'])){			
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codCategoria FROM bienes ".$cr." ORDER BY codCategoria ASC");	
								}else{
									$codigo=$_SESSION['permiso'];
									if($codigo==1){
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codCategoria FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY codCategoria ASC");
									}else{										
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codCategoria FROM bienes ".$cr." ORDER BY codCategoria ASC");
									}
								}

								$clases=array();										
								while($fila1=mysqli_fetch_array($consulta)){
									$consulta2=mysqli_query($conexion,"SELECT * FROM clasesDeBienes WHERE codClase=".$fila1["codCategoria"]);
									while($clase=mysqli_fetch_assoc($consulta2)){
									$clases[$clase["codClase"]] = $clase["nomClase"];
									}
								}								
									    
								$c2=array_unique($clases);
								asort($c2);
								foreach($c2 as $idd =>$c){ 
										if($idd!=$f3){
											$salida.='<option value="'.$idd.'">'.$c.'</option>';
										}										
									}

								/*$tf3=(microtime(true)-$ti);
								echo '<br>filtro Tipo Inventario: '.number_format($tf3,5).'<br>';
								$ti=microtime(true);*/

						$salida.= '		
							</select></td>
						<td class="encabezadoTabla">';

							if($f4==""||$f4=="por Dependencia..."){
								$salida.='
								<select style="';
							}else{
								$salida.='
								<select style="background:#BDCEFB;color:#4163B8;';
							}

							$salida.='
								font-size:9px; width:150px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f4\',this.value)">';
							
								if($f4){
									//Cambio el "codDependencias" por el "nomDependencias"
									$consulta=mysqli_query($conexion,"SELECT * FROM dependencias WHERE codDependencias=".$f4);
									while($f=mysqli_fetch_array($consulta)){
										$d = $f['nomDependencias'];
									}
									$salida.= '<option>'.$d.'</option>';
									$salida.= '<option value="por Dependencia..." style="background:white">Quitar filtro</option>';
								}else{
									$salida.= '<option>por Dependencia...</option>';
								}
								
								if(!isset($_SESSION['usuario'])){			
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codDependencias FROM bienes ".$cr." ORDER BY codDependencias ASC");	
								}else{
									$codigo=$_SESSION['permiso'];
									if($codigo==1){
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codDependencias FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY codDependencias ASC");
									}else{										
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codDependencias FROM bienes ".$cr." ORDER BY codDependencias ASC");
									}
								}
								$dependencias=array();										
								while($fila1=mysqli_fetch_array($consulta)){
									$consulta2=mysqli_query($conexion,"SELECT codDependencias,nomDependencias FROM dependencias WHERE codDependencias=".$fila1["codDependencias"]);
									while($dependencia=mysqli_fetch_assoc($consulta2)){
									$dependencias[$dependencia["codDependencias"]] = $dependencia["nomDependencias"];
									}
								}								
									    
								$d2=array_unique($dependencias);
								foreach($d2 as $idd =>$d){ 
										if($idd!=$f4){
											$salida.='<option value="'.$idd.'">'.$d.'</option>';
										}
									}

								/*$tf4=(microtime(true)-$ti);
								echo '<br>filtro Dependencia: '.number_format($tf4,5).'<br>';
								$ti=microtime(true);*/

								// mysqli_free_result($consulta);

						$salida.= '		
							</select></td>';


						if(!isset($_SESSION['usuario'])){
							$salida.= 
								'								
									<td class="encabezadoTabla">';

									if($f5==""||$f5=="por Responsable..."){
										$salida.='
										<select style="';
									}else{
										$salida.='
										<select style="background:#BDCEFB;color:#4163B8;';
									}

							$salida.='
								font-size:9px; width:150px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f5\',this.value)">';
							
									if($f5){
										//Cambio el "usuarioID" por Nombres y apellidos
										$consulta=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuarioID=".$f5);
										while($f=mysqli_fetch_array($consulta)){
											$u = $f['nombres'].' '.$f['apellidos'];
										}
										$salida.= '<option>'.$u.'</option>';
										$salida.= '<option value="por Responsable..." style="background:white">Quitar filtro</option>';
									}else{
										$salida.= '<option>por Responsable...</option>';
									}
								
									if(!isset($_SESSION['usuario'])){			
										$consulta=mysqli_query($conexion,"SELECT DISTINCT usuarioID FROM bienes ".$cr." ORDER BY usuarioID ASC");	
									}else{
										$codigo=$_SESSION['permiso'];
										if($codigo==1){
											$consulta=mysqli_query($conexion,"SELECT DISTINCT usuarioID FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY usuarioID ASC");
										}else{										
											$consulta=mysqli_query($conexion,"SELECT DISTINCT usuarioID FROM bienes ".$cr." ORDER BY usuarioID ASC");
										}
									}
									
									$usuarios=array();										
									while($fila1=mysqli_fetch_array($consulta)){
										$consulta2=mysqli_query($conexion,"SELECT usuarioID,nombres,apellidos FROM usuarios WHERE usuarioID=".$fila1["usuarioID"]." ORDER BY apellidos ASC");
										while($usuario=mysqli_fetch_assoc($consulta2)){
										$usuarios[$usuario["usuarioID"]] = $usuario["nombres"].' '.$usuario["apellidos"];
										}
									}								
									    
									$u2=array_unique($usuarios);
									foreach($u2 as $idd =>$u){ 
										if($idd!=$f5){
											$salida.='<option value="'.$idd.'">'.$u.'</option>';
										}
									}

							$salida.= '		
								</select></td>
								';						
						}else{
							$codigo=$_SESSION['permiso'];
							if($codigo==6){

								$salida.= 
									'								
										<td class="encabezadoTabla">';

										if($f5==""||$f5=="por Responsable..."){
											$salida.='
											<select style="';
										}else{
											$salida.='
											<select style="background:#BDCEFB;color:#4163B8;';
										}

								$salida.='
									font-size:9px; width:150px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f5\',this.value)">';
								
										if($f5){
											//Cambio el "usuarioID" por Nombres y apellidos
											$consulta=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuarioID=".$f5);
											while($f=mysqli_fetch_array($consulta)){
												$u = $f['nombres'].' '.$f['apellidos'];
											}
											$salida.= '<option>'.$u.'</option>';
											$salida.= '<option value="por Responsable..." style="background:white">Quitar filtro</option>';
										}else{
											$salida.= '<option>por Responsable...</option>';
										}
									
										if(!isset($_SESSION['usuario'])){			
											$consulta=mysqli_query($conexion,"SELECT DISTINCT usuarioID FROM bienes ".$cr." ORDER BY usuarioID ASC");	
										}else{
											$codigo=$_SESSION['permiso'];
											if($codigo==1){
												$consulta=mysqli_query($conexion,"SELECT DISTINCT usuarioID FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY usuarioID ASC");
											}else{										
												$consulta=mysqli_query($conexion,"SELECT DISTINCT usuarioID FROM bienes ".$cr." ORDER BY usuarioID ASC");
											}
										}
										
										$usuarios=array();										
										while($fila1=mysqli_fetch_array($consulta)){
											$consulta2=mysqli_query($conexion,"SELECT usuarioID,nombres,apellidos FROM usuarios WHERE usuarioID=".$fila1["usuarioID"]." ORDER BY apellidos ASC");
											while($usuario=mysqli_fetch_assoc($consulta2)){
											$usuarios[$usuario["usuarioID"]] = $usuario["nombres"].' '.$usuario["apellidos"];
											}
										}								
										    
										$u2=array_unique($usuarios);
										foreach($u2 as $idd =>$u){ 
											if($idd!=$f5){
												$salida.='<option value="'.$idd.'">'.$u.'</option>';
											}
										}

								$salida.= '		
									</select></td>
									<td class="encabezadoTabla"></td>
									';																						
							}		
						}
					$salida.=
						'						
						<td class="encabezadoTabla"></td>
						<td class="encabezadoTabla"></td>
						<td class="encabezadoTabla">';
							if($f6==""||$f6=="por Origen..."){
								$salida.='
								<select style="';
							}else{
								$salida.='
								<select style="background:#BDCEFB;color:#4163B8;';
							}

							$salida.='
								font-size:9px; width:100px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f6\',this.value)">';

							if($f6){
								$salida.= '<option>'.$f6.'</option>';
								$salida.= '<option value="por Origen..." style="background:white">Quitar filtro</option>';
							}else{
								$salida.= '<option>por Origen...</option>'; 	
							}
							
							if(!isset($_SESSION['usuario'])){			
								$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, origenDelBien FROM  bienes ".$cr." ORDER BY origenDelBien ASC");	
							}else{
								$codigo=$_SESSION['permiso'];
								if($codigo==1){
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, origenDelBien FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY origenDelBien ASC");
								}else{										
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, origenDelBien FROM  bienes ".$cr." ORDER BY origenDelBien ASC");	
								}
							}

							$origenes=array();
							while($origen=mysqli_fetch_assoc($consulta)){
								$origenes[$origen["codBien"]] = $origen["origenDelBien"];
							}

							$or2=array_unique($origenes);
							foreach($or2 as $idd =>$or){ 
									if($or!==$f6){
										$salida.='<option value="'.$or.'">'.$or.'</option>';
									}													
								}

							/*$tf1=(microtime(true)-$ti4);
							echo '<br>filtro bienes: '.number_format($tf1,5).'<br>';	
							$ti=microtime(true);*/

							$salida.= '		
								</select></td>
						<td class="encabezadoTabla">';
							if($f7==""||$f7=="por Fecha..."){
								$salida.='
								<select style="';
							}else{
								$salida.='
								<select style="background:#BDCEFB;color:#4163B8;';
							}

							$salida.='
								font-size:9px; width:100px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f7\',this.value)">';

							if($f7){
								$salida.= '<option>'.$f7.'</option>';
								$salida.= '<option value="por Fecha..." style="background:white">Quitar filtro</option>';
							}else{
								$salida.= '<option>por Fecha...</option>'; 	
							}
							
							if(!isset($_SESSION['usuario'])){			
								$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, fechaAdquisicion FROM  bienes ".$cr." ORDER BY fechaAdquisicion DESC");	
							}else{
								$codigo=$_SESSION['permiso'];
								if($codigo==1){
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, fechaAdquisicion FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY fechaAdquisicion DESC");
								}else{										
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, fechaAdquisicion FROM  bienes ".$cr." ORDER BY fechaAdquisicion DESC");	
								}
							}

							$fechas=array();
							while($fecha=mysqli_fetch_assoc($consulta)){
								$fechas[$fecha["codBien"]] = $fecha["fechaAdquisicion"];
							}

							$fch2=array_unique($fechas);
							foreach($fch2 as $idd =>$fch){ 
									if($fch!==$f7){
										$salida.='<option value="'.$fch.'">'.$fch.'</option>';
									}													
								}

							/*$tf1=(microtime(true)-$ti4);
							echo '<br>filtro bienes: '.number_format($tf1,5).'<br>';	
							$ti=microtime(true);*/

							$salida.= '		
								</select></td>
						<td class="encabezadoTabla">';
							if($f8==""||$f8=="por Precio..."){
								$salida.='
								<select style="';
							}else{
								$salida.='
								<select style="background:#BDCEFB;color:#4163B8;';
							}

							$salida.='
								font-size:9px; width:100px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f8\',this.value)">';

							if($f8){
								$salida.= '<option>'.$f8.'</option>';
								$salida.= '<option value="por Precio..." style="background:white">Quitar filtro</option>';
							}else{
								$salida.= '<option>por Precio...</option>'; 	
							}
							
							if(!isset($_SESSION['usuario'])){			
								$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, precio FROM  bienes ".$cr." ORDER BY precio ASC");	
							}else{
								$codigo=$_SESSION['permiso'];
								if($codigo==1){
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, precio FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY precio ASC");
								}else{										
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, precio FROM  bienes ".$cr." ORDER BY precio ASC");	
								}
							}

							$precios=array();
							while($precio=mysqli_fetch_assoc($consulta)){
								$precios[$precio["codBien"]] = $precio["precio"];
							}

							$pr2=array_unique($precios);
							foreach($pr2 as $idd =>$pr){ 
									if($pr!==$f8){
										$salida.='<option value="'.$pr.'">'.$pr.'</option>';
									}													
								}

							/*$tf1=(microtime(true)-$ti4);
							echo '<br>filtro bienes: '.number_format($tf1,5).'<br>';	
							$ti=microtime(true);*/

							$salida.= '		
								</select></td>
						<td class="encabezadoTabla"></td>
						<td class="encabezadoTabla">';

							if($f10==""||$f10=="por Almacenamiento..."){
								$salida.='
								<select style="';
							}else{
								$salida.='
								<select style="background:#BDCEFB;color:#4163B8;';
							}

							$salida.='
								font-size:9px; width:135px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f10\',this.value)">';
							
								if($f10){
									//Cambio el "codAlmacenamiento" por el "nomAlmacenamiento"
									$consulta=mysqli_query($conexion,"SELECT * FROM almacenamiento WHERE codAlmacenamiento=".$f10);
									while($f=mysqli_fetch_array($consulta)){
										$a = $f['nomAlmacenamiento'];
									}
									$salida.= '<option>'.$a.'</option>';
									$salida.= '<option value="por Almacenamiento..." style="background:white">Quitar filtro</option>';
								}else{
									$salida.= '<option>por Almacenamiento...</option>';
								}
								
								if(!isset($_SESSION['usuario'])){			
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codAlmacenamiento FROM bienes ".$cr." ORDER BY codAlmacenamiento ASC");	
								}else{
									$codigo=$_SESSION['permiso'];
									if($codigo==1){
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codAlmacenamiento FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY codAlmacenamiento ASC");
									}else{										
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codAlmacenamiento FROM bienes ".$cr." ORDER BY codAlmacenamiento ASC");		
									}
								}
								$almacenamientos=array();										
								while($fila1=mysqli_fetch_array($consulta)){
									$consulta2=mysqli_query($conexion,"SELECT codAlmacenamiento,nomAlmacenamiento FROM almacenamiento WHERE codAlmacenamiento=".$fila1["codAlmacenamiento"]);
									while($almacenamiento=mysqli_fetch_assoc($consulta2)){
									$almacenamientos[$almacenamiento["codAlmacenamiento"]] = $almacenamiento["nomAlmacenamiento"];
									}
								}								
									    
								$a2=array_unique($almacenamientos);
								foreach($a2 as $idd =>$a){ 
										if($idd!=$f10){
											$salida.='<option value="'.$idd.'">'.$a.'</option>';
										}
									}

								/*$tf4=(microtime(true)-$ti);
								echo '<br>filtro Dependencia: '.number_format($tf4,5).'<br>';
								$ti=microtime(true);*/

								// mysqli_free_result($consulta);

						$salida.= '		
							</select></td>
						<td class="encabezadoTabla">';

							if($f11==""||$f11=="por Mantenimiento..."){
								$salida.='
								<select style="';
							}else{
								$salida.='
								<select style="background:#BDCEFB;color:#4163B8;';
							}

							$salida.='
								font-size:9px; width:135px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f11\',this.value)">';
							
								if($f11){
									//Cambio el "codMantenimiento" por el "nomMantenimiento"
									$consulta=mysqli_query($conexion,"SELECT * FROM mantenimiento WHERE codMantenimiento=".$f11);
									while($f=mysqli_fetch_array($consulta)){
										$m = $f['nomMantenimiento'];
									}
									$salida.= '<option>'.$m.'</option>';
									$salida.= '<option value="por Mantenimiento..." style="background:white">Quitar filtro</option>';
								}else{
									$salida.= '<option>por Mantenimiento...</option>';
								}
								
								if(!isset($_SESSION['usuario'])){			
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codMantenimiento FROM bienes ".$cr." ORDER BY codMantenimiento ASC");	
								}else{
									$codigo=$_SESSION['permiso'];
									if($codigo==1){
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codMantenimiento FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY codMantenimiento ASC");
									}else{										
										$consulta=mysqli_query($conexion,"SELECT DISTINCT codMantenimiento FROM bienes ".$cr." ORDER BY codMantenimiento ASC");		
									}
								}
								$mantenimientos=array();										
								while($fila1=mysqli_fetch_array($consulta)){
									$consulta2=mysqli_query($conexion,"SELECT * FROM mantenimiento WHERE codMantenimiento=".$fila1["codMantenimiento"]);
									while($mantenimiento=mysqli_fetch_assoc($consulta2)){
									$mantenimientos[$mantenimiento["codMantenimiento"]] = $mantenimiento["nomMantenimiento"];
									}
								}								
									    
								$m2=array_unique($mantenimientos);
								foreach($m2 as $idd =>$m){ 
										if($idd!=$f11){
											$salida.='<option value="'.$idd.'">'.$m.'</option>';
										}
									}

								/*$tf4=(microtime(true)-$ti);
								echo '<br>filtro Dependencia: '.number_format($tf4,5).'<br>';
								$ti=microtime(true);*/

								// mysqli_free_result($consulta);

						$salida.= '		
							</select></td>	
						<td class="encabezadoTabla" style="text-align:left">';
							if($f12==""||$f12=="por Observaciones..."){
								$salida.='
								<select style="';
							}else{
								$salida.='
								<select style="background:#BDCEFB;color:#4163B8;';
							}

							$salida.='
								font-size:9px; width:150px"  onchange="aplicarFiltros(\''.$queryUrl.'\',\'f12\',this.value)">';

							if($f12){
								$salida.= '<option>'.$f12.'</option>';
								$salida.= '<option value="por Observaciones..." style="background:white">Quitar filtro</option>';
							}else{
								$salida.= '<option>por Observaciones...</option>'; 	
							}
							
							if(!isset($_SESSION['usuario'])){			
								$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, observaciones FROM  bienes ".$cr." ORDER BY observaciones ASC");	
							}else{
								$codigo=$_SESSION['permiso'];
								if($codigo==1){
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, observaciones FROM bienes where usuarioID=".$_SESSION['usuarioID']." ORDER BY observaciones ASC");
								}else{										
									$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien, observaciones FROM  bienes ".$cr." ORDER BY observaciones ASC");		
								}
							}

							$observaciones=array();
							while($observ=mysqli_fetch_assoc($consulta)){
								$observaciones[$observ["codBien"]] = $observ["observaciones"];
							}

							$ob2=array_unique($observaciones);
							foreach($ob2 as $idd =>$ob){ 
									if($ob!==$f12){
										$salida.='<option value="'.$ob.'">'.$ob.'</option>';
									}													
								}

							/*$tf1=(microtime(true)-$ti4);
							echo '<br>filtro bienes: '.number_format($tf1,5).'<br>';	
							$ti=microtime(true);*/

							$salida.= '		
								</select></td>	
					</tr>
				';
?>