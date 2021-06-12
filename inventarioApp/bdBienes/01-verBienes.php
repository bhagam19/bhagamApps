<?php

if(isset($_SESSION['usuario'])){

@$u=$_SESSION['usuario'];
@$uID=$_SESSION['usuarioID'];
@$uP=$_SESSION['permiso'];

}else{
@$u="";
@$uID="";
@$uP="";
}
	
	echo 
			'
				<input type="text"  id="inputBuscar" autocomplete="off" name="buscarenBienes"  onkeyup="buscarBienes(this.value,'.$u.','.$uID.','.$uP.')"> 
	  			<input type="submit"  id="btnBuscar" value="Buscar" onclick="buscarBienes(inputBuscar.value,'.$u.','.$uID.','.$uP.',1)">
	  			<br>
	  		';	
	  		
	echo '<div id="contenedorTablaBienes">';
	echo '';

	//echo '<div id="like_button_container"></div>';

		include('01.00-cargarArchivos.php');

	echo '</div>'

?>