<?php

	$paginaLogs="../bdBienes/01-verBienes";//para escribir los Logs
	$linkLogs="Inventario General";//para escribir los Logs
	include('../bdLogs/01-bdEscribirLogs.php');	
	include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moneda

	//==========Definir tamaño de página =============
	//Limito la busqueda 
	@$tp = $_GET['tp'];//tp = tamaño de página (Cantidad de registros por página)
		if (!$tp) { 
		   $tp=25;
		}		

	//examino la página a mostrar y el inicio del registro a mostrar 	
	@$p = $_GET['p']; // p = página a mostrar
		if(!$p){ 
		   	$in = 0; // in = inicio de registro a mostrar
		   	$p=1; 
		}else{
			$in = ($p - 1) * $tp; 
		}
	
//====== Variables generales ======
	@$o=$_GET['o'];	// o = orden (Campo por el cual se ordenará la consulta)
	@$d=$_GET['d']; // d = dirección (0= ascendente; 1= descendente)
	@$cMod=$_GET['cMod']; //cMod = ¿Criterio de Modificación?

	@$u=$_GET['u']; // u = usuario (cédula)
	@$uID=$_GET['uID']; //uID = ID del usuario
	@$uP=$_GET['uP']; // uP = Permisos de usuario (1 ó 6)

	if(isset($_SESSION['usuario'])){
		$codigo=$_SESSION['permiso'];
		$u=$_SESSION['usuario'];
		$uP=$_SESSION['permiso'];
		if($codigo==6){
			$uID='';
		}else{
			$uID='='.$_SESSION['usuarioID'];
		}			
	}
  
	$crU="WHERE bienes.usuarioID".$uID; // crU = ¿criterio de usuario? No recuerdo el significado de esta variable
	$cr=$crU;// creo que sí. Es el criterio, que se va concatenando para hacerlo más específico.

@$f1=$_GET['f1'];
	if($f1){
		if($f1=="por Bien..."){
			$f1='';				
		}else{	
			$cr=$cr.' AND  bienes.nomBien="'.$f1.'"';
			@$f1e=urlencode($f1);
		}
	}

@$f2=$_GET['f2'];
	if($f2){
		if($f2=="por Detalle..."){
			$f2='';				
		}else{	
			$cr=$cr.' AND  bienes.detalleDelBien="'.$f2.'"';
			@$f2e=urlencode($f2);
		}	
	}

@$f3=$_GET['f3'];
	if($f3){
		if($f3=="por Tipo Inventario..."){
			$f3='';				
		}else{	
			$cr=$cr.' AND  bienes.codCategoria="'.$f3.'"';	
			@$f3e=urlencode($f3);
		}	
	}

@$f4=$_GET['f4'];
	if($f4){
		if($f4=="por Dependencia..."){
			$f4='';				
		}else{	
			$cr=$cr.' AND  bienes.codDependencias="'.$f4.'"';	
			@$f4e=urlencode($f4);
		}
	}

@$f5=$_GET['f5'];
	if($f5){
		if($f5=="por Responsable..."){
			$f5='';				
		}else{	
			$cr=$cr.' AND  bienes.usuarioID="'.$f5.'"';	
			@$f5e=urlencode($f5);
		}
	}

@$f6=$_GET['f6'];
	if($f6){
		if($f6=="por Origen..."){
			$f6='';				
		}else{	
			$cr=$cr.' AND  bienes.origenDelBien="'.$f6.'"';	
			@$f6e=urlencode($f6);
		}
	}

@$f7=$_GET['f7'];
	if($f7){
		if($f7=="por Fecha..."){
			$f7='';				
		}else{	
			$cr=$cr.' AND  bienes.fechaAdquisicion="'.$f7.'"';	
			@$f7e=urlencode($f7);
		}
	}

@$f8=$_GET['f8'];
	if($f8){
		if($f8=="por Precio..."){
			$f8='';				
		}else{	
			$cr=$cr.' AND  bienes.precio="'.$f8.'"';	
			@$f8e=urlencode($f8);
		}
	}

@$f9=$_GET['f9'];
	if($f9){
		if($f9=="por Estado..."){
			$f9='';				
		}else{	
			$cr=$cr.' AND  bienes.codEstado="'.$f9.'"';	
			@$f9e=urlencode($f9);
		}
	}

@$f10=$_GET['f10'];
	if($f10){
		if($f10=="por Almacenamiento..."){
			$f10='';				
		}else{	
			$cr=$cr.' AND  bienes.codAlmacenamiento="'.$f10.'"';	
			@$f10e=urlencode($f10);
		}
	}

@$f11=$_GET['f11'];
	if($f11){
		if($f11=="por Mantenimiento..."){
			$f11='';				
		}else{	
			$cr=$cr.' AND  bienes.codMantenimiento="'.$f11.'"';	
			@$f11e=urlencode($f11);
		}
	}

@$f12=$_GET['f12'];
	if($f12){
		if($f12=="por Observaciones..."){
			$f12='';				
		}else{	
			$cr=$cr.' AND  bienes.observaciones="'.$f12.'"';	
			@$f12e=urlencode($f12);
		}
	}

$queryUrl='?pg=$p01&u='.@$u.'&uID='.@$uID.'&uP='.@$uP.'&p='.$p.'&tp='.$tp.'&in='.$in.'&o='.$o.'&d='.$d.'&f1='.@$f1e.'&f2='.@$f2e.'&f3='.@$f3e.'&f4='.@$f4e.'&f5='.@$f5e.'&f6='.@$f6e.'&f7='.@$f7e.'&f8='.@$f8e.'&f9='.@$f9e.'&f10='.@$f10e.'&f11='.@$f11e.'&f12='.@$f12e;
// echo '<br>'.$_SERVER['QUERY_STRING'].'<br>';
// echo '<br>'.$cr.'<br>';
// echo '<br>'.$queryUrl.'<br>';
$self = $_SERVER['PHP_SELF'].$queryUrl; //Obtenemos la página en la que nos encontramos
// echo $self."<br>";
// header("refresh:300; url=$self"); //Refrescamos cada 300 segundos

?>