<script>
    var nextinput=0;
	function agregarGrupo(){
		if($("#grupo"+nextinput).val()=="Grupo..."){
    	    alert("Selecciona un Grupo.");
    	    }else{
				nextinput++;
				var grupo =	'<select name="grupo" id="grupo' + nextinput + '" name="grupo' + nextinput + '">'+
    				    		'<option>Grupo...</option>'+
    				    		<?php	
    				    			foreach($nombreGrupos as $idd =>$grupo){ 
    				    		        echo '\'<option value="'.$idd.'">'.$grupo.'</option>\'+';
    				    		    }
    				    		  ?>
    					        '</select>';
					$("#idGrupos").append(grupo);
		    }
    }
    
    function registrarGrupos(){
    	var grupos = new Array();
    	var registrar=1;
		var contador=0;
		for(i=1;i<=nextinput;i++){
			var grupo=document.getElementById("grupo"+i).value;
				
			for(j=0;j<=grupos.length;j++){
				if(grupos[j]==grupo||grupo=="Grupo..."){
					registrar=0;
				}
			}
				
			if(registrar==1){
				grupos[contador]=grupo;	
			
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET", "../bdGruposxDocente/registrarGrupos.php?grupo="+grupo, false);
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
<div id="formulario" class="formularioGruposxDocente"> 	
	<div id="handler" style="cursor:move">
		<!--<a class="cerrar">X</a>-->
		<p>REGISTRO DE GRUPOS</p>
	</div>
	<form action="acceso.php">
	<div class="formulario">
		<div id="modificable">  
	            <div id="idGrupos" class="expandible">
	    			<span>Grupos:<br></span>
	    			<div id="idGrupos" ></div>
	    			<div style="position:relative;top:-20px;left:200px">
							<ul>
								<li onclick="agregarGrupo();" style="background:#5858FA;">Añadir</li>
								<li onclick="reestablecerCampo();" style="background:#FE2E64">Reestablecer</li>
							</ul>
					</div>
				</div>
		</div>
			<input style="left:30px" type="submit" class="submit" value="Mandar" onclick="registrarGrupos()">
	</div>
	</form>
</div>