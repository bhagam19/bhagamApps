<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>
</script>

<?php
	$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
	$salt = strtr($salt, array('+' => '.')); 

	$pzz='../02-mostrarTablasenBD.php';
	$p01='../bdBienes/01-verBienes.php';
	$p02='../bdAlmacenamiento/01-bdAlmacenamiento.php';
	$p03='../bdClasesBienes/01-bdClasesBienes.php';
	$p04='../bdCategorias/01-bdCategoriasBienes.php';
	$p05='../bdDependencias/01-bdDependencias.php';
	$p06='../bdEstadodelBien/01-bdEstadodelBien.php';
	$p07='../bdMantenimiento/01-bdMantenimiento.php';
	$p08='../bdUbicaciones/01-bdUbicaciones.php';
	$p09='../bdUsuarios/01-bdUsuarios.php';
	$p20='../bdLogs/02-verLogs.php';
	$p21='../bdBienes/leerExcel.php';
	$p22='../03-borrarTablas.php';
	$p23='../bdBienes/expInventInd.php';
	$p24='../bdBienes/10.00-generarActadeEntrega.php';
	
	$pagina = isset($_GET['pg']) ? $_GET['pg'] : '../bdBienes/01-verBienes.php';
	
	$numPag=substr($pagina, 0, 4);	
	switch ($numPag) {		
		case '$pzz':
			$pagina=$pzz;
			break;
		case '$p00':
			$pagina=$p00;
			break;
		case '$p01':
			$pagina=$p01;
			break;
		case '$p02':
			$pagina=$p02;
			break;
		case '$p03':
			$pagina=$p03;
			break;
		case '$p04':
			$pagina=$p04;
			break;	
		case '$p05':
			$pagina=$p05;
			break;
		case '$p06':
			$pagina=$p06;
			break;
		case '$p07':
			$pagina=$p07;
			break;
		case '$p08':
			$pagina=$p08;
			break;
		case '$p09':
			$pagina=$p09;
			break;
		case '$p20':
			$pagina=$p20;
			break;
		case '$p21':
			$pagina=$p21;
			break;
		case '$p22':
			$pagina=$p22;
			break;
		case '$p23':
			$pagina=$p23;
			break;
		case '$p24':
			$pagina=$p24;
			break;
	}
	if(!isset($_SESSION['usuario'])){
		echo 
			'
				<div id="menuNavegacion"> 	
					<ul>
						<li><a href="../../index.php">Ir a Lista de Proyectos</a> </li>
						<li><a href="?pg=$p01">Inventario de Bienes</a></li>
					</ul>				
				</div>
			';
		
	}else{
		$codigo=$_SESSION['permiso'];
		if($codigo==6){
			echo 
			'
				<div id="menuNavegacion" class="menuNavegacion" onmouseenter="mostrarMenu()" onmouseleave="ocultarMenu()"> 
					<ul class="menu">						
						<li class="li"><a id="listProy" href="../../index.php"><img src="../art/atras.svg"></a></li>
						<li class="li"><a id="verBD" href="?pg=$pzz'.crypt($pzz,"$2y$10$".$salt).'"><img src="../art/bd.svg"></a></li>
						<li class="li"><a id="invBienes" href="?pg=$p01"><img src="../art/inventario.png"></a></li>
						<li class="li"><a id="admon" onclick="mostrarSubMenu()"><img src="../art/administracion.svg"></a></li>
							
							<ul class="submenuAdmon">
								<li class="li"><a href="?pg=$p02'.crypt($p02,"$2y$10$".$salt).'">Almacenamiento</a></li>
								<li class="li"><a href="?pg=$p03'.crypt($p03,"$2y$10$".$salt).'">Clases de Bienes</a></li>
								<li class="li"><a href="?pg=$p04'.crypt($p04,"$2y$10$".$salt).'">Categorías de Bienes</a></li>
								<li class="li"><a href="?pg=$p05'.crypt($p05,"$2y$10$".$salt).'">Dependencias</a></li>
								<li class="li"><a href="?pg=$p06'.crypt($p06,"$2y$10$".$salt).'">Estado del Bien</a></li>
								<li class="li"><a href="?pg=$p07'.crypt($p07,"$2y$10$".$salt).'">Estado de Mantenimiento</a></li>
								<li class="li"><a href="?pg=$p08'.crypt($p08,"$2y$10$".$salt).'">Ubicaciones</a></li>
								<li class="li"><a href="?pg=$p09'.crypt($p09,"$2y$10$".$salt).'">Usuarios</a></li>
								<li class="li"><a href="?pg=$p20'.crypt($p20,"$2y$10$".$salt).'">Ver Visitas</a></li>
							</ul>
							
						<li class="li"><a id="reiniciarBD" href="#" onClick="reinstalarBD()" style="cursor:pointer"><img src="../art/reiniciar.svg"></a></li>
						<li class="li"><a id="genActa" href="../bdBienes/10.00-generarActadeEntrega.php"><img src="../art/acta.svg"></a></li>
					</ul>				
				</div>
			';
		}
		if($codigo==1){
			echo 
			'
				<div id="menuNavegacion" class="menuNavegacion" onmouseenter="mostrarMenu()" onmouseleave="ocultarMenu()"> 	
					<ul class="menu" >
						<li class="li"><a id="invBienes" href="?pg=$p01"><img style="width:15px;height:15px" src="../art/inventario.png"></a></li>
						<li class="li"><a id="expExcel" href="?pg=$p23"><img style="width:15px;height:15px" src="../art/exportar.svg"></a></li>
					</ul>				
				</div>
			';
		}			
	}		

?>