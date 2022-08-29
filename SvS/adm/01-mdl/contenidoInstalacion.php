<?php    
    $datos=[
        "instalacion"=>"
            id int NOT NULL AUTO_INCREMENT,            
            confirmacion int(1) NOT NULL,
            PRIMARY KEY(id)
            "
        ,
        "usuarios"=>"
            id int NOT NULL AUTO_INCREMENT,
            dane varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            contrasena varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            institucion varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            correoInstitucional varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            defUsuario int NOT NULL ,
            permiso int NOT NULL,
            PRIMARY KEY(id)
            "
        ,
        "simat"=>"
            id int NOT NULL AUTO_INCREMENT,
            institucion varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            sede varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            grupo varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            tipoDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            numDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            estado varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            fechaEstado date,
            fechaNacimiento date,
            telefono varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            eps varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            direccion varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            pais varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            estrategiaPAE int(1) NOT NULL,
            estrategiaTransporte int(1) NOT NULL,
            PRIMARY KEY(id)
            "
        ,
        "sinai"=>"
            id int NOT NULL AUTO_INCREMENT,
            institucion varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            sede varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,            
            grupo varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            tipoDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            numDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            estado varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            fechaEstado date,            
            fechaNacimiento date,
            telefono varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            eps varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            direccion varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            pais varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            PRIMARY KEY(id)
            "        
    ];
    $contenidos=[
        "instalacion"=>1,
        "usuarios"=>['
            "71379517",
            "SvS1234*",
            "IE Entrerríos",
            "ieerectoria2021@gmail.com",
            1,
            6
        ','
            "105264000013",
            "SvS1234*",
            "IE Entrerríos",
            "ieerectoria2021@gmail.com",
            1,
            1
        ','
            "205034000248",
            "SvS1234*",
            "IE Tapartó",
            "inetaparto@gmail.com",
            1,
            1
        ','
            "205264000123",
            "SvS1234*",
            "CER Yerbabuenal",
            "ceryerbabuenal2015@gmail.com",
            1,
            1
        ']
    ]; 
?>