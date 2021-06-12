<div id="encabezadoGral">

<?php

	if(!isset($_SESSION['usuario'])){
		echo '<div class="btnMenu"><img title ="Menú" src="../art/menu.svg" onclick="alert(\'Inicia sesión para activar el menú.\')"></div>';
	}else{
		echo '<div class="btnMenu"><img title ="Menú" src="../art/menu.svg"></div>';
	}
?>
	<div class="logo">
		<img src="../art/escudo.png"/>
	</div>
	<div class="tituloCinta">
	   Inventario Institucional<br>IE Entrerríos
	</div>
	<div class="contenidoCinta">
		<ul>
			<li>Sistema de Inventarios</li>
			<li>Version: 2.0</li>
			<li>Creado por: <a href="https://www.facebook.com/adolfo.ruiz.79" target="_blank" style="text-decoration:none;color:#0B0B61">Adolfo Ruiz © 2019</a></li>
		</ul>	
	</div>	

	<?php

		if(!isset($_SESSION['usuario'])){

			echo '
					<div class="inicioSesionCinta" title="Click para iniciar sesión." onclick="mostrarLogin()">
						Iniciar Sesión
					</div>
			';
		}else{
			include('../conexion/datosConexion.php');
			$nombre="";
			$consulta=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario=".$_SESSION['usuario']);
			while($fila=mysqli_fetch_array($consulta)){
				$nombre=$fila['nombres']." ".$fila['apellidos'];
				$usuarioCED=$fila['usuarioCED'];
			}

			echo '
					<div id="sesionLogedIn">
						<div class="sesionImg" >
							<img src="../art/usuario.svg" title="Click para ver información del usuario."  onclick="mostrarDatosUsuario()">
						</div>
					</div>
			';
		}
	?>
</div>