<html>
	<head>
		<title>Resumen de Reserva</title>
		<link rel="shortcut icon" href="../principal/tableta04.ico" />
		<link rel="stylesheet" type="text/css" href="principal.css"/>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="scripts.js"></script>
	</head>
	
	<body>
	
		<div id="contenedor2" style="border:none;box-shadow:none;!important">
<?php
	session_name("presTablet");
	session_start();
	
	header('Content-Type: text/html; charset=UTF-8');
	include('../conexion/datosConexion.php');
	
	$reservacion=$_GET['id'];
	
	$tabla="reservaciones";
	$docente;
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE reservacionID=".$reservacion);
?> 
<div class="resumen" >
	<h1>RESUMEN DE RESERVA
		<span> Por favor, compruebe los datos registrados.</span>
	</h1>
<?php
	while($fila=mysqli_fetch_array($sql)){
		$sql2=mysqli_query($conexion,"SELECT * FROM docentes WHERE docenteID=".$fila['docenteID']);
		while($fila2=mysqli_fetch_array($sql2)){
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
				<li>Las tabletas deben ser devueltas el mismo día de fecha de reservación.</li>
			</div>
		';
	}
			
	$pag=$_GET["pag"];
	
	mysqli_close($conexion);	
	
	
?>

		<div id="volver" style="position:relative;top:30px;">
			<ul style="list-style:none;display:inline">
				<li style="display:inline"><a href='#' onclick="imprimir();">Imprimir</a></li>
				<li style="display:inline"><a href='<?php echo $pag;?>'>Volver</a></li>
			</ul>
		</div>
		<div id="firma" style="position:relative;left:400px;top:0px;display:none">
			<p>Firma: _____________________________________</p>
		</div><br><br>
    	<div id="firma2" style="position:relative;float:right;right:100px;top:0px;display:none;text-align:right">
			<p>Fecha Devolución: dia___ //mes___ //año_______</p>
			<p>Firma de Conformidad del Encargado: _____________________________________</p>
		</div>
        <div style="position:relative; margin:0 auto; top:200px; width:400px;height:100px;background:white;"></div>
	</div>	
	</div>
	</body>

</html>