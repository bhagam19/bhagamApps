<?php

	include('../conexion/datosConexion.php');	

	if(!isset($_SESSION['usuario'])){		

		if(@$_GET['u']){
			@session_start();
			$_SESSION['usuario']=@$_GET['u'];	
			$_SESSION['usuarioID']=substr(@$_GET['uID'],1);
			$_SESSION['permiso']=@$_GET['uP'];
		}else{
			$respuesta='aqui no';
		}

	}

	@$id=$_GET['id'];
	@$q=$_GET['q'];
	@$qu="?".$_SERVER['QUERY_STRING'];

	@$carEspecial="";
	@$tamano="";
	@$material="";
	@$color="";
	@$marca="";
	@$otra="";


	$sql=mysqli_query($conexion,"SELECT * FROM detallesDeBienes WHERE codBien=".$id);    
    @$row1 = mysqli_num_rows($sql); //Verificamos cuántas filas cumplen con la consulta "$sql"

	if($row1==1){			
		while($f=mysqli_fetch_array($sql)){

			$carEspecial=$f['carEspecial'];
			$tamano=$f['tamano'];
			$material=$f['material'];
			$color=$f['color'];
			$marca=$f['marca'];
			$otra=$f['otra'];
		}
	}

	echo
		'
		<div id="formEditBienes">
			<div id="formEditBienesheader">
				AGREGAR UN NUEVO ELEMENTO AL INVENTARIO
			</div>

			<table class="formBienes" border=0>
				<form >		
					<tr>
						<td id="forCodBien" colspan="4"></td>
					</tr>
					<tr>
						<td id="tdNomBien">Nombre del Bien Asignado:</td>
						<td id="tdNomBien"><input id="inputNomBien" onkeyup="sugerirBienes(this.value)"></td>
						<td >Estado del Bien:</td>
						<td><select  id="selEstBien">
								<option value="">Seleccione...</option>
							';

									$sql=mysqli_query($conexion,"SELECT * FROM estadoDelBien");
									while($f=mysqli_fetch_array($sql)){
										echo'<option value='.$f['codEstado'].'>'.$f['nomEstado'].'</option>';
									}							
									    
								echo'								
							</select></td>
					</tr>
					<tr>
						<td class="derecha" id="tdDetBien" colspan="2" style="font-weight:bolder">DESCRIPCIÓN DEL BIEN</td>
						<td>Tipo de Inventario:</td>
						<td><select id="selTipoInv"> 
								<option value="">Seleccione...</option>
							';

									$sql=mysqli_query($conexion,"SELECT * FROM clasesDeBienes");
									while($f=mysqli_fetch_array($sql)){
										echo'<option value='.$f['codClase'].'>'.$f['nomClase'].'</option>';
									}							
									    
								echo'								
							</select></td>	
					</tr>
					<tr>
						<td class="derecha">Característica Especial:</td>
						<td class="derecha"><input type="text" id="cEspecial"></td>
						<td>Dependencia:</td>
						<td><select id="selDep">
								<option value="">Seleccione...</option>
							';
									$usuarioID="";
									$sql=mysqli_query($conexion,"SELECT usuarioID FROM usuarios WHERE usuario=".$_SESSION['usuario']);
									while($f=mysqli_fetch_array($sql)){
										$usuarioID=$f['usuarioID'];
									}
									$sql=mysqli_query($conexion,"SELECT * FROM dependencias WHERE usuarioID=".$usuarioID);
									while($f=mysqli_fetch_array($sql)){
										echo'<option value='.$f['codDependencias'].'>'.$f['nomDependencias'].'</option>';
									}							
									    
								echo'								
							</select></td>
					</tr>
					<tr>
						<td class="derecha">Tamaño:</td>
						<td class="derecha"><input type="text" name="tamano" value="'.$tamano.'" id="cTamano"></td>
						<td>Origen del Bien:</td>
						<td><input type="text" id="inputOrigen" onkeyup="sugerirOrigen(this.value)"></td>
					</tr>
					<tr>
						<td class="derecha">Material: </td>
						<td class="derecha"><input type="text" name="material" value="'.$material.'" id="cMaterial"></td>
						<td>Fecha de Adquisición:</td>
						<td><input type="date" id="inputFecha"></td>
					</tr>
					<tr>
						<td class="derecha">Color:</td>
						<td class="derecha"><input type="text" name="color" value="'.$color.'" id="cColor"></td>
						<td>Precio:</td>
						<td><input type="text" id="inputPrecio"></td>
					</tr>
					<tr>
						<td class="derecha">Marca:</td>
						<td class="derecha"><input type="text" name="marca" value="'.$marca.'" id="cMarca"></td>
						<td>Cantidad:</td>
						<td><input type="text" id="inputCant"></td>
					</tr>
					<tr>
						<td class="derecha">Otra:</td>
						<td class="derecha"><input type="text" name="otra" value="'.$otra.'" id="cOtra"></td>
						<td>Estado de Uso:</td>
						<td><select id="selAlmacen">
								<option value="">Seleccione...</option>
							';
									$sql=mysqli_query($conexion,"SELECT * FROM almacenamiento");
									while($f=mysqli_fetch_array($sql)){
										echo'<option value='.$f['codAlmacenamiento'].'>'.$f['nomAlmacenamiento'].'</option>';
									}							
									    
								echo'								
							</select></td>
					</tr>										
					<tr>
						<td></td>
						<td></td>
						<td>Estado de Mantenimiento:</td>					
						<td><select id="selMant">
								<option value="">Seleccione...</option>
							';
									$sql=mysqli_query($conexion,"SELECT * FROM mantenimiento");
									while($f=mysqli_fetch_array($sql)){
										echo'<option value='.$f['codMantenimiento'].'>'.$f['nomMantenimiento'].'</option>';
									}							
									    
								echo'								
							</select></td>
							
					</tr>
					<tr>
						<td>Observaciones:</td>
						<td colspan="3" ><textarea id="inputObserv" style="width:335px" onkeyup="sugerirObservaciones(this.value)" placeholder="Observaciones..."></textarea></td>
					</tr>
					<tr>
						<td><br></td>
					</tr>
						<td></td>
						<td></td>
						<td></td>
						<td><input type="button" id="btnFormBienesEnviar" value="Enviar" onclick="agregarBien('.$id.',inputNomBien.value,cEspecial.value,cTamano.value,cMaterial.value,cColor.value,cMarca.value,cOtra.value,selEstBien.value,selTipoInv.value,selDep.value,inputOrigen.value,inputFecha.value,inputPrecio.value,inputCant.value,selAlmacen.value,selMant.value,inputObserv.value)"></td>
					</tr>
				</form>
			</table>
			<div id="suggestions"></div>
			<script type="text/javascript">				
				var idj=document.getElementById("detNomBien");
			</script>
		</div>
		';
?>