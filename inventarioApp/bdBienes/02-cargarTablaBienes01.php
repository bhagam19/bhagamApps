<?php 
	//error_reporting(0);
	$codigo=$_SESSION['permiso'];
	if($codigo==6){

		$salida.= 
		'
			<td class="img"><img src="../art/eliminar.svg" onclick="location.href=\'eliminarLibro.php?fechaRegistro='.$fila2["fechaRegistro"].'&usuario='.$fila2["usuario"].'&codigo='.$fila2["codigo"].'&coleccion='.$fila2["coleccion"].'&titulo='.$fila2["titulo"].'&apellidoAutor='.$fila2["apellidoAutor"].'&nombreAutor='.$fila2["nombreAutor"].'&areaConocimiento='.$fila2["areaConocimiento"].'&materia='.$fila2["materia"].'&especialidad='.$fila2["especialidad"].'&paisAutor='.$fila2["paisAutor"].'&yearPublicacion='.$fila2["yearPublicacion"].'&volumen='.$fila2["volumen"].'&numPaginas='.$fila2["numPaginas"].'&cantEjemplares='.$fila2["cantEjemplares"].'&ejemplar='.$fila2["ejemplar"].'&calidad='.$fila2["calidad"].'\'"/></td>

			<td class="img"><img title ="Editar este bien." src="../art/editar.svg" onclick="location.href=\'formularioActualizarLibro.php?fechaRegistro='.$fila2["fechaRegistro"].'&usuario='.$fila2["usuario"].'&imagen='.$fila2["imagen"].'&codigo='.$fila2["codigo"].'&coleccion='.$fila2["coleccion"].'&titulo='.$fila2["titulo"].'&apellidoAutor='.$fila2["apellidoAutor"].'&nombreAutor='.$fila2["nombreAutor"].'&areaConocimiento='.$fila2["areaConocimiento"].'&materia='.$fila2["materia"].'&especialidad='.$fila2["especialidad"].'&paisAutor='.$fila2["paisAutor"].'&yearPublicacion='.$fila2["yearPublicacion"].'&volumen='.$fila2["volumen"].'&numPaginas='.$fila2["numPaginas"].'&cantEjemplares='.$fila2["cantEjemplares"].'&ejemplar='.$fila2["ejemplar"].'&calidad='.$fila2["calidad"].'\'"/></td>

			<td style="text-align:center">'.$fila1["codBien"].'</td>';
																				
	}else{

		$salida.= 
		'
			<td class="img"></td><!-- <img title = "Transferir este bien a otro usuario." src="../art/transferir2.svg" ondblclick=""/> --> 

			<td class="img"></td><!--<img title ="Editar este bien." src="../art/editar.svg" ondblclick=""/>-->

			<td style="text-align:center">'.$fila1["codBien"].'</td>';
	}
	
