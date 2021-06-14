<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<?php
	$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
	$salt = strtr($salt, array('+' => '.'));
	$pzz='';
	$p01='inventarioApp/index.php';
	$p02='CTEApp/index.php';
	$p03='prestamoTabletas/index.php';
	$p04='biblioTaparto/index.php';
	$p05='pollaMundialista/index.php';
	$p06='creaExamen/index.php';
	$p07='ironManProject/index.html';
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
	}
	if(!isset($_SESSION['usuario'])){
		//Por ahora en este proyecto, la sesión de usuario visitante no tendrá ningún menú asignado. Ni siquiera se carga en la estructura.
		//Por ahora dejo el siguiente código, por si después se decide asignar algún menú.
		echo'
			<div id="menuNavegacion"> 	
				<ul>
					<li><a href="">Opción 01</a> </li>
					<li><a href="">Opción 02</a></li>
				</ul>				
			</div>
		';
	}else{
		$codigo=$_SESSION['permiso'];
		if($codigo==1){
			//Por ahora en este proyecto, la sesión de usuario nivel 1 no tendrá ningún menú asignado. Ni siquiera se carga en la estructura.
			//Por ahora dejo el siguiente código (para que sirva como guía, por si después se decide asignar algún menú)
			echo 
			'
				<div id="menuNavegacion" class="menuNavegacion" onmouseenter="mostrarMenu()" onmouseleave="ocultarMenu()"> 	
					<ul class="menu" >
						<li class="li"><a id="invBienes" href="?pg=$p01"><img style="width:15px;height:15px" src="../art/inventario.png"></a></li>
						<li class="li"><a id="expExcel" href="?pg=$p23"><img style="width:15px;height:15px" src="../art/exportar.svg"></a></li>
					</ul>				
				</div>
			';
		}elseif($codigo==6){
			echo'
				<div id="menuNavegacion" class="menuNavegacion" onmouseenter="mostrarMenu()" onmouseleave="ocultarMenu()"> 
					<ul class="menu">						
						<li class="li"><a id="verBD" href="?pg=$pzz'.crypt($pzz,"$2y$10$".$salt).'"><img src="appsArt/bdOnPasiva.png"></a></li>
						<li class="li"><a id="admon" onclick="mostrarSubMenu()"><img src="appsArt/administracion.svg"></a></li>							
							<ul class="submenuAdmon">
								<li class="li"><a href="?pg=$p02'.crypt($p02,"$2y$10$".$salt).'">Almacenamiento</a></li>
								<li class="li"><a href="?pg=$p03'.crypt($p03,"$2y$10$".$salt).'">Clases de Bienes</a></li>
								<li class="li"><a href="?pg=$p04'.crypt($p04,"$2y$10$".$salt).'">Categorías de Bienes</a></li>
								<li class="li"><a href="?pg=$p05'.crypt($p05,"$2y$10$".$salt).'">Dependencias</a></li>
								<li class="li"><a href="?pg=$p06'.crypt($p06,"$2y$10$".$salt).'">Estado del Bien</a></li>
								<li class="li"><a href="?pg=$p07'.crypt($p07,"$2y$10$".$salt).'">Estado de Mantenimiento</a></li>
								<li class="li"><a href="?pg=$p07'.crypt($p07,"$2y$10$".$salt).'">Usuarios</a></li>
							</ul>
					</ul>				
				</div>
			';
		}					
	}
?>