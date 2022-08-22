<?php
	include('02-EncGrl.php');
	echo'<div id="appsFormulario" class="contenedor-formularioslogin">';
	if(!isset($_SESSION['usuario'])){//Usuario visitante (sin privilegios. No puede acceder a las Apps) 		
		include dirname(__FILE__).'../../01-Login/01-formularioLogin.php';
		include dirname(__FILE__).'../../01-Login/04-formularioNuevoUsuario.php';		
	}else{
		include dirname(__FILE__).'/../01-Login/02-formularioDatosUsuario.php';
		include dirname(__FILE__).'/../01-Login/03-formularioNuevaContrasena.php';		
	}	
	echo'</div>';
	if(isset($_SESSION['usuario'])){//Usuario visitante (sin privilegios. No puede acceder a las Apps) 		
		include dirname(__FILE__).'/03-menu.php';	
	}	
	echo'<div id="appsContenedor">';
		include('04-body.php');				
	echo'</div>';
?>