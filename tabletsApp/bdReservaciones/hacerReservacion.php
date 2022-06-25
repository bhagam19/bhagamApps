<html>
	<head>
		<title>RESUMEN DE RESERVA</title>
		<link rel="shortcut icon" href="tableta2.ico" />
		<link rel="stylesheet" type="text/css" href="principal.css"/>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="scripts.js"></script>
	</head>
	
	<body>
	
		<div id="contenedor2">
<?php
	session_name("presTablet");
	session_start();
	
	header('Content-Type: text/html; charset=UTF-8');
	include('../conexion/datosConexion.php');
	
	$tabla="docentes";
	$docente="";
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID=".$_SESSION['docenteID']);
	while($fila=mysqli_fetch_array($sql)){
		$docente=$fila['nombres']." ".$fila['apellidos'];
	}
	
	$docenteID=$_SESSION['docenteID'];
	$asignatura=$_POST['asignatura'];
	$grupo=$_POST['grupo'];
	$fecha=$_POST['fecha'];
	$horas=$_POST['horas'];
	$cantReservadas=$_POST['cantReservadas'];
	$cantidad=$_POST['cantidad'];
	$seriales;
	$t=$cantReservadas+1;
	$contador=1;
	
	$tabla='tabletas';
	$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY tabletaID");
	
	while($fila=mysqli_fetch_array($consulta)){
		if($fila['tabletaID']==$t){
			if(($contador<($cantidad+1))&&($fila['estado']==1)){
				if($fila['estado']==1){
		    		$estado="(buena)";
		    	}else{
		    		$estado="(mala)";
		    	}
	    		$tableta=$fila['tabletaID']."-".$fila['serial']." ".$estado;
	    		
	    		if($contador==1){
	    			$seriales="</br>";
	    		}
	    		if($contador%4==0){
	    			$seriales.="  ||  $tableta </br>";
	    		}else{
	    			$seriales.="  ||  $tableta";
	    		}
	    		
		    $contador++;
			}
			$t++;
		}
	}
	
	$tabla='reservaciones';
	$sql=mysqli_query($conexion,"INSERT INTO ".$tabla." (docenteID,asignatura,grupo,fecha,hora,cantidad,seriales)
				VALUES ($docenteID, '$asignatura','$grupo','$fecha','$horas','$cantidad','$seriales')");
	$ultimaReservacion;			
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY reservacionID");
	while($fila=mysqli_fetch_assoc($sql)){
		$ultimaReservacion=$fila['reservacionID'];
	}

?> 
<div class="resumen">
	<h1>RESUMEN DE RESERVA
		<span> Por favor, compruebe los datos registrados.</span>
	</h1>
<?php
	$miReservacion=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE reservacionID=".($ultimaReservacion));
	while($fila=mysqli_fetch_array($miReservacion)){
		
		$sql=mysqli_query($conexion,"SELECT * FROM docentes WHERE docenteID=".$fila['docenteID']);
		while($fila2=mysqli_fetch_array($sql)){
			$docente=$fila2['nombres']." ".$fila2['apellidos'];
		}
		
		echo '
			<label>
				<span class="etiqueta">Docente:</span>
				<span class="info">'.$docente.'</span>
			</label>
			<label>
				<span class="etiqueta">Asignatura:</span>
				<span class="info">'.$fila["asignatura"].'</span>  
			</label>
			<label>
				<span class="etiqueta">Grupo:</span>
				<span class="info">'.$fila["grupo"].'</span> 
			</label>
			<label>
					<span class="etiqueta">Fecha:</span>
					';
					
			$fecha=strtotime($fila['fecha']);
			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
			echo'
					<span class="info">'.$dias[date('w',$fecha)].", ".date('d',$fecha)." de ".$meses[date('n',$fecha)-1]." de ".date('Y',$fecha).'</span>
			</label>
			<label>
					<span class="etiqueta">Horas:</span>
					<span class="info">'.$fila["hora"].'</span>
			</label>
			<label>
					<span class="etiqueta">Cantidad:</span>
					<span class="info">'.$fila["cantidad"].'</span>
			</label>
			<label>
					<span class="etiqueta">Tabletas:</span>
			</label>
			<div class="tabletas">'.$fila["seriales"].'</div>
			
			<div class="reglamento">
			<h3 style="text-align:center">REGLAMENTO PARA USO EFECTIVO DE LAS TABLETAS </br> IE NORMAL SUPERIOR DE SAN ROQUE</h3>
			
			<p style="text-align:justify">El responsable de hacer entrega y recepción de las tabletas es el señor Adolfo Ruiz Hernández, Coordinador de Paz y 
			Convivencia. </p>
			<ul>
				<li> Se deben separar por el docente mínimo con dos días de anticipación, diligenciando el formato que se dispone para tal fin.</li>
				<li>Al reclamar, se debe verificar el número que se recibe y las condiciones de las mismas.</li>
				<li>En caso de que una tableta se encuentre en mal estado, el último docente que haya reservado dicha tableta será el responsable.</li>
				<li>No se debe quitar el protector de la tableta a menos que sea el docente quien asilo solicite.</li>
				<li>No deben salir de la institución por ningún motivo.</li>
				<li>En caso de ser necesaria la recarga electrica, esta debe ser hecha un día antes. Si por alguna razón en el momento 
				de la clase requiere de carga eléctrica se debe usar un regulador y no conectar directamente al toma corriente.</li>
				<li>No se debe modificar o tratar de alterar las configuraciones y funciones de los elementos de protección y 
				seguridad del equipo o del software.</li>
				<li>El uso del correo y redes sociales será solo con fines académicos y con autorizaciones específicas del docente.</li>
				<li>Al iniciar la clase los estudiantes deben tener sus manos limpias y no se debe consumir alimentos o ingerir 
				líquidos durante el desarrollo de la misma. </li>
				<li>Cada estudiante es responsable de cuidar su identidad digital. Por esta razón, el estudiantes debe cerrar las sesiones
				de servicios como correos electrónicos y redes sociales. </li>
				<li>Es necesario eliminar las cuentas personales de Google al terminar lasesión de clase, y así evitar que otros hagan uso de 
				estas.</li>
				<li>No está permitido que se instalen aplicaciones a menos que así lo solicite el docente.</li>
			</div>
		';
	}
			
	
	mysqli_close($conexion);	
	
	
?>

		<div id="volver">
			<ul style="list-style:none;display:inline">
				<li style="display:inline"><a href='#' onclick="imprimir();">Imprimir</a></li>
				<li style="display:inline"><a href='../principal/acceso.php'>Volver</a></li>
			</ul>
		</div>
		<div id="firma" style="position:relative;left:400px;top:20px;display:none">
			<p>Firma: _____________________________________</p>
		</div>
	</div>	
	</div>
	</body>

</html>