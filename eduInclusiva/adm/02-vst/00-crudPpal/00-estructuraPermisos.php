<?php
	if(!isset($_SESSION['usuario'])){//Usuario visitante (sin privilegios. No puede acceder a las Apps) 
		include('01-encabezadoGral.php');
		include dirname(__FILE__).'../../01-crudLogin/00-formularioLogin.php';
		include dirname(__FILE__).'../../01-crudLogin/06-formularioNuevoUsuario.php';
		echo'
			<div id="appsContenedor">';
				/*$datosApp=array(
					array("","appsArt/planeador.png","Planeador"),
					array("","appsArt/DUA.png","EduInclusiva")
				);
				foreach ($datosApp as $App) {
					echo '
						<div id="boton">
							<a><img src='.$App[1].'><p>'.$App[2].'</p></a>
						</div> 
					';
				}
				*/
		echo'
			</div>
			<div id="parche">
			</div>
			<div id="h2">
				<H2>¡Inicia sesión y apoya la inclusión escolar!</H2>
			</div>
		';
	}else{
		$codigo=$_SESSION['permiso'];
		if ($codigo==1) {//Usuario con resp [sug. add, sug. mod, sug. del], bienes propios unic. No admin. (Doc, Aux no conf.). Puede acceder a las Apps
			include('04-encabezadoGral.php');
			include('appsLogin/03-formularioDatosUsuario.php');
			include('appsLogin/04-formularioNuevaContrasena.php');
			//include('../login/formularioNuevoUsuario.php');
			//include('03-appsMenuNavegacion.php');		
			echo '<div id="appsContenedor">';
						$datosApp=array(
						array("","appsArt/planeador.png","Planeador"),
						array("","appsArt/DUA.png","EduInclusiva")
					);
					foreach ($datosApp as $App) {
						echo '
							<div id="boton">
								<a href='.$App[0].'><img src='.$App[1].'><p>'.$App[2].'</p></a>
							</div>
						';
					}
			echo'
				</div>
				<div id="h2">
					<H2>¡Click y disfruta nuestras apps!</H2>
				</div>
			';
		}elseif($codigo==2){//User no resp de bienes. Admin bás. [sug. add, sug. mod, sug. del], todos los bienes. (SSO)
		}elseif($codigo==3){//User resp de bienes y Admin bás. [sug. add, sug. mod, sug. del], todos los bienes. (Docente apoyo inventario)
		}elseif($codigo==4){//User resp de bienes y Admin avdc. [add, mod, del], todos los bienes.(Coord., Secret., Aux. de Confianza)
		}elseif($codigo==5){//Usuario SuperAdministrador Frontend (Rector)	
		}elseif($codigo==6){//Usuario SuperAdministrador Frontend y Backend (Desarrollador) 
			include('01-encabezadoGral.php');
			include dirname(__FILE__).'../../01-crudLogin/01-formularioDatosUsuario.php';
			/*include('appsLogin/04-formularioNuevaContrasena.php');
			include('03-appsMenuNavegacion.php');*/
			echo '
				<div id="appsContenedor">';
					$datosApp=array(
					array("planeaApp/00-index.php","../appsArt/planeador.png","Planeador"),
					array("eduInclusiva/00-index.php","../appsArt/DUA.png","EduInclusiva")
			);
			foreach ($datosApp as $App) {
				echo '
					<div id="boton">
						<a href='.$App[0].'><img src='.$App[1].'><p>'.$App[2].'</p></a>
					</div>
				';
			}
			echo'
				</div>
				<div id="h2">
					<H2>¡Click y disfruta nuestras apps!</H2>
				</div>
			';
		}
	}
?>