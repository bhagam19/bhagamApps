<?php
	if(!isset($_SESSION['usuario'])){
		if(@$_GET['u']){
			@session_start();			
			$_SESSION['usuario']=@$_GET['u'];	
			$_SESSION['usuarioID']=substr(@$_GET['uID'],1);
			$_SESSION['permiso']=@$_GET['uP'];
		}
	}
	$ti1=microtime(true);
	include('01.01-cargarVariables.php');
	include('01.02-cargarConsultaInicial.php');	
	include('01.03-paginarResultados.php');	
	include('01.04-insertarEncabezadoTabla.php');				
	include('01.05-cargarFiladeFiltros.php');	
	include('02-cargarTablaBienes.php');	
	echo 
	'				</tbody>	
				</table>
			</div>
			<div id="suggestions2"></div>
		</div>				
	';
	include('01.03-paginarResultados.php');	
	//Cronómetro
	$t=(microtime(true)-$ti1);
	echo '<div id="avisosFijos" class="tiempoCarga" onclick="averiguarDimensionPantalla()">Tiempo de carga: '.number_format($t,3).' segundos.</div>';	
//====== Aviso de Dependencias =========
	$dependencias=array();
	$dpd="";
	if(isset($_SESSION['usuario'])){
		$codigo=$_SESSION['permiso'];
		if($codigo==1){
		    //Averiguamos el usuarioID dependendiendo del la identificación del usuario.
			$c01=mysqli_query($conexion,"SELECT usuarioID FROM usuarios WHERE usuario=".$_SESSION['usuario']);
			while($fila01=mysqli_fetch_array($c01)){
			    //Averiguamos las dependencias a cargo del usuario.
				$c02=mysqli_query($conexion,"SELECT codDependencias,nomDependencias FROM dependencias WHERE usuarioID=".$fila01['usuarioID']);
				while($dependencia=mysqli_fetch_array($c02)){
					$dependencias[$dependencia['codDependencias']]=$dependencia['nomDependencias'];
					$d2=array_unique($dependencias);												
				}
			}
		foreach($d2 as $idd =>$d){ 
			$dpd.=$d.'<br>';																			
		}
		echo '	<div id="avisoDependencias">
					<span style="text-align:center;font-weight:bold;">Dependencias a cargo:</span><br><br>
					<span style="text-align:right">'.$dpd.'</span>
				</div>';			
		}		
	}
//====== Aviso de Modificaciones =========
	$dependencias=array();
	$dpd="";
	if(isset($_SESSION['usuario'])){
		$codigo=$_SESSION['permiso'];
		if($codigo==6){
			$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien FROM modificacionesBienes ORDER BY codBien ASC");
			$rows=mysqli_num_rows($consulta);
			if($rows>=1){
				echo '<div id="avisoModificaciones" class="avisoModifPend"><a title="Aviso de modificaciones" style="text-decoration:none" href="00-principal.php'.$queryUrl.'&cMod=1"> Hay '.$rows.' registros que requiere revisión. </a> </div>';
			}else{
				echo '<div id="avisoModificaciones" class="avisoSinModif">No hay modificaciones por revisar.</div>';
			}																		
		}	
	}
	echo '<div id="fEB">'; //formulario Editar Bienes.
	include('04.01-formularioEditarDetalles.php');		
	echo '</div>';
	echo '<div id="fAB">'; //formulario Agregar Bienes.
	include('03.01-formularioCrearBienes.php');		
	echo '</div>';
?> 