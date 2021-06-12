<?php
session_start();

include('encabezado.php');
?>

			<div id="cuerpo-principal">
				<?php
				include('menuNavegacion.php');
				include('menuBuscar.php');
				?>				
				<div id="recomendados">
					Algunos libros que te podrían interesar:
					<br><br>						
						<?php
						
							$pagina="../principal/principal";
							$link="Principal";
							
							include('../bdLogs/logsEscribir.php');
							include('../conexion/datosConexion.php');
							
							$tabla='libros';
							$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY RAND() LIMIT 3;");
							while($fila=mysqli_fetch_array($sql)){
							echo '
							<div style="background:#BBDDFF;border:1px solid black;border-radius:5px">
								<table class="recomendados" border=0 width=100%>	
										<tr border=0>
										<td rowspan="10" style="text-align:center;">
										';
										if($fila['imagen']){
											echo'
											<img src="../portadas/'.$fila['imagen'].'" width=200 height =300>
											';
										}else{
											echo 'No hay imagen disponible';
										}
										
										echo'
										</td>
										<td style="font-weight:bold;">Codigo:</td>
										';
								switch($fila["areaConocimiento"]){
									case "0-Computadoras, información y generales":
										echo '<td style="border-radius:15px;text-align:center;background:white;color:black;width:120px">'.$fila["codigo"].'</td>
												<td style="width:200px"></td>
												<td ></td>';
										break;
									case "1-Filosofía y psicología":
										echo '<td style="border-radius:15px;text-align:center;background:black;color:white;width:120px">'.$fila["codigo"].'</td>
												<td style="width:200px"></td>
												<td ></td>';
										break;
									case "2-Religión":
										echo '<td style="border-radius:15px;text-align:center;background:#FF00DD;color:black;width:120px">'.$fila["codigo"].'</td>
												<td style="width:200px"></td>
												<td ></td>';
										break;
									case "3-Ciencias sociales":
										echo '<td style="border-radius:15px;text-align:center;background:red;color:black;width:120px">'.$fila["codigo"].'</td>
												<td style="width:200px"></td>
												<td ></td>';
										break;
									case "4-Lingüistica":
										echo '<td style="border-radius:15px;text-align:center;background:lightgreen;color:black;width:120px">'.$fila["codigo"].'</td>
												<td style="width:200px"></td>
												<td ></td>';
										break;
									case "5-Ciencia y matemáticas":
										echo '<td style="border-radius:15px;text-align:center;background:lightblue;color:black;width:120px">'.$fila["codigo"].'</td>
												<td style="width:200px"></td>
												<td ></td>';
										break;
									case "6-Tecnología":
										echo '<td style="border-radius:15px;text-align:center;background:yellow;color:black;width:120px">'.$fila["codigo"].'</td>
												<td style="width:200px"></td>
												<td ></td>';
										break;
									case "7-Arte y recreación":
										echo '<td style="border-radius:15px;text-align:center;background:purple;color:white;width:120px">'.$fila["codigo"].'</td>
												<td style="width:200px"></td>
												<td ></td>';
										break;
									case "8-Literatura":
										echo '<td style="border-radius:15px;text-align:center;background:blue;color:white;width:120px">'.$fila["codigo"].'</td>
												<td style="width:200px"></td>
												<td ></td>';
										break;
									case "9-Historia y geografía":
										echo '<td style="border-radius:15px;text-align:center;background:brown;color:white;width:120px">'.$fila["codigo"].'</td>
												<td style="width:200px"></td>
												<td ></td>';
										break;									
								}
								echo'
									</tr>	
									<tr>
										<td style="font-weight:bold;">Título:</td>
										<td colspan="3" style="width:320px">'.$fila["titulo"].'</td>
									</tr>
									<tr>
										<td style="font-weight:bold;">Autor:</td>
										<td colspan="3">'.$fila["nombreAutor"].' '.$fila["apellidoAutor"].'</td>
									</tr>
									<tr>
										<td style="font-weight:bold;">Materia:</td>		
										<td colspan="3">'.$fila["materia"].'</td>			
									</tr>
									<tr>
										<td style="font-weight:bold;">Año:</td>
										<td colspan="3">'.$fila["yearPublicacion"].'</td>
									</tr>
									<tr>
										<td style="font-weight:bold;">Edición:</td>
										<td colspan="3">'.$fila["volumen"].'</td>
									</tr>	
									<tr>
										<td style="font-weight:bold;">Cantidad:</td>
										<td colspan="3">'.$fila["cantEjemplares"].'</td>
									</tr>
									<tr>
										<td style="font-weight:bold;">Páginas:</td>
										<td colspan="3">'.$fila["numPaginas"].'</td>
									</tr>
									<tr>
										<td></td>
										<td colspan="3" style="height:20px"></td>
									</tr>
									<tr>
										<td></td>
										<td colspan="3"><input type="button" value="Reservar" style="position:relative;float:right;"/></td>
									</tr>
									<tr height=20px>
									</tr>
								</table> 
							</div><br>
							';
							}
						?>
									
				</div>
			</div>			
		<!--<div id="piedepagina">
			   <div class="contenido-piedepagina content">
					<ul>
						<li>© 2013 Biblio App </li>
						<li style="color:green">Diseñó: Adolfo Ruiz</li>
						<li><a href="" target="_blank">Ayuda</a></li>
					</ul>
			  </div>
			</div>-->
			<div id="corte">
			</div>					
		</div>		
	</body>	
	
</html>

