function cargarReporte(v){    
    var url='';
    switch(v){
        case '1':
            url='adm/02-vst/00-Ppal/03-reporte01.php';
        break;
        case '2':
            url='adm/02-vst/00-Ppal/03-reporte02.php';
        break;
        case '3':
            url='adm/02-vst/00-Ppal/03-reporte03.php';
        break;
        case '4':
            url='adm/02-vst/00-Ppal/03-reporte04.php';
        break;
        case '5':
            url='adm/02-vst/00-Ppal/03-reporte05.php';
        break;
        case '6':
            url='adm/02-vst/00-Ppal/03-reporte06.php';
        break;
        case '7':
            url='adm/02-vst/00-Ppal/03-reporte07.php';
        break;
    }     
    fetch(url)
        .then(texto => {
            return texto.text();
        })
        .then(respTexto => {
            document.getElementById('reporte').style.visibility='visible';
            document.getElementById('reporte').innerHTML='';
	        document.getElementById('reporte').innerHTML=respTexto.trim();            
        })
        .catch(error => console.log('Hubo un problema con la petición Fetch:' + error.message));
    
}
function mostrarCargadorDatos(){
    //var c=$('.cargadorDatos').css('visibility');
    alert("cr");
    if( $('.cargadorDatos').css('visibility') !== 'hidden' ) {
	    $('.cargadorDatos').css('visibility', 'hidden');
	  } else {
	    $('.cargadorDatos').css('visibility', 'visible');
	  }    
}