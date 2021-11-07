	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset='UTF-8'" />

  		<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=0.6, maximun-scale=1.0, minimun-scale=0.2"/>﻿ 
		<title>Generador de Actas</title>
		<link rel="shortcut icon" href="inventario01.ico" />
		<link rel="stylesheet" type="text/css" href="00-actas.css" />
		<script>

			$(function(){
				//alert("La resolución de tu pantalla es: " + screen.width + " x " + screen.height);
				document.getElementById("contenedor").style.width = screen.width-293+"px";
				document.getElementById("contenedor").style.height = screen.height-215+"px";
			$("#formEditDet").draggable();
			});

			function imprimir(){
				window.print();
			}

			function cargarActa(usuarioID){
				// alert(usuarioID);	
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET","../bdBienes/10.01-cargarHoja.php?usuarioID="+usuarioID,false);
				xmlhttp.send();
				// alert(xmlhttp.responseText.trim());
				document.getElementById("hoja").innerHTML="";
				document.getElementById("hoja").innerHTML=xmlhttp.responseText.trim();
			}		

		</script>	
		
	</head>
	
	<body >

<?php
	include('../conexion/datosConexion.php');
	
	$sql=mysqli_query($conexion,"SELECT DISTINCT usuarioID FROM bienes ORDER BY usuarioID ASC");

	// $sql=mysqli_query($conexion,"SELECT DISTINCT usuarioID,nombres, apellidos FROM usuarios ORDER BY apellidos ASC");

	echo 
		'
		<div id="encabezadoGenerarActa">
			
			<a title="Ir a la página Principal" style="position:relative;top:8px;margin:3px;text-decoration:none" href="../principal/00-principal.php"><img style="width:25px; height:25px" src="../art/anterior.svg"></a> ||  
			<select onchange="cargarActa(this.value)">
				<option value="">Seleccione el Responsable...</option>';

			$usuarios=array();										
			while($f=mysqli_fetch_array($sql)){
				$sql02=mysqli_query($conexion,"SELECT usuarioID,apellidos,nombres FROM usuarios WHERE usuarioID=".$f['usuarioID']);
				while($f2=mysqli_fetch_array($sql02)){
					$usuarios[$f2["usuarioID"]] = $f2["apellidos"].' '.$f2["nombres"];
				}
			}	

			asort($usuarios);   
			$u2=array_unique($usuarios);
			foreach($u2 as $idd =>$u){ 
				echo '<option value="'.$idd.'">'.$u.'</option>';
			}
	echo'
			</select> ||
			<a title="Imprimir Acta" style="position:relative;top:8px;margin:3px;text-decoration:none" ><img style="width:25px; height:25px" src="../art/impresora.svg" onclick="imprimir()"></a>

			<br><hr>
		</div>

		<div id="hoja">';

		include('10.01-cargarHoja.php');

	echo
	'
		</div>
		
	  		';	
	  		

?>

	</body>
</html>
