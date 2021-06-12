<?php
	
	if(!isset($_SESSION['usuario'])){
		echo 
			"<html>
				<head>
					<meta HTTP-equiv='REFRESH' content='0;url=../principal/principal.php'>
				</head>
			</html>";
	}else{
		$codigo=$_SESSION['permiso'];

		if($codigo==6){

			//Crear conexión.
			include('../conexion/datosConexion.php');
			//Establecer y Ejecutar la consulta.
			@$filtro=$_GET['filtro'];
			@$orderBy=$_GET['orderBy'];
			$tabla='logs';
	
			//
			if($orderBy){
				if($filtro&&$orderBy){
					//Si hay "orderBy" y tambien hay "filtro"
					$peticion=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE usuario='".$filtro."' ORDER BY ".$orderBy);
				}else{
					//Si hay "orderBy" pero no hay "filtro"
					$peticion=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$orderBy);
				}
			}elseif($filtro){
				//Si hay "filtro" únicamente.
				$peticion=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE usuario='".$filtro."'");
			}else{	
				//si no hay ni "filtro" ni "orderBy"
				$peticion=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY utc DESC"); 
			}

			//include('../principal/encabezado.php');	
			echo 
				'
					    <div>
			    			<br>
			    			<table>
			    			<tr>
			    				<td colspan="3"><input style="font-size:18px; color:blue;" type="button" onclick="location.href=\'../principal/principal.php\'" value="Ir a Principal" /></td>
			    			</tr>
			    			</table>
						</div>
				';	
		
			//Imprimir consulta.
			$consultaUsuarios = mysqli_query($conexion,"SELECT * FROM usuarios");	
				echo 
				'
				<div id="Base-de-Datos">
					<div class="Base-de-Datos" style="width:98%px">
						<table>
							<tr>
								<td style="font-size:24px;color:blue;font-weight:bolder">VISITAS:</td>
							</tr>
							<tr>
								<form method="GET" action="logsVer.php" >
								<td>Filtrar por Usuario: <select name="filtro">
												<option value="">Seleccione...</option>
												<option value="Anonimo">Anonimo</option>
				';
										while($usuarios=mysqli_fetch_array($consultaUsuarios)){
											echo'
												<option value="'.$usuarios['usuario'].'">'.$usuarios['usuario'].'</option>';
										}					
									
						echo '
									</select></td>
									
								<td><input type="submit"/></td>
								</form>
							</tr>
						</table
					
					<br><br>
					</div>
					<div class="logs" >
					<table border="1" width="100%">
					<thead>
						<td class="encabezado-tabla">Marca de Tiempo</td>
						<td class="encabezado-tabla">Fecha (dd/mm/aaa)</td>
						<td class="encabezado-tabla">Hora</td>					
						<td class="encabezado-tabla">Usuario</td>
						<td class="encabezado-tabla">Página</td>
						<td class="encabezado-tabla">IP</td>
						<td class="encabezado-tabla">Navegador</td>
					</thead>
					<tr>
						<td style="text-align:center">	<input type="button" value="▼" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=utc\'" style="color:red; font-size:8px;"/>
														<input type="button" value="▲" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=utc DESC\'" style="color:red; font-size:8px;"/></td>	
						<td style="text-align:center">	<input type="button" value="▼" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=mes\'" style="color:red; font-size:8px;"/>
														<input type="button" value="▲" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=mes DESC\'" style="color:red; font-size:8px;"/></td>	
						<td style="text-align:center">	<input type="button" value="▼" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=hora\'" style="color:red; font-size:8px;"/>
														<input type="button" value="▲" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=hora DESC\'" style="color:red; font-size:8px;"/></td>	
						<td style="text-align:center">	<input type="button" value="▼" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=usuario\'" style="color:red; font-size:8px;"/>
														<input type="button" value="▲" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=usuario DESC\'" style="color:red; font-size:8px;"/></td>	
						<td style="width:100px;text-align:center">	<input type="button" value="▼" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=pagVisitada\'" style="color:red; font-size:8px;"/>
														<input type="button" value="▲" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=pagVisitada DESC\'" style="color:red; font-size:8px;"/></td>	
						<td style="text-align:center">	<input type="button" value="▼" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=ip\'" style="color:red; font-size:8px;"/>
														<input type="button" value="▲" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=ip DESC\'" style="color:red; font-size:8px;"/></td>	
						<td style="text-align:center">	<input type="button" value="▼" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=navegador\'" style="color:red; font-size:8px;"/>
														<input type="button" value="▲" onclick="location.href=\'logsVer.php?filtro='.$filtro.'&orderBy=navegador DESC\'" style="color:red; font-size:8px;"/></td>	
						
					</tr>
					';		
		while($fila=mysqli_fetch_array($peticion)){				
			echo 
				'<tr>
					<td>'.$fila["utc"].'</td>
					<td>'.$fila["dia"].'/'.$fila["mes"].'/'.$fila["anio"].'</td>
					<td>'.$fila["hora"].':'.$fila["minuto"].':'.$fila["segundo"].'</td>
					<td>'.$fila["usuario"].'</td>
					<td>'.$fila["pagVisitada"].'</td>
					<td>'.$fila["ip"].'</td>
					<td>'.$fila["navegador"].'</td>
					
				</tr>';			
		}
		echo 
			'
						</table>
						</div>
					</div>
				</div>
			</body>
			';
	
		//Cerrar la conexión.
		mysqli_close($conexion);
	}else{
		echo "Tú no eres Administrador.";
	}	
}
?>