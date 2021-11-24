<?php
	include('../conexion/datosConexion.php');	
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
		<div id="formEditDet">
			<div id="formEditDetheader">
				DESCRIPCIÓN DEL BIEN ASIGNADO
			</div>
			<table class="detalles" border=0>
				<form >		
					<tr>
						<td id="detNomBien" colspan="2"></td>
					</tr>
					<tr>
						<td id="detDetBien" colspan="2">Detalles actualmente guardados en la tabla "Bienes"</td>
					</tr>
					<tr><td><br></td></tr>
					<tr>
						<td class="detConcepto">Característica Especial:</td>
						<td><input type="text" name="carEspecial" value="'.$carEspecial.'" id="carEspecial"></td>
					</tr>
					<tr>
						<td class="detConcepto">Tamaño:</td>';

					echo"<td><input type='text' name='tamano' value='".$tamano."' id='tamano'></td>";
				echo'	</tr>
					<tr>
						<td class="detConcepto">Material:</td>
						<td><input type="text" name="material" value="'.$material.'" id="material"></td>
					</tr>
					<tr>
						<td class="detConcepto">Color:</td>
						<td><input type="text" name="color" value="'.$color.'" id="color"></td>
					</tr>
					<tr>
						<td class="detConcepto">Marca:</td>
						<td><input type="text" name="marca" value="'.$marca.'" id="marca"></td>
					</tr>
					<tr>
						<td class="detConcepto">Otra:</td>
						<td><input type="text" name="otra" value="'.$otra.'" id="otra"></td>
					</tr>
					<tr><td><br></td></tr>
					<tr>
						<tr><td>
						<td><input id="btnDetEnviar" type="button" value="Enviar" onclick="actualizarRegistroDetBien(\''.$qu.'\')"></td>						
					</tr>
				</form>
			</table>
			<script type="text/javascript">				
				var idj=document.getElementById("detNomBien");
			</script>
		</div>
		';
?>		