//========================ESTADO (SELECT)======================
	//Se verifica si hay modificaciones pendientes.
	if($mod[10]==1){//==== Aquí hay MODIFICACIONES PENDIENTES
		
		//Se diferencia en el "style" y el "title"
		$sql=mysqli_query($conexion,"SELECT nomEstado from estadoDelBien WHERE codEstado=".$vlrOr[10]);
		while($f=mysqli_fetch_array($sql)){
			$estadoOriginal=$f['nomEstado'];
		}

		$sql=mysqli_query($conexion,"SELECT nomEstado from estadoDelBien WHERE codEstado=".$vlr[10]);
		while($f=mysqli_fetch_array($sql)){
			$nomEstado=$f['nomEstado'];
		}

		//Se verifica si hay bienes "MALOS" sin "DAR DE BAJA" 
		if($estadoOriginal=="MALO" && $nomMantenimiento!="DADO DE BAJA"){//HAY INCONSISTENCIAS: Está guardado como MALO pero NO está DADO DE BAJA.
			//Se añade un "title" y un "img" alerta.
			$salida.= 
			'
				<td id="tdEstado'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray" title="Valor original: '.$estadoOriginal.'.&#13;&#13;Este elemento estaba malo, y aún no había sido dado de baja. Pero, al parecer, no está malo.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarSeleccionBien(this.id,'.$fila1["codBien"].',\'codEstado\',\'estadoAct'.$fila1["codBien"].'\','.$fila1['codEstado'].',\'estadoDelBien\',\'nomEstado\',\''.$queryUrl.'\',\'80px\')"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$nomEstado.' </td>';

		}else{//NO HAY Inconsistencias: Está guardado como "MALO" y está "DADO DE BAJA"
		//Es diferente en el "title" y no hay "img" alerta.			

			$salida.= '<td id="tdEstado'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray" title="Valor original: '.$estadoOriginal.'.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarSeleccionBien(this.id,'.$fila1["codBien"].',\'codEstado\',\'estadoAct'.$fila1["codBien"].'\','.$fila1['codEstado'].',\'estadoDelBien\',\'nomEstado\',\''.$queryUrl.'\',\'80px\')"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$nomEstado.'</td>';
		}
	}else{//===Aquí No hay modificaciones pendientes
		if($nomEstado=="MALO" && $nomMantenimiento!="DADO DE BAJA"){
			$salida.= 
			'
				<td id="tdEstado'.$fila1["codBien"].'" title="Este elemento esta malo, pero aún no ha sido dado de baja." ondblclick="actualizarSeleccionBien(this.id,'.$fila1["codBien"].',\'codEstado\',\'estadoAct'.$fila1["codBien"].'\','.$fila1['codEstado'].',\'estadoDelBien\',\'nomEstado\',\''.$queryUrl.'\',\'80px\')">'.$nomEstado.' <img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:9px" src="../art/alerta.svg"/> Dar de baja. </td>';
		}else{	
			$salida.= '<td id="tdEstado'.$fila1["codBien"].'"><img style="width:10x;height:10x" title="Click para modificar" src="../art/editar.png" onclick="actualizarSeleccionBien(this.parentNode.id,'.$fila1["codBien"].',\'codEstado\',\'estadoAct'.$fila1["codBien"].'\','.$fila1['codEstado'].',\'estadoDelBien\',\'nomEstado\',\''.$queryUrl.'\',\'80px\')">'.$nomEstado.'</td>';
		}
	}
//========================NOMBIEN======================
	if($mod[1]==1){ //Aquí se alerta una modificación.
		$salida.= 
		'	<td id="tdBien'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray"  title="Valor original: '.$fila1["nomBien"].'.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarInputBien(this.id,'.$fila1["codBien"].',\'nomBien\',\'bienAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'95px\',event)"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$vlr[1].'</td>';
	}else{
		$salida.= 
		'	<td id="tdBien'.$fila1["codBien"].'"><img style="width:10x;height:10x" title="Click para modificar" src="../art/editar.png" onclick="actualizarInputBien(this.parentNode.id,'.$fila1["codBien"].',\'nomBien\',\'bienAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'95px\',event)">'.$fila1["nomBien"].'</td>';
	}

//========================CANTIDADES======================
	if($mod[7]==1){ //Aquí se alerta una modificación.
		$salida.= 
		'	<td id="tdCant'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray;text-align:right;padding:0px 10px"  title="Valor original: '.$fila1["cantBien"].'.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarInputBien(this.id,'.$fila1["codBien"].',\'cantBien\',\'cantAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'35px\',event)"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$vlr[7].'</td>';
	}else{
		$salida.= 
		'	<td id="tdCant'.$fila1["codBien"].'" style="text-align:left;padding:0px 20px" ><img style="width:10x;height:10x" title="Click para modificar" src="../art/editar.png" onclick="actualizarInputBien(this.parentNode.id,'.$fila1["codBien"].',\'cantBien\',\'cantAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'35px\',event)">'.$fila1["cantBien"].'</td>';
	}	

	//========================DETALLES DEL BIEN======================
	if($mod[2]==1){ //Aquí se alerta una modificación.
		$salida.= 
		'	<td id="tdDetalles'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray"  title="Valor original: '.$fila1["detalleDelBien"].'.&#13;&#13;Nuevo Valor: '.$vlr[2].'&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" onclick="mostrarEdicionDetalles(event,\''.$fila1["codBien"].'\',\''.$fila1["nomBien"].'\',\''.$fila1["detalleDelBien"].'\',\''.$queryUrl.'\')" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$vlr[2].'</td>';
	}else{
		$salida.= 
		'	<td id="tdDetalles'.$fila1["codBien"].'"><img style="width:10x;height:10x" title="Click para modificar.&#13;&#13;Sugerencias del Detalle: Característica Especial || Tamaño || Material || Color || Marca || Otra.&#13;&#13;Valor Actual: '.$fila1["detalleDelBien"].'" src="../art/editar.png" onclick="mostrarEdicionDetalles(event,\''.$fila1["codBien"].'\',\''.$fila1["nomBien"].'\',\''.$fila1["detalleDelBien"].'\',\''.$queryUrl.'\')">   '.$fila1["detalleDelBien"].'</td>';
	}

//========================TIPO INVENTARIO (SELECT)======================
	if($mod[8]==1){//Aquí se alerta una modificación.

		$sql=mysqli_query($conexion,"SELECT nomClase from clasesDeBienes WHERE codClase=".$vlrOr[8]);
			while($f=mysqli_fetch_array($sql)){
				$tipoOriginal=$f['nomClase'];
			}

			$sql=mysqli_query($conexion,"SELECT nomClase from clasesDeBienes WHERE codClase=".$vlr[8]);
			while($f=mysqli_fetch_array($sql)){
				$nomClase=$f['nomClase'];
			}

		$salida.= 
		'	<td id="tdTipoInventario'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray" title="Valor original: '.$tipoOriginal.'.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarSeleccionBien(this.id,'.$fila1["codBien"].',\'codClase\',\'categoriaAct'.$fila1["codBien"].'\','.$fila1['codCategoria'].',\'clasesDeBienes\',\'nomClase\',\''.$queryUrl.'\',\'145px\')"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$nomClase.'</td>';
	}else{
		$salida.= '<td id="tdTipoInventario'.$fila1["codBien"].'"><img style="width:10x;height:10x" title="Click para modificar" src="../art/editar.png" onclick="actualizarSeleccionBien(this.parentNode.id,'.$fila1["codBien"].',\'codClase\',\'categoriaAct'.$fila1["codBien"].'\','.$fila1['codCategoria'].',\'clasesDeBienes\',\'nomClase\',\''.$queryUrl.'\',\'145px\')">'.$nomClase.'</td>';		
	}

//========================DEPENDENCIA (SELECT)======================
	if($mod[9]==1){//Aquí se alerta una modificación.

		$sql=mysqli_query($conexion,"SELECT nomDependencias from dependencias WHERE codDependencias=".$vlrOr[9]);
			while($f=mysqli_fetch_array($sql)){
				$dependenciaOriginal=$f['nomDependencias'];
			}

			$sql=mysqli_query($conexion,"SELECT nomDependencias from dependencias WHERE codDependencias=".$vlr[9]);
			while($f=mysqli_fetch_array($sql)){
				$nomDependencia=$f['nomDependencias'];
			}

		$salida.= 
		'	<td id="tdDependencia'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray" title="Valor original: '.$dependenciaOriginal.'.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarSeleccionBien(this.id,'.$fila1["codBien"].',\'codDependencias\',\'dependenciaAct'.$fila1["codBien"].'\','.$fila1['codDependencias'].',\'dependencias\',\'nomDependencias\',\''.$queryUrl.'\',\'145px\')"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$nomDependencia.'</td>';
	}else{
		$salida.= '<td id="tdDependencia'.$fila1["codBien"].'" ><img style="width:10x;height:10x" title="Click para modificar" src="../art/editar.png" onclick="actualizarSeleccionBien(this.parentNode.id,'.$fila1["codBien"].',\'codDependencias\',\'dependenciaAct'.$fila1["codBien"].'\','.$fila1['codDependencias'].',\'dependencias\',\'nomDependencias\',\''.$queryUrl.'\',\'145px\')">'.$nomDependencia.'</td>';		
	}

//========================SERIE E ID (SELECT)======================
if($mod[3]==1){ //Aquí se alerta una modificación.
		$salida.= 
		'	
		<td id="tdSeriedelBien'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray"  title="Valor original: '.$fila1["serieDelBien"].'.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarInputBien(this.id,'.$fila1["codBien"].',\'serieDelBien\',\'serieAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'80px\',event)"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$vlr[3].'</td>
		';
	}else{
		$salida.= 
		'	
		<td id="tdSeriedelBien'.$fila1["codBien"].'"><img style="width:10x;height:10x" title="Click para modificar" src="../art/editar.png" onclick="actualizarInputBien(this.parentNode.id,'.$fila1["codBien"].',\'serieDelBien\',\'serieDelBien'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'35px\',event)">'.$fila1["serieDelBien"].'</td>
		
		';
	}

$salida.= 
	'	
		<td></td>
	';

//========================ORIGENES======================
	if($mod[4]==1){ //Aquí se alerta una modificación.
		$salida.= 
		'	<td id="tdOrigen'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray"  title="Valor original: '.$fila1["origenDelBien"].'.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarInputBien(this.id,'.$fila1["codBien"].',\'origenDelBien\',\'origenAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'80px\',event)"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$vlr[4].'</td>';
	}else{
		$salida.= 
		'	<td id="tdOrigen'.$fila1["codBien"].'"><img style="width:10x;height:10x" title="Click para modificar" src="../art/editar.png" onclick="actualizarInputBien(this.parentNode.id,'.$fila1["codBien"].',\'origenDelBien\',\'origenAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'80px\',event)">'.$fila1["origenDelBien"].'</td>';
	}

//========================FECHAS======================
	if($mod[5]==1){ //Aquí se alerta una modificación.
		$salida.= 
		'	<td id="tdFecha'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray;text-align:center"  title="Valor original: '.$fila1["fechaAdquisicion"].'.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarInputBien(this.id,'.$fila1["codBien"].',\'fechaAdquisicion\',\'fechaAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'65px\',event)"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$vlr[5].'</td>';
	}else{
		$salida.= 
		'	<td id="tdFecha'.$fila1["codBien"].'" style="text-align:center"><img style="width:10x;height:10x" title="Click para modificar" src="../art/editar.png" onclick="actualizarInputBien(this.parentNode.id,'.$fila1["codBien"].',\'fechaAdquisicion\',\'fechaAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'65px\',event)">'.$fila1["fechaAdquisicion"].'</td>';
	}

//========================PRECIOS======================
	if($mod[6]==1){ //Aquí se alerta una modificación.
		$salida.= 
		'	<td id="tdPrecio'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray;text-align:right;padding:0px 10px" title="Valor original: $'.$fila1["precio"].'.oo.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarInputBien(this.id,'.$fila1["codBien"].',\'precio\',\'precioAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'80px\',event)"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> $'.number_format($vlr[6]).'.oo</td>';
	}else{
		$salida.= 
		'	<td id="tdPrecio'.$fila1["codBien"].'" style="text-align:right;padding:0px 10px"><img style="width:10x;height:10x" title="Click para modificar" src="../art/editar.png" onclick="actualizarInputBien(this.parentNode.id,'.$fila1["codBien"].',\'precio\',\'precioAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'80px\',event)">$'.number_format($fila1["precio"]).'.oo</td>';
	}	

$salida.= 
	'	
		<td>'.$nomUbicacion.'</td>';

//========================ALMACENAMIENTO (SELECT)======================
	if($mod[11]==1){//Aquí se alerta una modificación.

		$sql=mysqli_query($conexion,"SELECT nomAlmacenamiento from almacenamiento WHERE codAlmacenamiento=".$vlrOr[11]);
			while($f=mysqli_fetch_array($sql)){
				$almacenamientoOriginal=$f['nomAlmacenamiento'];
			}

			$sql=mysqli_query($conexion,"SELECT nomAlmacenamiento from almacenamiento WHERE codAlmacenamiento=".$vlr[11]);
			while($f=mysqli_fetch_array($sql)){
				$nomAlmacenamiento=$f['nomAlmacenamiento'];
			}

		$salida.= 
		'	<td id="tdAlmacenamiento'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray" title="Valor original: '.$almacenamientoOriginal.'.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarSeleccionBien(this.id,'.$fila1["codBien"].',\'codAlmacenamiento\',\'almacenAct'.$fila1["codBien"].'\','.$fila1['codAlmacenamiento'].',\'almacenamiento\',\'nomAlmacenamiento\',\''.$queryUrl.'\',\'100px\')"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$nomAlmacenamiento.'</td>';
	}else{
		$salida.= '<td id="tdAlmacenamiento'.$fila1["codBien"].'"><img style="width:10x;height:10x" title="Click para modificar" src="../art/editar.png" onclick="actualizarSeleccionBien(this.parentNode.id,'.$fila1["codBien"].',\'codAlmacenamiento\',\'almacenAct'.$fila1["codBien"].'\','.$fila1['codAlmacenamiento'].',\'almacenamiento\',\'nomAlmacenamiento\',\''.$queryUrl.'\',\'100px\')">'.$nomAlmacenamiento.'</td>';		
	}

	//========================MANTENIMIENTO (SELECT)======================
	if($mod[12]==1){//Aquí se alerta una modificación.

		$sql=mysqli_query($conexion,"SELECT nomMantenimiento from mantenimiento WHERE codMantenimiento=".$vlrOr[12]);
			while($f=mysqli_fetch_array($sql)){
				$mantenOriginal=$f['nomMantenimiento'];
			}

			$sql=mysqli_query($conexion,"SELECT nomMantenimiento from mantenimiento WHERE codMantenimiento=".$vlr[12]);
			while($f=mysqli_fetch_array($sql)){
				$nomMantenimiento=$f['nomMantenimiento'];
			}

		$salida.= 
		'	<td id="tdMantenimiento'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray" title="Valor original: '.$mantenOriginal.'.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarSeleccionBien(this.id,'.$fila1["codBien"].',\'codMantenimiento\',\'almacenAct'.$fila1["codBien"].'\','.$fila1['codMantenimiento'].',\'mantenimiento\',\'nomMantenimiento\',\''.$queryUrl.'\',\'100px\')"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$nomMantenimiento.'</td>';
	}else{
		$salida.= '<td id="tdMantenimiento'.$fila1["codBien"].'"><img style="width:10x;height:10x" title="Click para modificar" src="../art/editar.png" onclick="actualizarSeleccionBien(this.parentNode.id,'.$fila1["codBien"].',\'codMantenimiento\',\'almacenAct'.$fila1["codBien"].'\','.$fila1['codMantenimiento'].',\'mantenimiento\',\'nomMantenimiento\',\''.$queryUrl.'\',\'100px\')">'.$nomMantenimiento.'</td>';		
	}

	//========================OBSERVACIONES======================
	if($mod[13]==1){ //Aquí se alerta una modificación.
		$salida.= 
		'	<td id="tdObserv'.$fila1["codBien"].'" style="background:#D2F6B3; border: 2px solid gray"  title="Valor original: '.$fila1["observaciones"].'.&#13;&#13;Este cambio está pendiente de ser verificado y aprobado por el administrador." ondblclick="actualizarInputBien(this.id,'.$fila1["codBien"].',\'observaciones\',\'observAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'550px\')"><img onMouseOver="this.style.background=\'none\'; this.style.borderRadius=\'0px\'" style="width:10px; height:10px" src="../art/modificar.svg"/> '.$vlr[13].'</td>';
	}else{
		$salida.= 
		'	<td id="tdObserv'.$fila1["codBien"].'"><img style="width:10x;height:10x" title="Click para modificar" src="../art/editar.png" onclick="actualizarInputBien(this.parentNode.id,'.$fila1["codBien"].',\'observaciones\',\'observAct'.$fila1["codBien"].'\',\''.$queryUrl.'\',\'300px\',event)">'.$fila1["observaciones"].'</td>';
	}	

	$salida.= 
	'								
	</tr>';	
	
?>