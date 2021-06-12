<?php
		include('../conexion/datosConexion.php');

		$salida="";
		$query="SELECT * FROM bienes ORDER BY nomBien";

		if(isset($_POST['consulta'])){
			$q = $mysqli -> real_scape_string($_POST['consulta']);
			$query = "SELECT codBien, nomBien, detalleDelBien,dependecias FROM bienes WHERE nomBien LIKE '%".$q."%' OR detalleDelBien LIKE '%".$q."%' OR dependecias LIKE '%".$q."%'";
		}
		$resultado= $mysqli->query($query);

		if($resultado->num_rows>0){
			

		}else{

		}

?>