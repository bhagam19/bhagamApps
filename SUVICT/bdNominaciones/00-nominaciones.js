function cargarGruposNom(codSede,docNom){
	// alert(codSede+", "+docNom);
    start();
    document.getElementById("mensajeEspera").style.visibility='visible';
    document.getElementById("grafica").innerHTML="";
    document.getElementById("resultados").innerHTML="";
    document.getElementById("interpretacion").innerHTML="";
    document.getElementById("grafica").style.visibility='hidden';
    document.getElementById("resultados").style.visibility='hidden';
    document.getElementById("interpretacion").style.visibility='hidden';	
    $.ajax({
        type: "POST",
        url: '../bdNominaciones/consulta.php',
        data: {
            'codSede': codSede,
            'caso': 1
        },
        success: function(resp){
        	// alert(resp);
            document.getElementById("grupos").innerHTML=resp;
            document.getElementById("estudiantes").innerHTML="";
            document.getElementById("mensajeEspera").style.visibility='hidden';
            document.getElementById("seccionArea").style.visibility = 'hidden';
            document.getElementById("seccionRazon").style.visibility = 'hidden';
            document.getElementById("guardar").style.visibility = 'hidden';
            document.getElementById("guardar2").style.visibility = 'hidden';
            document.getElementById("finalizar").style.visibility = 'hidden';
            var idGrupo=document.getElementById("grupos").value;           
        }
    });
    // $.ajax({
    //     type: "POST",
    //     url: '../bdSugerencias/03-cargarEstSugNom.php',
    //     data: {
    //         'codSede': codSede,
    //         'docNominador': docNom
    //     },
    //     success: function(resp){
    //         // alert(resp);
    //         document.getElementById("sugHechas").innerHTML="";
    //         document.getElementById("sugHechas").innerHTML=resp;
    //     }
    // });
}
function cargarEstudiantesNom(codGrupo,docNom){
	// alert(codGrupo);	 
	start();
    document.getElementById("mensajeEspera").style.visibility='visible';
    document.getElementById("grafica").innerHTML="";
    document.getElementById("resultados").innerHTML="";
    document.getElementById("interpretacion").innerHTML="";
    document.getElementById("grafica").style.visibility='hidden';
    document.getElementById("resultados").style.visibility='hidden';
    document.getElementById("interpretacion").style.visibility='hidden';
    $.ajax({
        type: "POST",
        url: '../bdNominaciones/consulta.php',
        data: {
            'codGrupo': codGrupo,
            'caso': 2
        },
        success: function(resp){
        	// alert(resp);
            document.getElementById("estudiantes").innerHTML=resp;
            document.getElementById("mensajeEspera").style.visibility='hidden';
            document.getElementById("seccionArea").style.visibility = 'hidden';
            document.getElementById("seccionRazon").style.visibility = 'hidden';
            document.getElementById("guardar").style.visibility = 'hidden';
        }
    });
    var codSede=document.getElementById("sede").value;
    $.ajax({
        type: "POST",
        url: '../bdNominaciones/03-cargarEstSugNom.php',
        data: {
            'codSede': codSede,
            'codGrupo': codGrupo,
            'docNominador': docNom
        },
        success: function(resp){
            // alert(resp);
            document.getElementById("sugHechas").innerHTML="";
            document.getElementById("sugHechas").innerHTML=resp;
        }
    });
}
function cargarAreasNom(codEstudiante,docNom){
	// alert(codEstudiante);docNom	
	start();
    var grupoSeleccionado = document.getElementById("grupos").value
    // alert(grupoSeleccionado);
    document.getElementById("mensajeEspera").style.visibility='visible';
    document.getElementById("grafica").innerHTML="";
    document.getElementById("resultados").innerHTML="";
    document.getElementById("interpretacion").innerHTML="";
    document.getElementById("grafica").style.visibility='hidden';
    document.getElementById("resultados").style.visibility='hidden';
    document.getElementById("interpretacion").style.visibility='hidden';
    $.ajax({
        type: "POST",
        url: '../bdNominaciones/consulta.php',
        data: {
            'codEstudiante': codEstudiante,
            'caso': 3
        },
        success: function(resp){
        	// alert(resp);
        	document.getElementById("estudiante").innerHTML=resp;
        	document.getElementById("seccionRazon").style.visibility = 'hidden';
            document.getElementById("guardar").style.visibility = 'hidden';
        }
    });
    $.ajax({
        type: "POST",
        url: '../bdNominaciones/consulta.php',
        data: {
            'codEstudiante': codEstudiante,
            'docNominador': docNom,
            'codGrupo': grupoSeleccionado,
            'caso':4
        },
        success: function(resp){
        	// alert(resp);
        	document.getElementById("areas").innerHTML=resp;
            document.getElementById("seccionArea").style.visibility = 'visible';
            document.getElementById("mensajeEspera").style.visibility='hidden';
        }
    });
    var idSede=document.getElementById("sede").value;
    var idGrupo=document.getElementById("grupos").value;
    $.ajax({
        type: "POST",
        url: '../bdNominaciones/03-cargarEstSugNom.php',
        data: {
            'codSede': codSede,
            'codGrupo': codGrupo,
            'codEstudiante': codEstudiante,
            'docNominador': docNom
        },
        success: function(resp){
            // alert(resp);
            document.getElementById("sugHechas").innerHTML="";
             document.getElementById("sugHechas").innerHTML=resp;
        }
    });
}
function cargarCondiciones(codEstudiante,tipoCondicion){
	// alert(codEstudiante);	
	start();
    document.getElementById("mensajeEspera").style.visibility='visible';
    document.getElementById("grafica").innerHTML="";
    document.getElementById("resultados").innerHTML="";
    document.getElementById("interpretacion").innerHTML="";
    document.getElementById("grafica").style.visibility='hidden';
    document.getElementById("resultados").style.visibility='hidden';
    document.getElementById("interpretacion").style.visibility='hidden';

    var area = document.getElementById("areas").value;
    // alert(area);
    $.ajax({
        type: "POST",
        url: '../bdNominaciones/consulta.php',
        data: {
            'codEstudiante': codEstudiante,
            'tipoCondicion': tipoCondicion,
            'caso': 5
        },
        success: function(resp){
        	// alert(resp);
        	document.getElementById("enunciaRazon").innerHTML=resp;
        }
    });

    $.ajax({
        type: "POST",
        url: '../bdNominaciones/consulta.php',
        data: {
            'areas': area,
            'tipoCondicion': tipoCondicion,
            'caso': 6
        },
        success: function(resp){
        	// alert(resp);
        	document.getElementById("razones").innerHTML=resp;
            document.getElementById("seccionRazon").style.visibility = 'visible';
            document.getElementById("mensajeEspera").style.visibility='hidden';
        }
    });
}
function interpretarResultados(id,tipoCondicion){    
    var chbxs = document.getElementById("razones");
    var total=chbxs.childElementCount;
    var cnt=0;
    var pnts=0;
    var v0=0;
    var v1=0;
    var v2=0;
    var v3=0;
    var v4=0;
    for (var x=1; x<chbxs.children.length+1; x++){
        var nivel1=chbxs.children[x-1];
        // alert(nivel1.id);
        // alert(nivel1.children.length);
        for (var y=1; y<nivel1.children.length+1; y++){            
            // alert(nivel1.children[y-1].tagName);
            if(nivel1.children[y-1].tagName=="UL"){  
                // alert("hola");
                var nivel2=nivel1.children[y-1];                             
                for (var z=1; z<nivel2.children.length+1; z++){
                    // alert("hola");
                    // alert(nivel2.children[z-1].tagName);
                    var nivel3=nivel2.children[z-1];                             
                    for (var w=1; w<nivel3.children.length+1; w++){
                        // alert("hola");
                        // alert(nivel3.children[w-1].tagName);
                        if(nivel3.children[w-1].checked){ 

                        chbxs.children[x-1].style.boxShadow='1px 1px 1px 1px #1643BF';  
                        chbxs.children[x-1].style.background='#517EFB';                         
                            cnt++; 
                            val=parseInt(nivel3.children[w-1].value)
                            pnts=pnts+val; 
                            switch(val){
                                case 0:
                                    v0++;
                                    break;
                                case 1:
                                    v1++;
                                    break;
                                case 2:
                                    v2++;
                                    break;
                                case 3:
                                    v3++;
                                    break;
                                case 4:
                                    v4++;
                                    break;
                            }
                        }
                    }
                }
            }
        }
    }    
    document.getElementById("grafica").innerHTML="";
    Morris.Line({        
        element:'grafica',
        parseTime:false,
        hideHover:true,
        lineWidth:'2px',
        stacked: true,
        data: [           
            {valor:'N', "frecuencia":v0},             
            {valor:'PV', "frecuencia":v1},             
            {valor:'AV', "frecuencia":v2},             
            {valor:'CS', "frecuencia":v3},               
            {valor:'S', "frecuencia":v4}
        ],
        xkey: 'valor', 
        ykeys: ['frecuencia'],
        labels: ['Frec.']                
    });
    res=parseInt((v0*0)+(v1*1)+(v2*2)+(v3*3)+(v4*4))/total;
    res=res.toFixed(2);
    interpretacion="";
    if(res<0.67){
        interpretacion="Datos Insuficientes";
    }else if(res<1.33){
        interpretacion="No tiene la condición";
    }else if(res<2){
        interpretacion="No Probable";
    }else if(res<2.67){
        interpretacion="Si Probable";
    }else if(res<3.33){
        interpretacion="Sí tiene la Condición";
    }else{
        interpretacion="Sí tiene la Condición en Grado Alto";
    }
    document.getElementById("resultados").innerHTML=cnt+" / "+total;
    document.getElementById("resultados").style.visibility = 'visible';                                
    if(cnt==total){//Se muestran elementos
        document.getElementById("grafica").style.visibility = 'visible';
        document.getElementById("interpretacion").innerHTML=interpretacion;    
        document.getElementById("interpretacion").style.visibility = 'visible'; 
        if(tipoCondicion==1){
            document.getElementById("guardar").style.visibility = 'visible';  
        }else if(tipoCondicion==2){
            document.getElementById("guardar2").style.visibility = 'visible'; 
        }else{
            document.getElementById("finalizar").style.visibility = 'visible';
        }        
    }
}
$(document).ready(function(){ //Fija ventana de resultados 
    // boxTop = $("#grafica").offset().top;
    boxTop = 340;
    // alert(boxTop);
    $(contenedor).scroll(function(){  
        var isFixed = $("#grafica").css("position") === "fixed";
        if($(contenedor).scrollTop()+111>boxTop && !isFixed){            
            $("#grafica").css({position:"fixed", top: "110px",left: "928px"});
            $("#resultados").css({position:"fixed", top: "110px",left: "813px"});
            $("#interpretacion").css({position:"fixed", top: "270px",left: "928px"});
        }else if($(contenedor).scrollTop()+111 < boxTop){
            $("#grafica").css({position:"absolute",top: "290px", left: "670px"});
            $("#resultados").css({position:"absolute",top: "290px", left: "555px"});
            $("#interpretacion").css({position:"absolute", top: "450px",left: "670px"});
        }
    })
})
function guardarNominaciones(docNominador,tipoCondicion){
    start();
    document.getElementById("mensajeEspera").style.visibility='visible';    
    // var caso=caso;
    var confirmacion;
    var chbxs = document.getElementById("razones");
    var codEstudiante=document.getElementById("estudiantes").value;
    var codArea=document.getElementById("areas").value;
    var condiciones=[];
    for(var x=1; x<chbxs.children.length+1; x++){
        var nivel1=chbxs.children[x-1];
        for(var y=1; y<nivel1.children.length+1; y++){            
            if(nivel1.children[y-1].tagName=="UL"){  
                var nivel2=nivel1.children[y-1];                             
                for(var z=1; z<nivel2.children.length+1; z++){
                    var nivel3=nivel2.children[z-1];                             
                    for(var w=1; w<nivel3.children.length+1; w++){
                        if(nivel3.children[w-1].checked){ 
                            condicionId=chbxs.children[x-1].id;  
                            condicionId=condicionId.substring(4,condicionId.length);
                            val=parseInt(nivel3.children[w-1].value)
                            condiciones.push([condicionId,val]);
                        }
                    }
                }
            }
        }
    }
    $.ajax({
        type: "POST",
        url: '../bdNominaciones/02-guardarNominados.php',
        data:{
            'codEstudiante': codEstudiante,
            'codArea': codArea,
            'condiciones': JSON.stringify(condiciones),
            'docNominador': docNominador,
            'tipoCondicion': tipoCondicion
        },
        success: function(resp){ 
            // alert(resp);
            if(resp=="si"){
                alert("Los datos se han guardado.");
            }
            $.ajax({
                type: "POST",
                url: '../bdNominaciones/04-cargarEstNom.php',
                data:{
                    'docNominador': docNominador
                },
                success: function(resp){
                    // alert(resp);
                    document.getElementById("nomHechas").innerHTML="";
                    document.getElementById("nomHechas").innerHTML=resp;
                    document.getElementById("grafica").innerHTML="";
                    document.getElementById("resultados").innerHTML="";
                    document.getElementById("interpretacion").innerHTML="";
                    document.getElementById("grafica").style.visibility='hidden';
                    document.getElementById("resultados").style.visibility='hidden';
                    document.getElementById("interpretacion").style.visibility='hidden';
                    document.getElementById("seccionRazon").style.visibility = 'hidden';
                    document.getElementById("guardar").style.visibility = 'hidden';
                    document.getElementById("guardar2").style.visibility = 'hidden';
                    document.getElementById("finalizar").style.visibility = 'hidden'; 
                    if(tipoCondicion==1){
                        cargarCondiciones(codEstudiante,2);
                        document.getElementById("contenedor").scrollTop = 0;
                    }else if(tipoCondicion==2){
                        cargarCondiciones(codEstudiante,3);
                        document.getElementById("contenedor").scrollTop = 0;
                    }else{
                        cargarPagina('../bdNominaciones/01-selEstNom.php');
                    }
                }
            });              
        }
    });    
    document.getElementById("mensajeEspera").style.visibility='hidden';
}
function actualizarSugerencia(docNominador){
    start();
    document.getElementById("mensajeEspera").style.visibility='visible';    
    var caso;
    var chbxs = document.getElementById("razones");
    for (var x=1; x<chbxs.elements.length+1; x++){
        var id = chbxs.elements[x-1].id
        // alert(id+", "+id.indexOf("razon"));
        if(id.indexOf("razon")==0){
            caso=1;             
        }else{
            caso=2;
        }
    }
    // alert(caso);
    var idEstudiante=document.getElementById("estudiantes").value;
    var idArea=document.getElementById("areas").value;
    var chbxs = document.getElementById("razones");
    var razones="";    
    var cnt=1;
    for (var x=1; x < chbxs.elements.length+1; x++){
        if(chbxs.elements[x-1].checked) {
            if(cnt==1){ 
                razones=chbxs.elements[x-1].value;              
            }else{
                razones+=", "+chbxs.elements[x-1].value;    
            }
            cnt++;          
        }
    }
    if(caso==1){
        // alert("Estudiante ID: "+idEstudiante +"\n Área: "+idArea+"\n Razones: "+razones+"\n Docente: "+docNominador+"\n Caso: "+caso);  
        $.ajax({
            type: "POST",
            url: '../bdSugerencias/02-guardarSugerencia.php',
            data:{
                'idEstudiante': idEstudiante,
                'idArea': idArea,
                'razones': razones,
                'docNominador': docNominador,
                'caso': caso
            },
            success: function(resp){ 
                // alert(resp);       
                if(resp=="si"){
                    alert("La sugerencia se ha actualizado.");
                }
                var val = document.getElementById("estudiantes").value
                cargarAreas(val);                
                $.ajax({
                    type: "POST",
                    url: '../bdSugerencias/03-cargarEstSugNom.php',
                    data:{
                        'idEstudiante': idEstudiante,
                        'docNominador': docNominador
                    },
                    success: function(resp){
                        // alert(resp);
                        document.getElementById("sugHechas").innerHTML="";
                        document.getElementById("sugHechas").innerHTML=resp;
                        document.getElementById("guardar2").style.visibility = 'hidden';                  
                        document.getElementById("mensajeEspera").style.visibility='hidden'; 
                    }
                });
            }
        });
    }else{
        // alert("Estudiante ID: "+idEstudiante +"\n Área: "+idArea+"\n Argumentos: "+razones+"\n docente: "+docNominador);
        var confirmacion;
        $.ajax({
            type: "POST",
            url: '../bdSugerencias/02-guardarSugerencia.php',
            data:{
                'idEstudiante': idEstudiante,
                'idArea': idArea,
                'razones': razones,                
                'docNominador':docNominador,
                'caso':caso
            },
            success: function(resp){    
                // alert(resp);    
                if(resp=="si"){
                    alert("La sugerencia se ha actualizado.");
                    var val = document.getElementById("estudiantes").value
                    cargarAreas(val);
                    $.ajax({
                        type: "POST",
                        url: '../bdSugerencias/03-cargarEstSugNom.php',
                        data:{
                            'idEstudiante': idEstudiante,
                            'docNominador': docNominador
                        },
                        success: function(resp){
                            // alert(resp);
                            document.getElementById("sugHechas").innerHTML="";
                            document.getElementById("sugHechas").innerHTML=resp;
                            document.getElementById("guardar2").style.visibility = 'hidden';                        
                            document.getElementById("mensajeEspera").style.visibility='hidden';
                        }
                    });
                }
            }
        });
        
    }   
}
function cargarSubrazones(idEstudiante,idArea,docNominador){
    // alert(idEstudiante+", "+idArea);
    
    document.getElementById("mensajeEspera").style.visibility='visible';

    $.ajax({
        type: "POST",
        url: '../bdSugerencias/consulta.php',
        data: 'enunciaSubrazon='+idEstudiante,
        success: function(resp){
            // alert(resp);
            document.getElementById("enunciaRazon").innerHTML=resp;
        }
    });

    $.ajax({
        type: "POST",
        url: '../bdSugerencias/consulta.php',
        data: {
            'idEstudiante': idEstudiante,
            'idArea': idArea,
            'docNominador': docNominador
        },
        success: function(resp){
            // alert(resp);
            document.getElementById("razones").innerHTML=resp;
            document.getElementById("seccionRazon").style.visibility = 'visible';
            document.getElementById("mensajeEspera").style.visibility='hidden';
            var chbxs = document.getElementById("razones");
            var cnt=0;
            for (var x=1; x < chbxs.elements.length+1; x++){
                if(chbxs.elements[x-1].checked) {
                    cnt++;          
                }
            }
            // alert(id+", "+document.getElementById("subrazon"+id).checked);    
            if(cnt>0){
                document.getElementById("guardar2").style.visibility = 'visible';
            }
        }
    });
    document.getElementById("guardar").style.visibility = 'hidden';
}
function cargarEvidenciaEmpirica(idEstudiante,idArea,docNominador){
     $.ajax({
        type: "POST",
        url: '../bdSugerencias/consulta.php',
        data: 'enunciaEvidencia='+idEstudiante,
        success: function(resp){
            // alert(resp);
            document.getElementById("enunciaRazon").innerHTML=resp;
        }
    });
    $.ajax({
        type: "POST",
        url: '../bdSugerencias/consulta.php',
        async:false,
        data: {
            'idEstEvdc': idEstudiante,
            'idArea': idArea,
            'docNominador': docNominador
        },
        success: function(resp){
            // alert(resp);
            document.getElementById("razones").innerHTML=resp;
            document.getElementById("seccionRazon").style.visibility = 'visible';
            document.getElementById("mensajeEspera").style.visibility='hidden'; 
            var cnt=0;
            var chbxs = document.getElementById("razones");             
            for (var x=1; x < chbxs.elements.length+1; x++){
                if(chbxs.elements[x-1].value==""){
                    cnt++;
                    chbxs.elements[x-1].style.border='2px solid #ff0000';
                    chbxs.elements[x-1].style.background='#ff000036';
                    if(cnt==1){
                        chbxs.elements[x-1].focus();                    
                    }                    
                }
            } 
            if(cnt==0){
                chbxs.elements[0].focus();
            }
        }
    });
    document.getElementById("guardar2").style.visibility = 'hidden';
    document.getElementById("finalizar").style.visibility = 'visible';    
}
function cargarSugxModificar(cod,docNom,area,tipo){
    // alert(cod+", "+docNom+", "+area);
    document.getElementById("mensajeEspera").style.visibility='visible';
    document.getElementById("guardar2").style.visibility = 'hidden';
    document.getElementById("finalizar").style.visibility = 'hidden';
    var sede;
    var grupo;
    var estudiante;
    var area;
    $.ajax({
        type: "POST",
        url: '../bdSugerencias/consulta02.php',
        data: {
            'cod': cod,
            'cnt': 1 //sede
        },
        success: function(resp){
            // alert(resp);
            document.getElementById("sede").innerHTML="";
            document.getElementById("sede").innerHTML=resp;
            sede=document.getElementById("sede").value;
            // alert(sede);
            $.ajax({
                type: "POST",
                url: '../bdSugerencias/consulta02.php',
                data: {
                    'cod': cod,
                    'sede': sede,
                    'cnt': 2 // grupo
                },
                success: function(resp){
                    // alert(resp);
                    document.getElementById("grupos").innerHTML="";
                    document.getElementById("grupos").innerHTML=resp;
                    grupo=document.getElementById("grupos").value;
                    $.ajax({
                        type: "POST",
                        url: '../bdSugerencias/consulta02.php',
                        data: {
                            'cod': cod,
                            'grupo': grupo,
                            'cnt': 3 //estudiante
                        },
                        success: function(resp){
                            // alert(resp);
                            document.getElementById("estudiantes").innerHTML="";
                            document.getElementById("estudiantes").innerHTML=resp;
                            estudiante=document.getElementById("estudiantes").value;
                            $.ajax({
                                type: "POST",
                                url: '../bdSugerencias/consulta02.php',
                                data: {
                                    'cod': cod,
                                    'estudiante': estudiante,
                                    'cnt': 4 //enunciado
                                },
                                success: function(resp){
                                    // alert(resp);
                                    document.getElementById("estudiante").innerHTML=resp;
                                    document.getElementById("seccionArea").style.visibility = 'visible';
                                    $.ajax({
                                        type: "POST",
                                        url: '../bdSugerencias/consulta02.php',
                                        data: {
                                            'cod': cod,
                                            'estudiante': estudiante,
                                            'area': area,
                                            'cnt': 5 //Area
                                        },
                                        success: function(resp){
                                            // alert(resp);
                                            document.getElementById("areas").innerHTML="";
                                            document.getElementById("areas").innerHTML=resp;
                                            area=document.getElementById("areas").value;
                                            if(tipo==8){
                                                $.ajax({
                                                    type: "POST",
                                                    url: '../bdSugerencias/consulta02.php',
                                                    data: {
                                                        'cod': cod,
                                                        'estudiante': estudiante,
                                                        'cnt': 6 
                                                    },
                                                    success: function(resp){
                                                        // alert(resp);
                                                        document.getElementById("enunciaRazon").innerHTML=resp;
                                                        document.getElementById("seccionRazon").style.visibility = 'visible';
                                                        $.ajax({
                                                            type: "POST",
                                                            url: '../bdSugerencias/consulta02.php',
                                                            data: {
                                                                'cod': cod,
                                                                'estudiante': estudiante,
                                                                'area': area,
                                                                'docNominador': docNom,
                                                                'cnt': tipo
                                                            },
                                                            success: function(resp){
                                                                // alert(resp);
                                                                document.getElementById("razones").innerHTML=resp;
                                                                document.getElementById("seccionRazon").style.visibility = 'visible';
                                                                document.getElementById("guardar").style.visibility = 'visible';                  
                                                                document.getElementById("mensajeEspera").style.visibility='hidden'; 
                                                                
                                                            }
                                                        });                                                        
                                                    }
                                                });
                                            }else{
                                                // alert(tipo);
                                                $.ajax({
                                                    type: "POST",
                                                    url: '../bdSugerencias/consulta02.php',
                                                    data: {
                                                        'cod': cod,
                                                        'estudiante': estudiante,
                                                        'cnt': 7
                                                    },
                                                    success: function(resp){
                                                        // alert(resp);
                                                        document.getElementById("enunciaRazon").innerHTML=resp;
                                                        document.getElementById("seccionRazon").style.visibility = 'visible';
                                                        $.ajax({
                                                            type: "POST",
                                                            url: '../bdSugerencias/consulta02.php',
                                                            data: {
                                                                'cod': cod,
                                                                'estudiante': estudiante,
                                                                'area': area,                                                                
                                                                'docNominador': docNom,
                                                                'cnt': tipo
                                                            },
                                                            success: function(resp){
                                                                // alert(resp);
                                                                document.getElementById("razones").innerHTML=resp;
                                                                document.getElementById("seccionRazon").style.visibility = 'visible';
                                                                document.getElementById("guardar2").style.visibility = 'visible';                
                                                                document.getElementById("mensajeEspera").style.visibility='hidden'; 
                                                                
                                                            }
                                                        });                                                        
                                                    }
                                                });
                                            }
                                            
                                        }
                                    });
                                }
                            });
                        }
                    });
                }
            });
        }
    });     
}