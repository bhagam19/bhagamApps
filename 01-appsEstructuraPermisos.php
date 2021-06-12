<?php
	if(isset($_SESSION['usuario'])){
		$codigo=$_SESSION['permiso'];
		if($codigo==6){//Usuario SuperAdministrador Frontend y Backend (Desarrollador) 
			include('02-appsEncabezadoGral.php');
			include('appsLogin/03-formularioDatosUsuario.php');
			//include('appsLogin/04-formularioNuevaContrasena.php');
			//include('../login/formularioNuevoUsuario.php');
			//include('03-appsMenuNavegacion.php');		
			echo '
				<div id="appsContenedor">';
					$datosApp=array(
					array("planeaApp/00-index.php","appsArt/planeador.png","Planeador"),
					array("duaApp","appsArt/DUA.png","DUA - PIAR"),
					array("CTEApp/index.php","appsArt/cteApp.jpg","CTE App"),
					array("creaExamen/index.php","http://www.adolforuiz.xyz/creaExamen/imagenes/examCreator.jpg","Creador de Exámenes"),
					array("inventarioApp/index.php","appsArt/inventApp.png","Inventario App"),
					array("biblioTaparto/index.php","appsArt/biblioApp.png","Biblio App"),
					array("prestamoTabletas/index.php","https://www3.gobiernodecanarias.org/medusa/edublog/cprofestenerifesur/wp-content/uploads/sites/105/2015/07/tablet.jpg","Préstamo de Tabletas"),
					array("pollaMundialista/index.php","http://adolforuiz.xyz/pollaMundialista/principal/logo2.jpg","Polla Mundialista"),
					array("ironManProject/index.html","appsArt/arcReactor.png","Proyecto Ironman")
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
		}elseif($codigo==5){//Usuario SuperAdministrador Frontend (Rector)	
		}elseif($codigo==4){//User resp de bienes y Admin avdc. [add, mod, del], todos los bienes.(Coord., Secret., Aux. de Confianza)
		}elseif($codigo==3){//User resp de bienes y Admin bás. [sug. add, sug. mod, sug. del], todos los bienes. (Docente apoyo inventario)
		}elseif($codigo==2){//User no resp de bienes. Admin bás. [sug. add, sug. mod, sug. del], todos los bienes. (SSO)
		}elseif($codigo==1){//User resp [sug. add, sug. mod, sug. del], bienes propios unic. No admin. (Doc, Aux no conf.)
			include('02-appsEncabezadoGral.php');
			//include('appsLogin/03-formularioDatosUsuario.php');
			//include('appsLogin/04-formularioNuevaContrasena.php');
			//include('../login/formularioNuevoUsuario.php');
			//include('03-appsMenuNavegacion.php');		
			echo '<div id="appsContenedor">';
						$datosApp=array(
						array("","appsArt/planeador.png","Planeador"),
						array("","appsArt/DUA.png","DUA - PIAR"),
						array("CTEApp/index.php","appsArt/cteApp.jpg","CTE App"),
						array("creaExamen/index.php","http://www.adolforuiz.xyz/creaExamen/imagenes/examCreator.jpg","Creador de Exámenes"),
						array("inventarioApp/index.php","appsArt/inventApp.png","Inventario App"),
						array("biblioTaparto/index.php","appsArt/biblioApp.png","Biblio App"),
						array("prestamoTabletas/index.php","https://www3.gobiernodecanarias.org/medusa/edublog/cprofestenerifesur/wp-content/uploads/sites/105/2015/07/tablet.jpg","Préstamo de Tabletas"),
						array("pollaMundialista/index.php","http://adolforuiz.xyz/pollaMundialista/principal/logo2.jpg","Polla Mundialista"),
						array("ironManProject/index.html","appsArt/arcReactor.png","Proyecto Ironman")
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
	}else{//Usuario visitante (No tiene bienes a cargos, no administra)
		include('02-appsEncabezadoGral.php');
		include('appsLogin/00-formularioLogin.php');
		include('appsLogin/06-formularioNuevoUsuario.php');
		//include('03-appsMenuNavegacion.php');
		echo'
			<div id="appsContenedor">';
				$datosApp=array(
					array("","appsArt/planeador.png","Planeador"),
					array("","appsArt/DUA.png","DUA - PIAR"),
					array("","appsArt/cteApp.jpg","CTE App"),
					array("","http://www.adolforuiz.xyz/creaExamen/imagenes/examCreator.jpg","Creador de Exámenes"),
					array("","appsArt/inventApp.png","Inventario App"),
					array("","appsArt/biblioApp.png","Biblio App"),
					array("","https://www3.gobiernodecanarias.org/medusa/edublog/cprofestenerifesur/wp-content/uploads/sites/105/2015/07/tablet.jpg","Préstamo de Tabletas"),
					array("","http://adolforuiz.xyz/pollaMundialista/principal/logo2.jpg","Polla Mundialista"),
					array("","appsArt/arcReactor.png","Proyecto Ironman")
				);
				foreach ($datosApp as $App) {
					echo '
						<div id="boton">
							<a><img src='.$App[1].'><p>'.$App[2].'</p></a>
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
	}
?>