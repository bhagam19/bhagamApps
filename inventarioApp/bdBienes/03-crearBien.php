<?php
	include('../conexion/datosConexion.php');	
	session_start();
	//Obtener variables.
	$id=$_REQUEST['id'];
	$nomBien=$_REQUEST['nomBien'];
	$cEspecial=$_REQUEST['cEspecial'];
	$cTamano=$_REQUEST['cTamano'];
	$material=$_REQUEST['material'];
	$color=$_REQUEST['color'];
	$marca=$_REQUEST['marca'];
	$otra=$_REQUEST['otra'];
	$estBien=$_REQUEST['estBien'];
	$tipoInv=$_REQUEST['tipoInv'];
	$depend=$_REQUEST['depend'];
	$origen=$_REQUEST['origen'];
	$fecha=$_REQUEST['fecha'];
	$precio=$_REQUEST['precio'];
	$cant=$_REQUEST['cant'];
	$almacen=$_REQUEST['almacen'];
	$mant=$_REQUEST['mant'];
	$observ=$_REQUEST['observ'];
	if($cEspecial==""){
		$cEspecial="N/A";
	}
	if($cTamano==""){
		$cTamano="N/A";
	}
	if($material==""){
		$material="N/A";
	}
	if($color==""){
		$color="N/A";
	}
	if($marca==""){
		$marca="N/A";
	}
	if($otra==""){
		$otra="N/A";
	}
	$detalleDelBien=$cEspecial."; ".$cTamano."; ".$material."; ".$color."; ".$marca."; ".$otra;
	$usuarioID="";
	$sql=mysqli_query($conexion,"SELECT usuarioID FROM dependencias WHERE codDependencias=".$depend);
	while($f=mysqli_fetch_array($sql)){
		$usuarioID=$f['usuarioID'];
	}
	$tabla='bienes';
	$sql01=mysqli_query($conexion,"INSERT INTO ".$tabla." (nomBien,detalleDelBien,origenDelBien,fechaAdquisicion,precio,cantBien,codCategoria,
															codDependencias,usuarioID,codAlmacenamiento,codEstado,codMantenimiento,observaciones) 
												VALUES ('".$nomBien."','".$detalleDelBien."','".$origen."','".$fecha."',".$precio.",".$cant.",".$tipoInv.",".$depend.",".$usuarioID.",".$almacen.",".$estBien.",".$mant.",'".$observ."')");
	if($sql01){
		echo "si";
	}else{	
		echo("Error description: " .mysqli_connect_errno());
		//echo "no";
	}
	$sql02=mysqli_query($conexion,"INSERT INTO detallesDeBienes (codBien, carEspecial, tamano, material, color, marca, otra) 
												VALUES (".$id.",'".$cEspecial."','".$cTamano."','".$material."','".$color."','".$marca."','".$otra."')");
	mysqli_close($conexion);
?>