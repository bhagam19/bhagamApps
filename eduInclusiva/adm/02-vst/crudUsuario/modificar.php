<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agregar un Nuevo Cliente</title>
    
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" class="text">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            /*session_start();*/
            include('./sideBar.php');
            include('./topBar.php');
        ?>
        
        <!-- Begin Page Content -->
        <div class="container col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <form action='../3-control/clientesInsertar.php' method='POST'>
                            <fieldset>
                                <legend>Básico</legend>
                                <br>
                                <table class='table table-bordered1' id='modClienTable' width='100%' cellspacing='0'>
                                    <tr>
                                        <td colspan='3'>
                                            <label for='naturaleza'>Naturaleza: </label>
                                            <br />    
                                            <input type='text' name='naturaleza' id='natu' size='30'>
                                        </td>
                                        <td colspan='1'>&nbsp;</td>
                                        <td colspan='6'>
                                            <label for='clasificacion'>Clasificación: </label>
                                            <br /> 
                                            <input type='text' name='clasificacion' id='clas' size='40'>
                                        </td>
                                        <td colspan='1'>&nbsp;</td>
                                        <td colspan='3'>
                                            <label for='regimen'>Régimen: *</label>
                                            <br /> 
                                            <select name='regimen'>
                                                <option name='0'  value='Ninguno' selected>Seleccione</option>
                                                <option name='1'  value='Simplificado'>Simplificado</option>
                                                <option name='2' valor='Común'>Común</option>
                                                <option name='3' valor='Especial'>Especial</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='3'>
                                            <label for='tipo'>Tipo: </label>
                                            <br />
                                            <select name='tipo'>
                                                <option name='0'  value='Ninguno' selected>Seleccione</option>
                                                <option name='1'  value='Cédula'>Cédula</option>
                                                <option name='2' valor='Nit'>Nit</option>
                                            </select>
                                        </td>
                                        <td colspan='1'>&nbsp;</td>
                                        <td colspan='6'>
                                            <label for='documento'>Documento: *</label>
                                            <br />
                                            <input type='text' name='documento' id='docu' size='40''>
                                        </td>
                                        <td colspan='1'>&nbsp;</td>
                                        <td colspan='3'>
                                            <label for='dv'>DV: *</label>
                                            <br />
                                            <input type='text' name='dv' id='dv' size='30'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='15'>
                                            <label for='razonSocial'>Razón Social: </label>
                                            <br />
                                            <input type='text' name='razonSocial' id='razo' size='100'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='3'>
                                            <label for='primerNombre'>Primer Nombre: *</label>
                                            <br />
                                            <input type='text' name='primerNombre' id='primernomb' size='25'>
                                        </td>
                                        <td colspan='1'>&nbsp;</td>
                                        <td colspan='3'>
                                            <label for='segundoNombre'>Segundo Nombre: </label>
                                            <br />
                                            <input type='text' name='segundoNombre' id='segundonomb' size='25'>
                                        </td>
                                        <td colspan='1'>&nbsp;</td>
                                        <td colspan='3'>
                                            <label for='primerApellido'>Primer Apellido: *</label>
                                            <br />
                                            <input type='text' name='primerApellido' id='primerapel' size='25'>
                                        </td>
                                        <td colspan='1'>&nbsp;</td>
                                        <td colspan='3'>
                                            <label for='segundoApellido'>Segundo Apellido: </label>
                                            <br />
                                            <input type='text' name='segundoApellido' id='segundoapel' size='25'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='7'>
                                            <label for='direccion'>Dirección: *</label>
                                            <br />
                                            <input type='text' name='direccion' id='dire' size='40'>
                                        </td>
                                        <td colspan='1'>&nbsp;</td>
                                        <td colspan='7'>
                                            <label for='ciudad'>Ciudad: *</label>
                                            <br />
                                            <input type='text' name='ciudad' id='ciud' size='40'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='7'>
                                            <label for='telefono'>Teléfono: *</label>
                                            <br />
                                            <input type='text' name='telefono' id='tele' size='40'>
                                        </td>
                                        <td colspan='1'>&nbsp;</td>
                                        <td colspan='7'>
                                            <label for='mail'>Mail: *</label>
                                            <br />
                                            <input type='text' name='mail' id='mail' size='40'>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td colspan='15'>
                                        <label for='observacion'>Observación: </label>
                                        <br />
                                        <textarea name='observacion' id='observacion' placeholder='Dispone de 3000 caracteres para hacer su observación' cols='130' rows='15'></textarea>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td colspan='6'>&nbsp;</td>
                                        <td colspan='1'>
                                            <a href="../3-control/clientesVer.php" class="btn btn-primary btn-user btn-block">
                                                Ver Clientes
                                            </a>
                                        </td>
                                        <td colspan='1'><button type='reset' class="btn btn-primary btn-user btn-block">Limpiar</button></td>
                                        <td colspan='1'><button type='submit' class="btn btn-primary btn-user btn-block">Enviar</button></td>
                                        <td colspan='7'>&nbsp;</td>
                                    </tr>
                                </table>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <?php
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/htmlclassb/admin/2-vista/logoutModal.php";
        include($path);
    ?>
</body>

</html>