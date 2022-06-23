<?php
	if(!isset($_SESSION['usuario'])){//Usuario visitante (sin privilegios. No puede acceder a las Apps) 
		include('02-appsEncabezadoGral.php');
		include('appsLogin/00-formularioLogin.php');
		include('appsLogin/06-formularioNuevoUsuario.php');
		echo'
			<div id="appsContenedor">';
				$datosApp=array(
					array("","appsArt/planeador.png","Planeador"),
					array("","appsArt/DUA.png","EduInclusiva"),
					array("","appsArt/cteApp.jpg","CTE App"),
					array("","appsArt/examCreator.jpg","Creador de Exámenes"),
					array("","appsArt/inventApp.png","Inventario App"),
					array("","appsArt/biblioAppOnPasiva.png","Biblio App"),
					array("","appsArt/tablet.jpg","Préstamo de Tabletas"),
					array("","appsArt/pollaMundialista.png","Polla Mundialista"),
					array("","appsArt/arcReactorOnPasiva.png","Proyecto Ironman"),
					array("JMproyects/JmLobby.html","https://i.imgflip.com/2/uab2a.jpg","Jm Lobby")
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
			<div id="parche">
			</div>
			<div id="h2">
				<H2>¡Loguéate y no te pierdas nuestras apps!</H2>
			</div>
		';
	}else{
		$codigo=$_SESSION['permiso'];
		if ($codigo==1) {//Usuario con resp [sug. add, sug. mod, sug. del], bienes propios unic. No admin. (Doc, Aux no conf.). Puede acceder a las Apps
			include('02-appsEncabezadoGral.php');
			include('appsLogin/03-formularioDatosUsuario.php');
			include('appsLogin/04-formularioNuevaContrasena.php');
			//include('../login/formularioNuevoUsuario.php');
			//include('03-appsMenuNavegacion.php');		
			echo '<div id="appsContenedor">';
						$datosApp=array(
						array("","appsArt/planeador.png","Planeador"),
						array("","appsArt/DUA.png","EduInclusiva"),
						array("CTEApp/index.php","appsArt/cteApp.jpg","CTE App"),
						array("creaExamen/index.php","appsArt/examCreator.jpg","Creador de Exámenes"),
						array("inventarioApp","appsArt/inventApp.png","Inventario App"),
						array("biblioTaparto/index.php","appsArt/biblioAppOnPasiva.png","Biblio App"),
						array("prestamoTabletas/index.php","appsArt/tablet.jpg","Préstamo de Tabletas"),
						array("pollaMundialista/index.php","appsArt/pollaMundialista.png","Polla Mundialista"),
						array("ironManProject/index.html","appsArt/arcReactorOnPasiva.png","Proyecto Ironman")
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
			include('02-appsEncabezadoGral.php');
			include('appsLogin/03-formularioDatosUsuario.php');
			include('appsLogin/04-formularioNuevaContrasena.php');
			include('03-appsMenuNavegacion.php');		
			echo '
				<div id="appsContenedor">';
					$datosApp=array(
					array("planeaApp/00-index.php","appsArt/planeador.png","Planeador"),
					array("eduInclusiva/index.php","appsArt/DUA.png","EduInclusiva"),
					array("SUVICT","appsArt/cteApp.jpg","SUVICT"),
					array("creaExamen/index.php","appsArt/examCreator.jpg","Creador de Exámenes"),
					array("inventarioApp","appsArt/inventApp.png","Inventario App"),
					array("biblioTaparto/index.php","appsArt/biblioAppOnPasiva.png","Biblio App"),
					array("prestamoTabletas/index.php","appsArt/tablet.jpg","Préstamo de Tabletas"),
					array("pollaMundialista/index.php","appsArt/pollaMundialista.png","Polla Mundialista"),
					array("ironManProject/index.html","appsArt/arcReactor.png","Proyecto Ironman"),
					array("SvS","appsArt/SvS.png","SINAI vs SIMAT")
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