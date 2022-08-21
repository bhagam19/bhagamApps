<?php
	if(!isset($_SESSION['usuario'])){//Usuario visitante (sin privilegios. No puede acceder a las Apps) 
		include('02-EncGrl.php');
		include dirname(__FILE__).'../../01-Login/00-formularioLogin.php';
		include dirname(__FILE__).'../../01-Login/06-formularioNuevoUsuario.php';
		//include('03-appsMenuNavegacion.php');
		echo'<div class="otroContenedor"></div>	';
		echo'<div id="appsContenedor">';
		include('03-body.php');				
		echo'</div>';
	}
?>