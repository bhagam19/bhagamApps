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
function buscar(v){
    let url='adm/03-cnt/01-buscarReporteEstudiante.php';
    let data={
        id:v,
    };
    flag=1;
    hacerFetch(url, data, flag);
}
function hacerFetch(url, data, flag){
    var request = new Request(
        url, {
            method: 'POST',
            body: JSON.stringify(data),
            headers:{
                'Content-Type': 'application/json'
            }
        }
    );
    fetch(request)
    .then(texto => {
        return texto.text();
    }).then(respTexto=> {
            console.log(respTexto);                        
            if (flag == 1){
            document.getElementById("contenedorReporteIndividual").style.visibility="visible";
            document.getElementById("contenedorReporteIndividual").innerHTML=""
            document.getElementById("contenedorReporteIndividual").innerHTML=respTexto.trim();
            }
        }
    ).catch(
        function(error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        }
    );       
}
function acordeon(){
    //alert('Hola');
    var acc = document.getElementsByClassName('accordion');
    var i;            
    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener('click', function() {
        this.classList.toggle('active');
        var panel = this.nextElementSibling;
        if (panel.style.display) {
        panel.style.display = 'none';
        } else {
        panel.style.display = 'block';
        } 
    });
    }
}
function mostrarDivs(c){
	var acc = document.getElementById(c);
	var panel = acc.nextElementSibling;
	if(panel.style.display === "block"){ 
		panel.style.display = "none";
		acc.className="reporteTituloInstrumento accordion";
	}else{
		panel.style.display = "block";
		acc.className="reporteTituloInstrumento accordion titulo-clicked";
	}
}
