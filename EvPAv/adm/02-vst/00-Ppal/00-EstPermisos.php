<?php
	include('01-EncGrl.php');	
	if(!isset($_SESSION['usuario'])){//Usuario visitante (sin privilegios. No puede acceder a las Apps) 
		//include dirname(__FILE__).'../../01-crudLogin/00-formularioLogin.php';
		//include dirname(__FILE__).'../../01-crudLogin/06-formularioNuevoUsuario.php';		
		echo'<div id="appsContenedor">';
		include('02-seleccionTipoReporte.php');				
		echo'</div>';
	}else{
		$codigo=$_SESSION['permiso'];
		if ($codigo==1) {//Usuario con resp [sug. add, sug. mod, sug. del], bienes propios unic. No admin. (Doc, Aux no conf.). Puede acceder a las Apps
			//include('appsLogin/03-formularioDatosUsuario.php');
			//include('appsLogin/04-formularioNuevaContrasena.php');
			echo'<div id="appsContenedor">';
			include('02-formularioCargueDatos.php');
			include('02-seleccionTipoReporte.php');
			echo'</div>';	
		}
	}
?>