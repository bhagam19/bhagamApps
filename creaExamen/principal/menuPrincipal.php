<?php
	header('Content-Type: text/html; charset=UTF-8'); 
?>
	<header id="barraMenu">
		<nav>
			<?php
				if(isset($_SESSION['usuario'])){
				@$pagina=end(explode("/",$_SERVER['PHP_SELF']));
				echo
				'
				<ul>
					<li>Menu Principal
						<ul>
							<li onclick="mostrarFormularios(\'.encabezadoFormulario\')">Encabezado</li>
							<li>Ver Respuestas</li>
							<li id="imprimir" onclick="imprimir()">Imprimir</li>
						</ul>
					</li>
					<li>Ver
						<ul>
				';
				if($pagina!="principal.php"){
					echo
					'
							<li onclick="location.href=\'../principal/principal.php\'">Matrix</li>
					';
				}
				if($pagina!="verPreguntasTipoImagen.php"){
					echo
					'
							<li onclick="location.href=\'../tipoImagenes/verPreguntasTipoImagen.php\'">Tipo Imágenes</li>
					';
				}
				echo
				'
						<!--<li>Parte 2</li>
							<li>Parte 3</li>-->
						</ul>
					</li>
				';
				
				echo
				'
					<li>Otro
						<ul>
							<li>Otro1</li>
							<li>Otro2</li>
							<li>Otro3</li>
							<li>Otro4</li>
						</ul>
					</li>					
				</ul>
				';
			}	
			?>
		</nav>
		<div id="usuario-registrado">
			<?php
			if(isset($_SESSION['usuario'])){
				echo 
				$_SESSION['nombres'].' '.$_SESSION['apellidos'].
				'
				<input class="submit2" type="button" onclick=location.href=\'../login/cerrarsesion.php\' value="Cerrar Sesión"/>
				';
			
			}else{
				echo
				'
					<input class="submit" type="button" onclick="mostrarFormularios(\'.loginFormulario\')" value="Iniciar Sesión"/>
				';
			}
			?>
		</div>
	</header>		