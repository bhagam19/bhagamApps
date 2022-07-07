<?php
	if(!isset($_SESSION['usuario'])){//Usuario visitante (sin privilegios. No puede acceder a las Apps) 
		include('01-EncGrl.php');
		//include dirname(__FILE__).'../../01-crudLogin/00-formularioLogin.php';
		//include dirname(__FILE__).'../../01-crudLogin/06-formularioNuevoUsuario.php';
		echo'<div id="appsContenedor">';
		include('02-home.php');				
		echo'</div>';
	}
?>