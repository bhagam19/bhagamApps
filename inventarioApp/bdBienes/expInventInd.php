<?php
	error_reporting(0);//Para que no muestre errores
	include('../conexion/datosConexion.php');

	//Agregamos la libreria para leer
	require '../Classes/PHPExcel/IOFactory.php';
	
	// Creamos un objeto PHPExcel
	$objPHPExcel = new PHPExcel();
	$objReader = PHPExcel_IOFactory::createReader('Excel2007');
	$objPHPExcel = $objReader->load('../bdBienes/inventarioIndividual.xlsx');
	// Indicamos que se pare en la hoja uno del libro
	$objPHPExcel->setActiveSheetIndex(0);
	$nombres="";

	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
		$sql=mysqli_query($conexion,"SELECT DISTINCT usuarioID,nombres FROM usuarios WHERE usuario=".$usuario);
		while($f=mysqli_fetch_array($sql)){
			$usuario=$f['usuarioID'];
			$nombres=$f['nombres'];
		}
		//Seleccionamos los registros pertenencientes al usuario actual
		$sql=mysqli_query($conexion,"SELECT DISTINCT * FROM bienes WHERE usuarioID=".$usuario);
		$numFilas = mysqli_num_rows($sql);
		$cnt=4;

		while($f=mysqli_fetch_array($sql)){
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$cnt,$f['codBien']);
			$sql1=mysqli_query($conexion,"SELECT DISTINCT nomClase FROM clasesDeBienes WHERE codClase=".$f['codCategoria']);
			while($f1=mysqli_fetch_array($sql1)){
				$nomCategoria=$f1['nomClase'];
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$cnt,$nomCategoria);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$cnt,$f['nomBien']);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$cnt,$f['detalleDelBien']);
			$sql1=mysqli_query($conexion,"SELECT DISTINCT nomDependencias,codUbicacion FROM dependencias WHERE codDependencias=".$f['codDependencias']);
			while($f1=mysqli_fetch_array($sql1)){
				$nomDependencia=$f1['nomDependencias'];
				$sql2=mysqli_query($conexion,"SELECT DISTINCT nomUbicacion FROM ubicaciones WHERE codUbicacion=".$f1['codUbicacion']);
				while($f2=mysqli_fetch_array($sql2)){
					$ubicacion=$f2['nomUbicacion'];
				}
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$cnt,$nomDependencia);
			$objPHPExcel->getActiveSheet()->SetCellValue('O'.$cnt,$ubicacion);
			$sql1=mysqli_query($conexion,"SELECT DISTINCT * FROM usuarios WHERE usuarioID=".$f['usuarioID']);
			while($f1=mysqli_fetch_array($sql1)){
				$responsable=$f1['nombres']." ".$f1['apellidos'];
				$id=$f1['usuarioCED'];
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$cnt,$responsable);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$cnt,$id);
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$cnt,$f['serieDelBien']);
			$objPHPExcel->getActiveSheet()->SetCellValue('J'.$cnt,$f['origenDelBien']);
			$objPHPExcel->getActiveSheet()->SetCellValue('K'.$cnt,$f['fechaAdquisicion']);
			$objPHPExcel->getActiveSheet()->SetCellValue('L'.$cnt,$f['precio']);
			$objPHPExcel->getActiveSheet()->SetCellValue('M'.$cnt,$f['cantBien']);
			$sql1=mysqli_query($conexion,"SELECT DISTINCT nomEstado FROM estadoDelBien WHERE codEstado=".$f['codEstado']);
			while($f1=mysqli_fetch_array($sql1)){
				$estado=$f1['nomEstado'];
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('N'.$cnt,$estado);
			$sql1=mysqli_query($conexion,"SELECT DISTINCT nomAlmacenamiento FROM almacenamiento WHERE codAlmacenamiento=".$f['codAlmacenamiento']);
			while($f1=mysqli_fetch_array($sql1)){
				$estadoUso=$f1['nomAlmacenamiento'];
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('P'.$cnt,$estadoUso);
			$sql1=mysqli_query($conexion,"SELECT DISTINCT nomMantenimiento FROM mantenimiento WHERE codMantenimiento=".$f['codMantenimiento']);
			while($f1=mysqli_fetch_array($sql1)){
				$mantenimiento=$f1['nomMantenimiento'];
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$cnt,$mantenimiento);
			$objPHPExcel->getActiveSheet()->SetCellValue('S'.$cnt,$f['observaciones']);
			$cnt++;
		}
	}
	
	//Guardamos los cambios
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$nomArchivo = "inventarioIndividual".str_replace(" ","",$nombres).".xlsx";
	$dirArch="../bdBienes/".$nomArchivo;
	
	$objWriter->save($dirArch);
	
	echo '<a title="Descargar Archivo" href="'.$dirArch.'" style="position:relative;left:150px;top:20px;font-size:14px; text-decoration:none; background:lightblue; box-shadow: 1px 1px 1px 1px gray; padding:5px; border-radius:10px">Descargar</a>';
	
 // <html>
 //   <head>
 //     <meta HTTP-equiv='REFRESH' content='0;url=../principal/00-principal.php'>
 //   </head>
 // </html>
 // ";   
  
?>