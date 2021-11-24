<?php
	/*echo "PAGINAR RESULTADOS <br>";
	echo "Registros: ".$num_total_registros."<br>";
	echo "Páginas ".$total_paginas."<br>";*/
	if ($total_paginas > 1){ 

		if($total_paginas<5){
	   			echo '<br>';
	   		}

	   	for ($i=1;$i<=$p+4;$i++){ 

	      	if($p== $i){
	         	//si muestro el índice de la página actual, no coloco enlace 
	         	echo "<span style='margin:10px;padding:5px 25px;border:2px solid #4163B8;border-radius:10px;background:#A9E2F3;color:#4163B8;cursor:default'> ".$p." </span>"; 
	      	}else{
	      		if($i>$p-5 && $i<=$total_paginas){
	      			//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
	         		echo '<a title="ir a la página '.$i.'" style="margin:3px;padding:5px 25px;border:1px solid #4163B8;border-radius:10px;color:#4163B8;text-decoration:none" href="00-principal.php'.$queryUrl.'&p='.$i.'"> '.$i.' </a>';
	         	}else if($i>$p-6 && $i<=$total_paginas){
	         		//Si hay páginas para mostrar por debajo del rango inferior.
	         		echo '<a title="ir a la página 1"style="position:relative;top:8px;margin:3px;color:green;text-decoration:none" href="00-principal.php'.$queryUrl.'&p=1"><img style="width:25px; height:25px" src="../art/primero.svg"></a>';

	         		echo '<a title="ir a la página '.$i.'" style="position:relative;top:8px;margin:3px;color:green;text-decoration:none" href="00-principal.php'.$queryUrl.'&p='.$i.'""><img style="width:25px; height:25px" src="../art/anterior.svg"></a>';
	         	}

	         	if($i==$p+4 && $i<=$total_paginas){
	         		//Si hay páginas para mostrar por encima del rango superior.
	         		$j=$i+1;
	         		echo '<a title="ir a la página '.$j.'"style="position:relative;top:8px;margin:3px;color:green;text-decoration:none" href="00-principal.php'.$queryUrl.'&p='.$j.'"><img style="width:25px; height:25px" src="../art/siguiente.svg"></a>';
	         		echo '<a title="ir a la página '.$total_paginas.'" style="position:relative;top:8px;margin:3px;color:green;text-decoration:none" href="00-principal.php'.$queryUrl.'&p='.$total_paginas.'"><img style="width:25px; height:25px" src="../art/ultimo.svg"></a>';		         		
	         	}
	       	}
	   	} 
	}

	echo '<br><br>';

?>