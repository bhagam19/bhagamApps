<?php
    session_start();
    include ('../../1-model/conex.php');
    $nombres=$_POST['nombres'];
    $telefono=$_POST['telefono'];
    $usuario=$_POST['user'];
    $email=$_POST['email'];
    $pass=hash('sha512','73b0c0eeb6e3b347a4c32822293c71c72dafa8f5b08961c1811ab425fdf06a5dbf27b3b3200a7731b65ca36ff80a743'.$_POST['pass']);
    /*echo "<hr>".$pass."<hr>";*/
    password_verify($_POST['pass'], $pass);
    $_SESSION['email']=$email;
    $_SESSION['usuarioInsertar']=$usuario;
    $message = ''; 
    if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Registrarse'){
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK){
            // get details of the uploaded file
            $fileTmpPath = $_FILES['foto']['tmp_name'];
            $fileName = $_FILES['foto']['name'];
            $fileSize = $_FILES['foto']['size'];
            $fileType = $_FILES['foto']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            // sanitize file-name
            $newFileName = $usuario . '.' . $fileExtension;
            // check if file has one of the following extensions
            $allowedfileExtensions = array('jpg', 'jpeg', 'png');
            if (in_array($fileExtension, $allowedfileExtensions)){
                // directory in which the uploaded file will be moved
                $uploadFileDirBase = '/negocioNormal/admin/users/';
                $dest_pathBase = $uploadFileDirBase . $newFileName;
                $uploadFileDir = '../../users/';
                $dest_path = $uploadFileDir . $newFileName;
                if(move_uploaded_file($fileTmpPath, $dest_path)){
                    $message ='File is successfully uploaded.';
                }else{
                    $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                }
            }else{
                $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            }
        }else{
            echo "Línea 42: Hasta aquí va bien";

            $message = 'There is some error in the file upload. Please check the following error.<br>';
            $message .= 'Error:' . $_FILES['foto']['error'];
        }
    }
    /*$tabla="usuarios";
    $case="email/usuario";
    include($_SESSION['select'].$tabla.".php");*/


    $consulta="SELECT * FROM usuarios WHERE mail = '$email' OR usuario = '$usuario'";
    $query=$con->query($consulta);
    $cont=mysqli_num_rows($query);
    /*echo $cont;*/
    if ($cont>=1){
        echo "<br />Usuario ya fue creado con anterioridad.<br /><br />";
        echo "<a href='../../HTML/formRegistro.php'>Por favor ingrese otra información</a>";
    }
    else{
        $query="INSERT INTO usuarios (mail, usuario, pass, nombres, telefono, foto) VALUE ('".$email."', '".$usuario."', '".$pass."', '".$nombres."', '".$telefono."', '". $dest_pathBase ."')";
        if ($con->query($query)===TRUE){
            echo "<br /><h2>Cliente creado exitosamente.<h2><br /><br />";
            echo "<h4>Bienvenido: $usuario<br /><br /><h2>";
            
        }
        else{
            echo "<br /><br /><br />Error al crear el cliente.<br /><br />".$query."<br /><br />".$con->error;
        }
    }
    mysqli_close($con);
?>
<!--<br /><br /><br />
<a href='./verUsers.php'>Ver usuarios insertados</a>-->
<br />
<br />
<a href="../../index.php">Volver al Inicio</a>