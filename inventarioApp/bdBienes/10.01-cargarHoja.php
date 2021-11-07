	<?php
include('../conexion/datosConexion.php');

date_default_timezone_set('America/Bogota');

function fechaCastellano ($fecha) {
	$fecha = substr($fecha, 0, 10);
	$numeroDia = date('d', strtotime($fecha));
	$dia = date('l', strtotime($fecha));
	$mes = date('F', strtotime($fecha));
	$anio = date('Y', strtotime($fecha));
	$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
	$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	$nombredia = str_replace($dias_EN, $dias_ES, $dia);
	$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
	$time = time();
	$hora= strftime("%I:%M ").strtolower(strftime("%p"));
	return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio.", ".$hora;
}
	
$miFecha = date('d-m-Y H:i:s');

@$usuarioID=$_GET['usuarioID'];
$responsable="";
$CED="";
$cont1=0;
$cont2=0;
$pgActa=1;

include('10.02-cargarEncabezadoHoja.php');

	echo'
			<div id="identificacion">
				<h4 style="text-align:center;">ACTA DE ENTREGA DE INVENTARIO // '.$responsable.' - Página '.$pgActa.'</h4>	
				<h4 style="font-weight:normal;text-align:left;">Entrerríos, '.fechaCastellano($miFecha).'</h4>
				<h4 style="font-weight:normal;text-align:justify">El Rector de la IE Entrerríos hace entrega del siguiente inventario al Docente <span style="font-weight:bold">'.$responsable.'</span>, identificado con CC. '.@number_format($CED).'.</h4>
			</div>

			<div id="tabla2">	
				<br>
				<table border="1" style="border-collapse:collapse">	
					<thead>
						<tr id="encabezadoTabla">
							<th style="width:130px">BIENES ASIGNADOS</th>
							<th style="width:230px">DETALLE</th>
							<th style="width:200px">DEPENDENCIA</th>
							<th>CANT</th>
							<th>ESTADO</th>
						</tr>						
					</thead>
					<tbody>	';

						if($usuarioID){
							$sql=mysqli_query($conexion,"SELECT nomBien,detalleDelBien,codDependencias,cantBien,codEstado,codAlmacenamiento FROM bienes WHERE usuarioID=".$usuarioID." ORDER BY nomBien ASC");
							while($f=mysqli_fetch_assoc($sql)){

								$sql1=mysqli_query($conexion,"SELECT codUbicacion,nomDependencias FROM dependencias WHERE codDependencias=".$f['codDependencias']);
								while($f1=mysqli_fetch_assoc($sql1)){
									$nomDependencias=$f1['nomDependencias'];
									$sql2=mysqli_query($conexion,"SELECT nomUbicacion FROM ubicaciones WHERE codUbicacion=".$f1['codUbicacion']);
									while($f2=mysqli_fetch_assoc($sql2)){
										$nomUbicacion=$f2['nomUbicacion'];
									}
								}
								$sql1=mysqli_query($conexion,"SELECT nomEstado FROM estadoDelBien WHERE codEstado=".$f['codEstado']);
								while($f1=mysqli_fetch_assoc($sql1)){
									$nomEstado=$f1['nomEstado'];									
								}
								$sql1=mysqli_query($conexion,"SELECT nomAlmacenamiento FROM almacenamiento WHERE codAlmacenamiento=".$f['codAlmacenamiento']);
								while($f1=mysqli_fetch_assoc($sql1)){
									$nomAlmacenamiento=$f1['nomAlmacenamiento'];									
								}					

								if($f['codEstado']!=4){
									echo'
										<tr style="font-size:11px;height:25px">
											<td>'.$f['nomBien'].'</td>
											<td>'.$f['detalleDelBien'].'</td>
											<td>'.$nomDependencias.'</td>
											<td style="text-align:center">'.$f['cantBien'].'</td>
											<td>'.$nomEstado.'</td>
										</tr>';

									$pg1=27;
									$pgS=31;

									$cont1++;
									if($cont1>$pg1){
										$cont2++;
									}

									// echo 'cont1: '.$cont1.' || ';
									// echo 'cont2: '.$cont2.'<br>';
		
									if(($cont1==$pg1||$cont1==$pg1+1)||($cont2>1&&$cont2%$pgS==0)){
										$cont1=$cont1+2;
										$pgActa++;
										echo'
													</tbody>
												</table>

												<br><span style="font-weight:bold;right:0px">CONTINÚA A PÁGINA '.$pgActa.'  ===> </span><br>';

										// echo 'pag: '.$pgActa.'<br>';
										// echo 'cont1: '.$cont1.'<br>';
										// echo 'cont2: '.$cont2.'<br>';
										// echo 'mod: '.$cont2%7;

										echo'
											</div>';

										include('10.03-cargarPieHoja.php');

										echo'<hr id="breakline">';
										
										include('10.02-cargarEncabezadoHoja.php');

										echo'
											<h4 id="tituloPagina" style="text-align:center;">ACTA DE ENTREGA DE INVENTARIO // '.$responsable.' - Página '.$pgActa.'</h4>

											<div id="tabla2">	
												<table border="1" style="border-collapse:collapse">	
													<thead>
														<tr id="encabezadoTabla">
															<th style="width:120px">BIENES ASIGNADOS</th>
															<th style="width:300px">DETALLE</th>
															<th style="width:120px">DEPENDENCIA</th>
															<th>CANT</th>
															<th>ESTADO</th>
														</tr>						
													</thead>
													<tbody>	';										
									}
								}							
							}
						}
					
					echo'

					</tbody>
				</table>
			</div>

			<div id="firmas">';

				if($pgActa==1){
					switch ($cont1) {
						case ($cont1>=21):
							$pgActa++;
							echo 
								'
								<div>
									<h4 style="font-weight:normal;text-align:justify">Quien recibe se compromete a administrar de manera eficiente el recurso entregado y a  darle el uso adecuado para su conservación y aprovechamiento.</h4>
								</div>
								<div>	
									<table border="0" style="border-collapse:collapse">						
										<tr style="">
											<td>Quien recibe:</td>
											<td></td>
											<td></td>
										</tr>
										<tr style="">
											<td></td>
											<td>Nombre: </td>
											<td style="font-weight:bold">'.$responsable.'</td>
										</tr>	
										<tr style="">
											<td></td>
											<td>Cargo: </td>
											<td> Docente &nbsp &nbsp &nbsp &nbsp CC. '.@number_format($CED).'</td>
										</tr>
									</table>
								<div>
								<hr id="hr1">
								<h4 id="tituloPagina2" style="text-align:center;">ACTA DE ENTREGA DE INVENTARIO // '.$responsable.' - Página '.$pgActa.'</h4>
								<div>	
									<br><br><br>
									<table border="0" style="border-collapse:collapse">						
										<tr style="">
											<td>Quien supervisa:</td>
											<td></td>
											<td></td>
										</tr>
										<tr style="">
											<td></td>
											<td>Nombre: </td>
											<td style="font-weight:bold"> ADOLFO LEÓN RUIZ HERNÁNDEZ</td>
										</tr>	
										<tr style="">
											<td></td>
											<td>Cargo: </td>
											<td> Rector. &nbsp &nbsp &nbsp &nbsp CC. 71.379.517</td>
										</tr>
										<tr>
											<td><br></td>
										</tr>
									</table>
								</div>		
								';
							break;
						case ($cont1>17):
							$pgActa++;
							echo 
								'<div>	
									<h4 style="font-weight:normal;text-align:justify">Quien recibe se compromete a administrar de manera eficiente el recurso entregado y a  darle el uso adecuado para su conservación y aprovechamiento.</h4>
								</div>
								<br>
								<div>	
									<table border="0" style="border-collapse:collapse">						
										<tr style="">
											<td>Quien recibe:</td>
											<td></td>
											<td></td>
										</tr>
										<tr style="">
											<td></td>
											<td>Nombre: </td>
											<td style="font-weight:bold">'.$responsable.'</td>
										</tr>	
										<tr style="">
											<td></td>
											<td>Cargo: </td>
											<td> Docente &nbsp &nbsp &nbsp &nbsp CC. '.@number_format($CED).'</td>
										</tr>
										<tr>
											<td><br></td>
										</tr>
										<tr style="">
											<td>Quien supervisa:</td>
											<td></td>
											<td></td>
										</tr>
										<tr style="">
											<td></td>
											<td>Nombre: </td>
											<td style="font-weight:bold"> ADOLFO LEÓN RUIZ HERNÁNDEZ</td>
										</tr>	
										<tr style="">
											<td></td>
											<td>Cargo: </td>
											<td> Rector. &nbsp &nbsp &nbsp &nbsp CC. 71.379.517</td>
										</tr>
										<tr>
											<td><br></td>
										</tr>										
									</table>
								</div>
								<hr id="hr1">
								<h4 id="tituloPagina2" style="text-align:center;">ACTA DE ENTREGA DE INVENTARIO // '.$responsable.' - Página '.$pgActa.'</h4>
								<div>	
									<br><br><br>
									
								</div>

								';
							break;
						case ($cont1<=17):
							echo 
								'<div>	
									<h4 style="font-weight:normal;text-align:justify">Quien recibe se compromete a administrar de manera eficiente el recurso entregado y a  darle el uso adecuado para su conservación y aprovechamiento.</h4>
								</div>
								<br>
								<div>	
									<table border="0" style="border-collapse:collapse">						
										<tr style="">
											<td>Quien recibe:</td>
											<td></td>
											<td></td>
										</tr>
										<tr style="">
											<td></td>
											<td>Nombre: </td>
											<td style="font-weight:bold">'.$responsable.'</td>
										</tr>	
										<tr style="">
											<td></td>
											<td>Cargo: </td>
											<td> Docente &nbsp &nbsp &nbsp &nbsp CC. '.@number_format($CED).'</td>
										</tr>
										<tr>
											<td><br></td>
										</tr>
										<tr style="">
											<td>Quien supervisa:</td>
											<td></td>
											<td></td>
										</tr>
										<tr style="">
											<td></td>
											<td>Nombre: </td>
											<td style="font-weight:bold"> ADOLFO LEÓN RUIZ HERNÁNDEZ</td>
										</tr>	
										<tr style="">
											<td></td>
											<td>Cargo: </td>
											<td> Rector. &nbsp &nbsp &nbsp &nbsp CC. 71.379.517</td>
										</tr>
										<tr>
											<td><br></td>
										</tr>
										
									</table>
								</div>';
							break;
					}
				}else{
					echo 
					'<div>	
						<h4 style="font-weight:normal;text-align:justify">Quien recibe se compromete a administrar de manera eficiente el recurso entregado y a  darle el uso adecuado para su conservación y aprovechamiento.</h4>
					</div>
					<br>
					<div>	
						<table border="0" style="border-collapse:collapse">						
							<tr style="">
								<td>Quien recibe:</td>
								<td></td>
								<td></td>
							</tr>
							<tr style="">
								<td></td>
								<td>Nombre: </td>
								<td style="font-weight:bold">'.$responsable.'</td>
							</tr>	
							<tr style="">
								<td></td>
								<td>Cargo: </td>
								<td> Docente &nbsp &nbsp &nbsp &nbsp CC. '.@number_format($CED).'</td>
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<tr style="">
								<td>Quien supervisa:</td>
								<td></td>
								<td></td>
							</tr>
							<tr style="">
								<td></td>
								<td>Nombre: </td>
								<td style="font-weight:bold"> ADOLFO LEÓN RUIZ HERNÁNDEZ</td>
							</tr>	
							<tr style="">
								<td></td>
								<td>Cargo: </td>
								<td> Rector. &nbsp &nbsp &nbsp &nbsp CC. 71.379.517</td>
							</tr>
							<tr>
								<td><br></td>
							</tr>
							
						</table>
					</div>';
				}

			echo
			'
			</div>
			';

include('10.03-cargarPieHoja.php');
	
?>