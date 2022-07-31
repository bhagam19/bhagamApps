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
    alert(v);
    document.getElementById('contenedorReporteIndividual').innerHTML='';
    document.getElementById('contenedorReporteIndividual').innerHTML='<div> Hola '+ v +' </div>';
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
    //fetch().then({}).then({}).catch();    
    fetch(request)
    .then(texto => {
        return texto.text();
    }).then(textoInText=> {
            console.log(textoInText);
            //alert(textoInText.trim());
            numError=textoInText.trim().substr(0,4);
            //alert(numError);
            if (numError=="1451"){
                final=textoInText.trim().indexOf("`",98);
                final=final - 98;
                nomTabla=textoInText.trim().substr(98,final);
                alert("No se puede borrar este registro, porque está siendo referenciado por la tabla '"+nomTabla+"'.");
            }            
            if (flag == 1){
            document.getElementById("actualizable").innerHTML=""
            document.getElementById("actualizable").innerHTML=textoInText.trim();
            }
        }
    ).catch(
        function(error) {
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        }
    );       
}