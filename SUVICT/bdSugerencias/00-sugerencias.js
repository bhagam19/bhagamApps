function cargarGrupos(val,docNom){
	// alert(val+", "+docNom);	
	document.getElementById("mensajeEspera").style.visibility='visible';
    $.ajax({
        type: "POST",
        url: '../bdSugerencias/consulta.php',
        data: 'idSede='+val,
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
        }
    });
    $.ajax({
        type: "POST",
        url: '../bdSugerencias/03-cargarEstSugNom.php',
        data: {
            'idSede': val,
            'docNominador': docNom
        },
        success: function(resp){
            // alert(resp);
            document.getElementById("sugHechas").innerHTML="";
             document.getElementById("sugHechas").innerHTML=resp;
        }
    });
}
function cargarEstudiantes(idGrupo,docNom){
	// alert(idGrupo);	
	document.getElementById("mensajeEspera").style.visibility='visible';
    $.ajax({
        type: "POST",
        url: '../bdSugerencias/consulta.php',
        data: 'idGrupo='+idGrupo,
        success: function(resp){
        	// alert(resp);
            document.getElementById("estudiantes").innerHTML=resp;
            document.getElementById("mensajeEspera").style.visibility='hidden';
            document.getElementById("seccionArea").style.visibility = 'hidden';
            document.getElementById("seccionRazon").style.visibility = 'hidden';
            document.getElementById("guardar").style.visibility = 'hidden';
        }
    });
    var idSede=document.getElementById("sede").value;
    $.ajax({
        type: "POST",
        url: '../bdSugerencias/03-cargarEstSugNom.php',
        data: {
            'idSede': idSede,
            'idGrupo': idGrupo,
            'docNominador': docNom
        },
        success: function(resp){
            // alert(resp);
            document.getElementById("sugHechas").innerHTML="";
            document.getElementById("sugHechas").innerHTML=resp;
        }
    });
}
function cargarAreas(idEstudiante,docNom){
	// alert(idEstudiante);docNom
	
	document.getElementById("mensajeEspera").style.visibility='visible';
    $.ajax({
        type: "POST",
        url: '../bdSugerencias/consulta.php',
        data: 'estudiante='+idEstudiante,
        success: function(resp){
        	// alert(resp);
        	document.getElementById("estudiante").innerHTML=resp;
        	document.getElementById("seccionRazon").style.visibility = 'hidden';
            document.getElementById("guardar").style.visibility = 'hidden';
        }
    });
    $.ajax({
        type: "POST",
        url: '../bdSugerencias/consulta.php',
        data: {
            'areas': 'si',
            'estudiante': idEstudiante,
            'docNominador': docNom,
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
        url: '../bdSugerencias/03-cargarEstSugNom.php',
        data: {
            'idSede': idSede,
            'idGrupo': idGrupo,
            'idEstudiante': idEstudiante,
            'docNominador': docNom
        },
        success: function(resp){
            // alert(resp);
            document.getElementById("sugHechas").innerHTML="";
             document.getElementById("sugHechas").innerHTML=resp;
        }
    });
}
function cargarRazones(idEstudiante){
	// alert(idEstudiante);
	
	document.getElementById("mensajeEspera").style.visibility='visible';
    $.ajax({
        type: "POST",
        url: '../bdSugerencias/consulta.php',
        data: 'enunciaRazon='+idEstudiante,
        success: function(resp){
        	// alert(resp);
        	document.getElementById("enunciaRazon").innerHTML=resp;
        }
    });

    $.ajax({
        type: "POST",
        url: '../bdSugerencias/consulta.php',
        data: 'razones=si',
        success: function(resp){
        	// alert(resp);
        	document.getElementById("razones").innerHTML=resp;
            document.getElementById("seccionRazon").style.visibility = 'visible';
            document.getElementById("mensajeEspera").style.visibility='hidden';
        }
    });
}
function mostrarGuardar(id){
    var chbxs = document.getElementById("razones");
    var cnt=0;
    for (var x=1; x < chbxs.elements.length+1; x++){
        if(chbxs.elements[x-1].checked) {            
            cnt++;          
        }
    }
    // alert(id+", "+document.getElementById("subrazon"+id).checked);   
    if(cnt>0){
        document.getElementById("guardar").style.visibility = 'visible';
    }else{
        document.getElementById("mensajeEspera").style.visibility='hidden';
        document.getElementById("guardar").style.visibility = 'hidden';
    }   
}
function guardarSugerencia(docNominador){
    document.getElementById("mensajeEspera").style.visibility='visible';    
    var caso;
    var chbxs = document.getElementById("razones");
    var confirmacion;
    for (var x=1; x<chbxs.elements.length+1; x++){
        var id = chbxs.elements[x-1].id
        // alert(id+", "+id.indexOf("razon"));
        if(id.indexOf("razon")==0){
            caso=1;             
        }else if(id.indexOf("subrazon")==0){
            caso=2;
        }else if(id.indexOf("evidencia")==0){
            caso=3;
        }
    }
    // alert(caso);
    var idEstudiante=document.getElementById("estudiantes").value;
    var idArea=document.getElementById("areas").value;
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
    if(caso==1){//guarda las razones
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
                    // alert("La sugerencia se ha guardado.");
                }
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
                    }
                });
                if(razones=="1"||razones=="2"||razones=="1, 2"){
                    cargarEvidenciaEmpirica(idEstudiante,idArea,docNominador);                    
                }else{
                    cargarSubrazones(idEstudiante,idArea,docNominador);
                }                
            }
        });
    }else if(caso==2){//guarda las subrazones (argumentos)
        // alert("Estudiante ID: "+idEstudiante +"\n Área: "+idArea+"\n Argumentos: "+razones+"\n docente: "+docNominador);
        $.ajax({
            type: "POST",
            url: '../bdSugerencias/02-guardarSugerencia.php',
            async:false,
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
                    // alert("La sugerencia se ha actualizado.");

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
                        }
                    });
                    cargarEvidenciaEmpirica(idEstudiante,idArea,docNominador);                                     
                }
            }
        });        
        
    }else if(caso==3){
        // alert("Vamos a guardar la evidencia.");
        var entregasExitosas=0;
        for (var x=1; x<chbxs.elements.length+1; x++){
            var id = chbxs.elements[x-1].id;
            var numSubr = id.substring(9, id.length);
            var contenido = chbxs.elements[x-1].value;
            $.ajax({
                type: "POST",
                url: '../bdSugerencias/02-guardarSugerencia.php',
                async: false,
                data:{
                    'idEstudiante': idEstudiante,
                    'idArea': idArea,
                    'docNominador':docNominador,
                    'caso':caso,
                    'contenido': contenido,   
                    'numSubr': numSubr
                },
                success: function(resp){
                    // alert(resp);  
                    if(resp=="si"){
                        entregasExitosas++;                                                                     
                    }
                }
            });         
        }
        // alert(entregasExitosas);
        // alert(chbxs.elements.length);
        if(entregasExitosas==chbxs.elements.length){
            alert("La sugerencia se ha guardado.");
            confirmacion = confirm("¿Deseas sugerir otra área para este estudiante?");
            if(confirmacion==true){
                var val = document.getElementById("estudiantes").value
                cargarAreas(val,docNominador);
                document.getElementById("finalizar").style.visibility = 'hidden';
                document.getElementById("mensajeEspera").style.visibility='hidden';
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
                    }
                });
            }else{
                document.getElementById("mensajeEspera").innerHTML="Por favor espera un momento...";
                $.ajax({
                    type: "POST",
                    url: '../bdSugerencias/consulta.php',
                    data: 'reinicio=si',
                    success: function(resp){
                        // alert(resp);
                        document.getElementById("sede").innerHTML=resp;
                        document.getElementById("grupos").innerHTML="";
                        document.getElementById("estudiantes").innerHTML="";
                        document.getElementById("seccionArea").style.visibility = 'hidden';
                        document.getElementById("seccionRazon").style.visibility = 'hidden';
                        document.getElementById("guardar").style.visibility = 'hidden';
                        document.getElementById("finalizar").style.visibility = 'hidden'; 
                    }
                });
                $.ajax({
                    type: "POST",
                    url: '../bdSugerencias/03-cargarEstSugNom.php',
                    data: {
                        'docNominador': docNominador
                    },
                    success: function(resp){
                        // alert(resp);
                        document.getElementById("sugHechas").innerHTML="";
                        document.getElementById("sugHechas").innerHTML=resp;
                        document.getElementById("mensajeEspera").style.visibility='hidden';
                    }
                });
            }
        }              
    }
}
function mostrarGuardar2(id){
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
    }else{
        document.getElementById("mensajeEspera").style.visibility='hidden';
        document.getElementById("guardar2").style.visibility = 'hidden';
    }
}
function actualizarSugerencia(docNominador){
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