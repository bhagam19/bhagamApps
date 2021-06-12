<?php
	if(isset($_SESSION['usuario'])){
		$codigo=$_SESSION['permiso'];
		if($codigo==6){//Usuario SuperAdministrador Frontend y Backend (Desarrollador) 
			include('02-encabezadoGral.php');
			include('../login/03-formularioDatosUsuario.php');
			include('../login/04-formularioNuevaContrasena.php');	
			//include('../login/formularioNuevoUsuario.php');
			include('03-menuNavegacion.php');		
			echo
				'
					<div id="contenedor">
				';
						include($pagina);            
			echo 
				'
					</div>
				';
		}elseif($codigo==5){//Usuario SuperAdministrador Frontend (Rector)	
		}elseif($codigo==4){//User resp de bienes y Admin avdc. [add, mod, del], todos los bienes.(Coord., Secret., Aux. de Confianza)
		}elseif($codigo==3){//User resp de bienes y Admin bás. [sug. add, sug. mod, sug. del], todos los bienes. (Docente apoyo inventario)
		}elseif($codigo==2){//User no resp de bienes. Admin bás. [sug. add, sug. mod, sug. del], todos los bienes. (SSO)
		}elseif($codigo==1){//User resp [sug. add, sug. mod, sug. del], bienes propios unic. No admin. (Doc, Aux no conf.)
			include('02-encabezadoGral.php');
			include('../login/03-formularioDatosUsuario.php');
			include('../login/04-formularioNuevaContrasena.php');
			//include('../login/formularioNuevoUsuario.php');
			include('03-menuNavegacion.php');			
			echo
				'
					<div id="contenedor">
				';
						include($pagina);
			echo 
				'
					</div>
				';
		}
	}else{//Usuario visitante (No tiene bienes a cargos, no administra)
	
		include('02-encabezadoGral.php');

		include('../login/00-formularioLogin.php');

		//include('../login/formularioNuevoUsuario.php');

		include('03-menuNavegacion.php');
		
		echo
			'
				<div id="contenedor">
			';
					include($pagina); 
		echo 
			'
				</div>
			';
	}
	
?>