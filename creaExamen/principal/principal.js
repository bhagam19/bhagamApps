function imprimir(){
	document.getElementById("barraMenu").style.display='none';
	document.getElementById("cobertor").style.display='none';
	document.getElementById("margen").style.top='14px';
	document.getElementById("margen").style.border='none';
	
	document.getElementById("barraMenu").style.display='block';
	document.getElementById("margen").style.top='65px';
	window.print();
}	
// $(document).ready(function(){//imprimir
// 	$("imprimir").click(function(){
// 		var elemento1=document.getElementById("barraMenu");
// 		elemento1.css({"display":""}	);
// 	});
// });//imprimir
$(document).ready(function() {//mover encabezado
		var elementos=document.getElementsByClassName("moverEncabezdo")
		for(var i=0;i<elementos.length;i++){
			var elemento=$(elementos[i]);
			elemento.draggable({stack:"#encabezado"});
		}
	});//mover encabezado
$(document).ready(function() {//mover Preguntas
		var elementos=document.getElementsByClassName("moverContPregunta")
		for(var i=0;i<elementos.length;i++){
			var elemento=$(elementos[i]);
			elemento.draggable({stack:"#contenedorPregunta"});
		}
	});//mover preguntas	
function mostrarFormularios(clase){ //mostrar formularios
	$('#separador').fadeIn('fast',function(){
		$(clase).animate({'top':'50%','margin-top':'-150px'},500);
	});
}//mostrar formularios	
$(document).ready(function(){ //ocultar formularios
	$('.cerrar').click(function(){
		var elemento=$(this).parents().parents();		
		elemento.animate({'top':'-400px'},500,function(){
			$('#separador').fadeOut('fast');
		});
	});
});	//ocultar formularios
$(document).ready(function() {//mover formularios
		var elemento=$('#formulario');
		elemento.draggable({stack:"#formulario"}, {handle:"#handler"});
});//mover formularios
$(document).ready(function(){//accion dentro de cuadros de input.
	$(".input").focus(function(){
		var elemento=$(this);
		elemento.attr("value","");
		elemento.css("color","#72FC27");
	});
	$(".input").blur(function(){
		var elemento=$(this);
		if(!elemento.val()){
			elemento.attr("value",elemento.attr("id"));
			elemento.css("color","#18B100");
		}else{
			elemento.css("color","#18B100");
		}
	});
});//acción dentro de cuadros de input.
function mostrarCambiaApariencia(){ //mostrar cambiarApariencia
	$('#separador').fadeIn('fast',function(){
		$('#cambiarApariencia').animate({'top':'-2px','margin-top':'0px'},500);
	});
}//mostrar cambiarApariencia
function ocultarCambiarApariencia(){ //ocultar cambiarApariencia
	$('#cambiarApariencia').animate({'top':'-68px','margin-top':'0px'},500,function(){
		$('#separador').fadeOut('slow');
	});
}//ocultar mostrarApariencia