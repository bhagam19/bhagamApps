<?php    
    $datos=[
        "instalacion"=>"
            codInstalacion int NOT NULL AUTO_INCREMENT,            
            confirmacion int(1) NOT NULL,
            PRIMARY KEY(codInstalacion)
            "
        ,
        "usuarios"=>"
            institucionID int NOT NULL AUTO_INCREMENT,
            dane varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            contrasena varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            institucion varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            correoInstitucional varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            defUsuario int NOT NULL ,
            permiso int NOT NULL,
            PRIMARY KEY(institucionID)
            "
        ,
        "simat"=>"
            id int NOT NULL AUTO_INCREMENT,
            grupo varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            estado varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            fechaEstado date,
            apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            tipoDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            numDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
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
            grupo varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            estado varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            fechaEstado date,
            apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            tipoDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            numDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
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
            "105264000013",
            "SvS1234*",
            "IE Entrerríos",
            "ieerectoria2021@gmail.com",
            1,
            6
        ','
            "205034000248",
            "SvS1234*",
            "IE Tapartó",
            "ieerectoria2021@gmail.com",
            1,
            1
        ']
    ]; 
?>