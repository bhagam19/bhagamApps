<?php
	if(isset($_SESSION['usuario'])){
		$codigo=$_SESSION['permiso'];
		if($codigo==3){//Usuario SuperAdministrador Frontend y Backend (Desarrollador) 
			include('encabezadoGral.php');
			include('../login/formularioNuevaContrasena.php');			
			//include('../login/formularioNuevoUsuario.php');
			include('menuNavegacion.php');		
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
			include('encabezadoGral.php');
			include('../login/formularioNuevaContrasena.php');
			//include('../login/formularioNuevoUsuario.php');
			include('menuNavegacion.php');			
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
	
		include('encabezadoGral.php');

		include('../login/formularioLogin.php');

		//include('../login/formularioNuevoUsuario.php');

		include('menuNavegacion.php');
		
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