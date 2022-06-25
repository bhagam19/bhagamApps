<script>
    var nextinput=0;
	function agregarAsignaturas(){
		if($("#campo"+nextinput).val()=="Asignatura..."){
    	    alert("Selecciona una Asignatura.");
    	    }else{
				nextinput++;
				var campo =	'<select name="asignatura" id="campo' + nextinput + '" name="campo' + nextinput + '">'+
    				    		'<option>Asignatura...</option>'+
    				    		<?php	
    				    			foreach($nombreAsignaturas as $idd =>$asignatura){ 
    				    		        echo '\'<option value="'.$idd.'">'.$asignatura.'</option>\'+';
    				    		    }
    				    		  ?>
    					        '</select>';
					$("#idAsignaturas").append(campo);
		    }
    }
    function registrarAsignaturas(){
    	var asignaturas=new Array();
    	var registrar=1;
		var contador=0;
		for(i=1;i<=nextinput;i++){
			var asignatura=document.getElementById("campo"+i).value;
			
			for(j=0;j<=asignaturas.length;j++){
				if(asignaturas[j]==asignatura||asignatura=="Asignatura..."){
					registrar=0;
				}
			}
			
			if(registrar==1){
				asignaturas[contador]=asignatura;
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET", "../bdAsignaturasxDocente/registrarAsignaturas.php?asignatura="+asignatura, false);
		        xmlhttp.send();
		        
		        contador++;
		    }
			registrar=1;
		}
		var elemento=$("#handler").parent();		
		elemento.animate({'top':'-500px'},500,function(){
			$('#separador').fadeOut('fast');
		});
	}
</script>

<div id="separador" style="display:none;"></div>
<div id="formulario" class="formularioAsignaturasxDocente"> 	
	<div id="handler" style="cursor:move">
		<!--<a class="cerrar">X</a>-->
		<p>REGISTRO DE ASIGNATURAS</p>
	</div>
	<form action="acceso.php">
	<div class="formulario">
		<div id="modificable">  
	            <div id="idAsignaturas" class="expandible">
	    			<span>Asignaturas:<br></span>
	    			<div id="idAsignaturas" ></div>
	    			<div style="position:relative;top:-20px;left:200px">
							<ul>
								<li onclick="agregarAsignaturas();" style="background:#5858FA;">Añadir</li>
								<li onclick="reestablecerCampo();" style="background:#FE2E64">Reestablecer</li>
							</ul>
					</div>
				</div>
		</div>
			<input style="left:30px" type="submit" class="submit" value="Mandar" onclick="registrarAsignaturas()">
	</div>
	</form>
</div>