<?php
	if($usuarioID){
		$sqlx=mysqli_query($conexion,"SELECT usuarioID,apellidos,nombres,usuarioCED FROM usuarios WHERE usuarioID=".$usuarioID);
		while($f=mysqli_fetch_assoc($sqlx)){
			$responsable=$f['nombres']." ".$f['apellidos'];
			$CED=$f['usuarioCED'];
			$responsable=strtr(strtoupper($responsable),"áéíóúñ","ÁÉÍÓÚÑ");
		}
	}
	echo'
		<div id="encabezadoActa">
			<img src="../art/escudo.png" style="position:relative;top:40px;left:0px;width:70px;height:70px"/>
			<div id="legalidad">
				<h4 style="text-align:center;">INSTITUCIÓN EDUCATIVA ENTRERRÍOS</h4>
				<h5 style="font-weight:normal; font-style:italic;text-align:justify">Constituida y autorizados sus estudios por Resolución Departamental 1490 del 20 de febrero de 2003 y mediante la cual se le concede <span style="font-weight:bold">Reconocimiento de Carácter Oficial.</span>; autorizados sus estudios para Educación Formal de Adultos por Resolución 12339 del 13 de junio de 2006; y aclaradas sus jornadas y modelos por Resolución Departamental S 201500286893 del 1 de julio de 2015.</h5>		
				<h5 style="text-align:right">DANE 105264000013  --  NIT 811044496-0</h5>				
			</div>			
			<div id="separadorColores">	
				<div style="position:relative;top:2px">
					<hr color="#008000">
				</div>
				<div style="position:relative;top:-6px">
					<hr color="white">
				</div>
				<div style="position:relative;top:-13px">
					<hr color="#202096">
				</div>
			</div>
		</div>';
?>