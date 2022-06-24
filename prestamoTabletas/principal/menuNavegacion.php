<div id="menuUsuarios">
    <?php
		if(isset($_SESSION['usuario'])){
			$codigo=$_SESSION['permiso'];
			if($codigo==1){
				echo '
				    <ul>
				        <li onclick="mostrarFormularios(\'.formularioMiPerfil\')">Mi perfil</li>
				        <li onclick="mostrarFormularios(\'.formularioMisReservaciones\')">Mis Reservaciones</li>
				        <li oncliick="mostrarFormularios(\'.tablaRepositorioWeb\')">Repositorio WEB</li>
				    </ul>
				';
			}
		}
	?>
    
</div>