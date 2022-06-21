<?php
    session_name("inventarioIET");
    session_start();
    
    include('../bdconexion/datosConexion.php');
    $docente;
    $tabla='docentes';
    $sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID=".$_SESSION['docenteID']);
    while($fila=mysqli_fetch_array($sql)){
        $docente=$fila['nombres']." ".$fila['apellidos'];
    }
    $tabla='reservaciones';
    $sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID='".$_SESSION['docenteID']."' ORDER BY reservacionID");
?>

<div id="separador" style="display:none;"></div>
<div id="formulario1" class="formularioMisReservaciones"> 	
	<div id="handler" >
		<a class="cerrar">X</a>
		<?php 
		    echo '
		        <p>MIS RESERVACIONES </p><br>
		        <p>'.$docente.'</p>';
		?>
	</div>
	<form method="POST" action="acceso.php" nombre="misReservaciones">
	<div class="formulario" style="height:400px;overflow:auto">
		<div id="modificable">  
	            <table class="tabla" width="">
	                <thead>
	                    <th>No. RESERVACIÓN</th>
	                    <th>ASIGNATURA</th>
	                    <th>GRUPO</th>
	                    <th>FECHA</th>
	                    <th>HORAS</th>
	                    <th>CANTIDAD</th>
	                </thead>
	                <tbody>
	                <?php
	                    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
            			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
	                    while($fila=mysqli_fetch_array($sql)){
	                        $fecha=strtotime($fila['fecha']);
	                          echo '
                                <tr onclick="location.href=\'../bdReservaciones/mostrarReserva.php?id='.$fila["reservacionID"].'&pag=..'.$_SERVER["PHP_SELF"] .'\'">
                                    <td>'.$fila["reservacionID"].'</td>
                                    <td>'.$fila["asignatura"].'</td>
                                    <td>'.$fila["grupo"].'</td>
                                    <td>'.$dias[date('w',$fecha)].", ".date('d',$fecha)." de ".$meses[date('n',$fecha)-1]." de ".date('Y',$fecha).'</td>
                                    <td>'.$fila["hora"].'</td>
                                    <td>'.$fila["cantidad"].'</td>
                                </tr>
	                          '; 
	                    }
	                ?>
	                </tbody>
	            </table>
		</div>
	</div>
	</form>
</div>