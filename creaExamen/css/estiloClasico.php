<?php
    header('content-type:text/css');
    $imagenFondo="none";
    $luzEncendida01 ='#D8D8D8'; //#0040FF // Luz Encendida //41FF01 //81BEF7 // verdeEncendido(#72FC27)
    
    $textoEncendido ='#000000';
    $textoApagado='#000000';
    $bordeEncendido01 = '#000000';
    $bordeApagado01='#000000';
    
    $fondo01 ='rgba(200,200,200,0.1)';
    $fondo03 ='rgba(200,200,200,0.3)';
    $fondo05 ='rgba(200,200,200,0.5)'; //Estado inactivo
    $fondo07 ='rgba(200,200,200,0.7)';
    $fondo09 ='rgba(250,250,250,1)'; //Estado activo
    $fondo10 ='rgba(230,250,250,1)';
     
    echo "
        html{
        	background-image:$imagenFondo;
        	background-attachment:fixed;	
        	background-repeat:no-repeat;
        	background:#F9FCD5;
        }
        header{	
        	position:fixed;
        	top:10px;
        	left:20px;
        	height:35px;
        	width:1200px;
        	border:1px solid $bordeEncendido01;
        	border-radius:5px 5px;
        	box-shadow: 2px 2px 5px #9C9C9C;
        	background:$fondo09;
        	z-index:5;
        }
        /*header:hover{
            /*top:9px;
            left:9px;*/
            border:1px solid $bordeEncendido01;
        	box-shadow:0px 0px 10px $luzEncendida01;
        	background:$fondo10;
        }*/
        header:hover li{
        	background:$fondo09;
        	border:1px solid $bordeEncendido01;
        }
        nav ul{
        	position:relative;
        	list-style:none;
        	padding:5px;
        	width:500px;
        	top:-15px;	
        }
        nav li{
        	position:relative;
        	display:inline;
        	border:1px solid $bordeApagado01;
        	margin:3px;
        	border-radius:5px;
        	font-size:14px;
        	font-family:verdana;	
        	color:$textoApagado;
        	cursor:pointer;
        	border-radius:5px 5px 5px 5px;
        	padding:0px 10px;
        	background:$fondo09;
        }
        nav li ul{
        	position:absolute;
        	left:-9999px;
        	width:150px;
        	
        }
        nav li ul li{
        	display:block;
        	background:$fondo09;
        	margin-top:-2px;
        	border-radius:5px;
        	border:1px solid $bordeApagado01;
        	text-shadow:none;
        	color:$textoApagado;
        	border-radius:5px 5px 5px 5px;
        	text-align:center;
        	box-shadow: 2px 2px 5px #9C9C9C;
        	
        }
        nav li:hover{	
        	box-shadow:0px 0px 10px $luzEncendida01;
        	border:1px solid $bordeEncendido01;
        	color:$textoEncendido;
        	text-shadow: NONE;
        	background:$fondo10;
        }
        nav li:hover ul{
        	left:-9px;
        	top:16px;
        	z-index:3;	
        }
        nav li ul li:hover{
        	box-shadow:0px 0px 30px $luzEncendida01;
        	border:1px solid $bordeEncendido01;
        	color:$textoEncendido;
        	text-shadow: 0px 0px 10px $luzEncendida01;
        	background:$fondo10;
        	box-shadow: 2px 2px 5px #9C9C9C;
        	
        }
        #usuario-registrado{
        	position:absolute;
        	float:right;
        	margin-bottom:20px;
        	top:0px;	
        	right:5px;
        	width:300px;
        	color:$textoEncendido;
        	text-shadow: 0px 0px 10px $luzEncendida01;
        	font-weight:bold;
        	text-align:right;
        	padding:5px;
        	z-index:102;
        }
        
        #contenedorPpal{
        	position:relative;
        	top:50px;
        	left:10px;
        	width:1200px;
        	height:734px;
        	border-radius: 5px;	
        	border:1px solid $bordeEncendido01;
        	box-shadow: 2px 2px 5px #9C9C9C;
        	background:$fondo09;
        	z-index:3;
        }
        #contenedorPpal:hover{
        	
        }
        #contenedorPpal:hover #bloque1, #contenedorPpal:hover #bloque2, #contenedorPpal:hover #bloque3{
        	border: 1px solid $bordeEncendido01;
        }
        
        /*Contenido bloque 1*/
        #bloque1{
        	position:absolute;
        	top:14px;
        	left:14px;
        	width:390px;
        	height:706px;
        	border: 1px solid $bordeApagado01;
        }
        #encabezado{
        	position:relative;	
        	border: 1px solid $bordeApagado01;
        	border-radius:5px;
        	color:$textoApagado;
        	top: 10px;
        	left:10px;
        	width:370px;
        	height:100px;
        	cursor:move;
        	background:$fondo09;	
        }
        #encabezado:hover{
        	border:1px solid $bordeEncendido01;	
        	box-shadow:0px 0px 30px $luzEncendida01;
        	background:$fondo10;
        	text-shadow: 0px 0px 10px $luzEncendida01;
        	color:$textoEncendido;
        }
        #encabezado:hover .escudo{
        	opacity:1;
        	box-shadow:0px 0px 30px $luzEncendida01;
        }
        .encabezado{
        	position:absolute;	
        	top:5px;
        	left:5px;
        	font-size:10px;
        	padding:5px;
        }
        #escudo{
        	position:absolute;
        	top:5px;
        	right:5px;
        	width:80px;
        	height:80px;
        }
        .escudo{
        	position:relative;
        	border-radius:5px;
        	top:2px;
        	left:2px;
        	width:76px;
        	height:76px;
        }
        
        #contenedorParte1{
        	position:relative;	
        	margin:5px;
        	margin-top:15px;
        	padding:5px;
        	background:$fondo09;
        	color:$textoApagado;
        	border-top:3px solid $bordeApagado01;
        	font-size:12px;
        }
        #contenedorParte1:hover{
            color:$textoEncendido;
        	border-top:3px solid $bordeEncendido01;
        }
        #contenedorParte1:hover #contenedorPregunta{
        	
        }
        #contenedorParte1:hover #contenedorOpciones, #contenedorParte1:hover #numeracion{
            
        }
        #titulo{
        	text-align:center;
        	font-weight:bold;
        }
        #contenedorPregunta{	
        	position:relative;
        	height:65px;
        	width:auto;
        	display:block;
        	margin-top:15px;
        	border:1px solid black;
        	background:$fondo09;
        	cursor:move;
        	border-radius:5px;
        }
        #contenedorPregunta:hover, #contenedorPregunta:hover .imagenTipoImagen{
        	box-shadow:0px 0px 10px $luzEncendida01;
        	background:$fondo10;
        	opacity:1;
        }
        
        #contenedorPregunta:hover #contenedorOpciones, #contenedorPregunta:hover #numeracion{
        	color:$textoEncendido;
        	text-shadow: none;
        }
        #numeracion{
        	position:absolute;
        	top:-15px;
        	width:10px;
        }
        #contenedorImagen{
        	position:relative;
        	top:2px;
        	left:2px;
        	display:inline;
        }
        .imagenTipoImagen{
        	border-radius:5px;
        	opacity:1;
        }
        #contenedorOpciones{
        	position:absolute;
        	top:10px;
        	left:70px;	
        	width:100px;
        	display:inline;
        	background:none;
        	color:$textoApagado;
        }
        
        /*Contenido bloque 2*/
        #bloque2{
        	position:absolute;
        	top:14px;
        	margin-left:404px;
        	margin-right:404px;
        	width:390px;
        	height:706px;
        	border: 1px solid $bordeApagado01;	
        }
        #bloque3{
        	position:absolute;
        	top:14px;
        	right:14px;
        	width:390px;
        	height:706px;
        	border: 1px solid $bordeApagado01;	
        }
        
        /* Común a todos los formularios*/
        #cambiarApariencia{
            position:fixed;
        	top:-68px;
        	left:50%;
        	width:200px;
        	height:auto;
        	margin-left:-100px;
        	background:$fondo09;
            border:1px solid $bordeEncendido01;
            border-radius:0px 0px 25px 25px;
        	z-index:101;
        }
        #cambiarApariencia:hover{
            box-shadow: 0px 0px 30px $luzEncendida01;
            background:$fondo09;
        }
        #cambiarApariencia:hover #pestanaInferior{
            text-shadow:0px 0px 10px $luzEncendida01;
            color:$textoEncendido;
        }
        #superior{
            position:relative;
        	width:200px;
        	height:60px;
        	margin:0 auto;
        	background:$fondo01;
            
        }
        #superior form{
            position:relative;
            left:30px;
            width:100px;
            color:$textoApagado;
            cursor:default;
        }
        #verde:hover .verde{
            color:$textoEncendido;
            text-shadow:0px 0px 10px $luzEncendida01;
       }
        #azul:hover .azul{
            color:$textoEncendido;
            text-shadow:0px 0px 10px $luzEncendida01;
       }
        #pestanaInferior{
            position:relative;
            top:5px;
        	width:200px;
        	height:20px;
        	margin:0 auto;
        	border:1px none $bordeEncendido01;
            text-align:center;
            color:$textoApagado;
            cursor:default;
            font-size:12px;
            
        }
        
        #separador{
        	position:fixed;
        	background:$bordeApagado01;
        	opacity:0.6;
            top:0px;
            bottom:0px;
            left:0px;
            right:0px;
            z-index:10;
        }
        #formulario{
            position:fixed;
        	top:-350px;
        	left:0px;
        	right:0px;
        	margin:0 auto;
        	background:$fondo09;
            border:1px solid $bordeEncendido01;
            box-shadow: 2px 2px 5px #000000;
            font-family:times;
            font-size:14px;
            border-radius:5px 5px;
        	z-index:101;
        }
        #handler{
        	height:40px;
        	background:$fondo10;
        	border:1px solid $bordeEncendido01;
        	text-align:center;
        	text-shadow: 10px $luzEncendida01;
        	color:$textoEncendido;
        	font-weight:normal;
        	cursor:move;
        	border-radius:5px 5px 0px 0px;
        	border-bottom:1px solid $bordeEncendido01;
        } 
        #handler p{
        	position:relative;
        	top:-5px;
        	text-shadow:0px 0px 10px $luzEncendida01;
        }
        a.cerrar{
            float:right;
            width:20px;
            height:20px;
            margin-top:-10px;
            margin-right:-10px;
            cursor:pointer;
        	background:$fondo10;
        	border-radius:25px;
        	color:$textoEncendido;
        	border:1px solid $bordeEncendido01;	
        	padding-top:5px;
        }
        a.cerrar:hover{
        	box-shadow:0px 0px 30px $luzEncendida01;
        	text-shadow: 10px $luzEncendida01;
        	background:$fondo09;
        }
        #formulario table{
        	margin:10px;
        }
        #formulario td{
        	padding-left:5px;
        	padding-right:5px;
        	color:$textoEncendido;
        }
        #formulario td:hover{
            text-shadow:0px 0px 10px $luzEncendida01;
        }
        .submit{
        	border-radius:3px;
        	font-family:verdana;	
        	cursor:pointer;
        	border-radius:5px;
        	padding:0px 10px;
        	background:$fondo10;
        	border:1px solid $bordeApagado01;
        	color:$textoApagado;
        }
        .submit:hover{
        	box-shadow:0px 0px 30px $luzEncendida01;
        	border:1px solid $bordeEncendido01;
        	color:$textoEncendido;
        	text-shadow: 0px 0px 10px $luzEncendida01;
        	background:$fondo05;
        }
        .submit2{
        	background:$fondo09;
        	border:1px solid #000000;
        	border-radius:5px;
        	font-family:verdana;	
        	color:#000000;	
        	cursor:pointer;
        	padding:0px 10px;
        	box-shadow:2px 2px 4px #9c9c9c;
        	
        	
        } /*botones rojos*/
        .submit2:hover{
        	border:1px solid #000000;
        	background:$fondo10;
        	box-shadow:-1px -1px 4px #9C9C9C;
        }
        .submit3{
        	background:$fondo03;
        	border-radius:3px;
        	font-family:verdana;	
        	color:$textoApagado;
        	border:1px solid $bordeApagado01;
        	cursor:pointer;
        }
        .submit3:hover{
        	background:$fondo05;
        	box-shadow:0px 0px 30px $luzEncendida01;
        	text-shadow: 0px 0px 10px $luzEncendida01;
        	border:1px solid $bordeEncendido01;
        	color:$textoEncendido;
        }
        input{
        	border:1px solid $bordeApagado01;
        	color:$textoApagado;
        	background:$fondo10;
        	width:80px;
        	padding-left:10px;
        	width:auto;
        	border-radius:5px;
        }
        input:focus{
            outline:0px;
        	border:1px solid $bordeEncendido01;
        	background:$fondo09;
        	color:$textoEncendido;
        	text-shadow:0px 0px 10px $luzEncendida01;
        }
        input:hover{
            box-shadow:0px 0px 30px $luzEncendida01;
        }
        select{
            border:1px solid $bordeApagado01;
        	color:$textoApagado;
        	background:$fondo09;
        	width:80px;
        	padding-left:10px;
        	width:auto;
        	border-radius:25px 0px 25px 0px;
        }
        select:focus{
            outline:0px;
            background:$fondo07;
        	border:1px solid $bordeEncendido01;
        	color:$textoEncendido;
        	text-shadow:0px 0px 10px $luzEncendida01;
        	box-shadow:0px 0px 30px $luzEncendida01;
        }
        select:hover{
            outline:0px;
            background:$fondo07;
        	border:1px solid $bordeEncendido01;
        	color:$textoEncendido;
        	text-shadow:0px 0px 10px $luzEncendida01;
        	box-shadow:0px 0px 30px $luzEncendida01;
        }
        option{
            outline:0px;
            border:1px solid $bordeApagado01;
        	color:$textoApagado;
        	background:$fondo01;
        }
        
        /* Formulario Login*/
        .loginFormulario{
        	width:250px;
        	height:250px;
        }
        .loginFormulario td{
        	color:$textoEncendido;
        	text-shadow: 0px 0px 10px $luzEncendida01;
        }
        
        /* Formulario Encabezado*/
        .encabezadoFormulario{
        	width:430px;
        	height:250px;
        	
        }
        
        /* Formulario Tipo Imagen*/
        .tipoImagenFormulario{
        	width:500px;
        	height:280px;
        	padding:2px;
        	background:$fondo10 !important;
        }
        
        /*Tipo Imagen*/
        #cobertor{
        	position:fixed;		
        	width:1300px;
        	height:83px;
        	margin-left:50%;
        	left:-650px;
        	background:black;
        	border-radius:0px 0px 10px 10px;
        	top:0px;
        	z-index:2;
        	display:none;
        	
        }/*creo que se puede borrar*/
        
        #margenTipoImagen{
        	position:relative;
        	top:80px;
        	width:1000px;
        	height:auto;
        	margin:0 auto;
        	padding-bottom:2px;	
        	border-radius: 5px;	
        	background-color:$fondo03;
        	color:$textoApagado !important;
        }
        #margenTipoImagen td, #imagenTipoImagen th{
        	width:auto;
        	padding:0px 30px;
        	font-size:14px;
        	text-align:center;	
        }
        #margenTipoImagen:hover{
            top:79px;
        	box-shadow:0px 0px 30px $luzEncendida01;
        	background-color:$fondo05;
        	border:1px solid $bordeEncendido01;
        }
        #filtro{
        	position:fixed;
        	display:block;
        	top:50px;
        	width:1000px;
        	margin:0 auto;
        	color:$textoApagado;
        	background:$fondo03;
        	border-radius:5px;
        	z-index:3;
        }
        #filtro:hover{
            top:49px;
            background:$fondo05;
        	box-shadow:0px 0px 30px $luzEncendida01;
        	text-shadow:0px 0px 10px $luzEncendida01;
        	border:1px solid $bordeEncendido01;
        	color:$textoEncendido;
        }
        #filtro td{
            padding:0px 5px;
        }
        
        .Tabla{
        	position:relative; 
        	top:10px; 
        	margin:0 auto;
        	margin-bottom:40px;
        	border-collapse:collapse;
        	border-radius:25px 0px 25px 0px;
        	background:$fondo03;
        	padding:0px 10px;
        }
        .Tabla:hover{
        	box-shadow:0px 0px 30px $luzEncendida01;
        	text-shadow:0px 0px 10px $luzEncendida01;
        	background-color:$fondo05;
        	color:$textoEncendido;
        }
        .Tabla:hover thead{
            background:$fondo05;
            color:$textoEncendido;
            text-shadow:0px 0px 10px $luzEncendida01;
            border-bottom:4px solid $bordeEncendido01;
        }
        
        thead{
        	background:$fondo03;
        	border-bottom:4px solid $bordeApagado01;
        	color:$textoApagado;
        	border-radius:10px;
        }
        .encabezadoTabla{
        	text-align:center;
        	font-weight:bold;
        }
        .tr-body{
            text-shadow:0px 0px 0px $luzEncendida01;
        	border-bottom:1px solid $bordeApagado01;
        	color:$textoApagado;
        }
        .tr-body:hover{
        	background:$fondo09;
        	color:$textoEncendido;
            text-shadow:0px 0px 10px $luzEncendida01;
            border-bottom:1px solid $bordeEncendido01;
            box-shadow:0px 0px 30px $luzEncendida01;
        }
        .tr-body:hover .imagen, .tr-body:hover .image-tag{
            opacity:1;
            box-shadow: 0px 0px 30px $luzEncendida01;
            border:1px solid $bordeEncendido01;
        }
        .imagen{
        	border-radius:50%;
        	opacity:0.5;
        }
        .image-tag{
        	position:relative;
        	background:$fondo09;
        	padding:0px 2px;
        	left:35px;		
        	top:-10px; 
        	border:1px solid $bordeApagado01;
        	border-radius:3px;
        	height:10px;
        }
        .cuadroTexto{
        	color:$textoEncendido;
        }	

    ";
?>