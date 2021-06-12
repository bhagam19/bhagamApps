
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/test01.ico" />
		<title>Creador de Examenes</title>
		<link type="text/css" rel="stylesheet" href="../css/estiloClasico.php" id="css"/>
		<script type="text/javascript" src="../jquery/jquery.ui.core.js"></script>
		<script type="text/javascript" src="../jquery/jquery.ui.draggable.js"></script>
		<script type="text/javascript" src="../jquery/jquery.ui.mouse.js"></script>
		<script type="text/javascript" src="../jquery/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="../jquery/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="../jquery/jquery-ui.custom.js"></script>
		<script type="text/javascript" src="principal.js"></script>
		
		<script>
			function estiloClasico(){
				document.getElementById("css").href="../css/estiloClasico.php";
				document.getElementById("verde").checked="";
				document.getElementById("azul").checked="";
			}
			function estiloVerde(){
				document.getElementById("css").href="../css/jarvisVerde.php";
				document.getElementById("clasico").checked="";
				document.getElementById("azul").checked="";
			}
			function estiloAzul(){
				document.getElementById("css").href="../css/jarvisAzul.php";
				document.getElementById("clasico").checked="";
				document.getElementById("verde").checked="";
			}
			
		</script>
		
	</head>
<?php
session_start();
include('cambiarApariencia.php');
include('menuPrincipal.php');
include('encabezadoFormulario.php');
include('../login/loginFormulario.php');
?>	
	<body>	
		<?php
		$numExam=1;		
			for($i=0;$i<$numExam;$i++){
				echo
				'
					<div id="contenedorPpal">
						<div id="bloque1">
				';
				if(isset($_SESSION['usuario'])){
					echo
					'						
					<div id="cobertor" style="height:50px;"></div>
						<div id="encabezado" class="moverEncabezdo">
							<div class="encabezado">
								<strong>INSTITUCIÓN EDUCATIVA TAPARTÓ</strong> <br><br>
								<strong>Subject:</strong> Foreign Language (English)<br>
								<strong>Teacher\'s name: </strong>'.$_SESSION['nombres'].' '.$_SESSION['apellidos'].'<br>
								<strong>Student\'s Name:</strong> <br>
								<strong>Grade:</strong> <br>
							</div>
							<div id="escudo">
								<img class="escudo" src="../logo02.png"/>							
							</div>
						</div>	
					';
					include('../tipoImagenes/tipoImagen.php');
				}
				echo
				'
					</div>
					<div id="bloque2">
					</div>
					<div id="bloque3">
					</div>				
				</div>
				<br>
				';
			}			
		?>
	</body>
</html>
