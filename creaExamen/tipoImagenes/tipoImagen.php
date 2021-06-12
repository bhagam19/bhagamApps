<div id="contenedorParte1">
	<div id="titulo">
		IMAGENES <br><br>
	</div>
	<div id="instrucciones">
		<strong>Preguntas 1-5</strong><br>
		¿Cuál es el nombre de estas imágenes? <br>
		En las preguntas del <strong>1-5</strong>, marque <strong>A</strong>,
		<strong>B</strong> ó <strong>C</strong> en su hoja de respuesta.
	</div>
	<?php
	include('../conexion/conectarBD2.php');
	$usuario=$_SESSION['usuario'];
	
	$tabla='tipoImagen';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE usuario='".$usuario."' ORDER BY RAND() LIMIT 6;");
	$listado=array("A. ","B. ","C. ");
	$numPreg=0;
	while($fila=mysqli_fetch_array($sql)){
		$numPreg++;
		$opciones=array($fila['opcion1'],$fila['opcion2'],$fila['opcion3']);
		echo
		'
		<div id="contenedorPregunta" class="moverContPregunta">
			<div id="numeracion"><strong>'.$numPreg.'. </strong></div>
			<div id="contenedorImagen">
				<img class="imagenTipoImagen" src="../images/'.$fila['imagen'].'" border=1 width="60" height="60"/>
			</div>
			<div id="contenedorOpciones">
			';
			shuffle($opciones);
			$cont=0;
			foreach($opciones as $opcion){
				echo
					'				
					<strong>'.$listado[$cont].'</strong> '.$opcion.'<br>	
					';
				$cont++;
			}
			echo
			'
			</div>
			<div>
			</div>
		</div>
		';
	}
	?>
</div>