<?php
$path1 = $_SERVER['DOCUMENT_ROOT'];
$path1 .= "/negocioNormal/admin/";
/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
    function hacerFila(){
        $_SESSION['aux']=0;
        global $cont3, $idPerfiles, $nomPerfil;
        for ($m=0; $m<$_SESSION['cantPerfilesEnBD'];$m++){
                                                                                                                        /*Se compara el perfil de la tabla perfiles con los perfiles del usuario seleccionado, si son iguales se le coloca el chequeado*/
            if ($_SESSION['f']<$_SESSION['totalPerfiles']){
                if ($idPerfiles[$_SESSION['f']]==$_SESSION['perfilId'][$m] && $_SESSION['aux']==0){
                    echo '
                        <div class="col-lg-0 p-1">
                            <label class="containerCheckbox???" id="c1">
                            <input type="checkbox" name="'.$_SESSION['f'].'" value="'.$idPerfiles[$_SESSION['f']].'"checked="checked??" checked>
                            <span class="bg-white text-primary checkmark???S"> '.$nomPerfil[$_SESSION['f']].'</span>
                            </label>
                        </div>
                    ';
                    $_SESSION['seleccionadosPrevios'][]=$idPerfiles[$_SESSION['f']];
                    $_SESSION['aux']=1;
                    $_SESSION['f']++;
                }
            }
        }
        if ($_SESSION['aux']==0){
            echo '
                <div class="col-lg-0 p-1">
                    <label class="text-white">
                    <input type="checkbox" name="'.$_SESSION['f'].'" value="'.$idPerfiles[$_SESSION['f']].'"> '.$nomPerfil[$_SESSION['f']].'
                    </label>
                </div>
            ';
            $_SESSION['f']++;
            
        }
        return;
    }
/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
    function guardarSeleccion($aGuardar){
                                                                                                                        /*echo '<br> '.'>>>>>>>>>>>>>Para Guardar'.$aGuardar;*/
        global $path1;
        $case = "perfil";
        include ($path1.'3-control/crudUsuarioxPerfil/insertar.php');
        
        return;
    }
/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
    function perfilesEnBD(){
        global $path1, $rowPerfil;
        /*Borrado de Perfiles Actuales';*/
        while(count($_SESSION['perfilesEnBD'])>0){
            array_pop($_SESSION['perfilesEnBD']);
        }
        $case = "idPerfil";
        $idUsuario=$_SESSION['idUsuario'];
        include ($path1.'3-control/crudUsuarioxPerfil/buscar.php');
        while ($rowActual=mysqli_fetch_row($query3)){
            /*se guardan todos los perfiles creados*/
            $_SESSION['perfilesEnBD'][] = $rowActual[0];
        }
        return;
    }
/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
    function borrarPerfiles($c){
        global $path1;
        $case = "perfil";
        include ($path1.'3-control/crudUsuarioxPerfil/borrar.php');
        return;
    }
/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
    function modificarPerfil(){
                                                                                                                        /*echo 'inicia la funcion modificar perfil'.'<br>';*/
                                                                                                                        /*Se guardan y cuentan los perfiles que fueron seleccionados*/
        global $cont3, $idPerfiles, $perfilId, $nomPerfil, $cantPerfilesSeleccionados, $perfilesSeleccionados,$perfilesConfirmados;
        $y=$_SESSION['cantPerfilesEnBD'];
        for ($h=0; $h<$_SESSION['f'];$h++) {
            if(isset($_POST[$h])){
                $perfilesSeleccionados[]=$_POST[$h];
                $cantPerfilesSeleccionados++;
            }
        }
                                                                                                                        /*echo '<br>#######################################################<br>';
                                                                                                                        echo 'perfilesSeleccionados:<br>';
                                                                                                                        var_dump($perfilesSeleccionados);
                                                                                                                        echo '<br>#######################################################<br>';*/
        /*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&*******&&&&&&&&&&&&&&&&&&&&&&&&&&*******&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&*/
                                                                                                                        /*Borrado del array Perfiles confirmados Actuales para empezar de cero';*/
        
        if (isset($perfilesConfirmados)){
            while(count($perfilesConfirmados)>0){
                array_pop($perfilesConfirmados);
            }
        }
        for ($i=0; $i<$cantPerfilesSeleccionados;$i++) {
                                                                                                                        /*Se guarda en un array los perfiles que fueron seleccionados y que ya están en la base de datos*/
                                                                                                                        /*echo '<br>perfil Seleccionado'.$perfilesSeleccionados[$i].':   ';*/
            for ($j=0; $j<$y;$j++) {
                                                                                                                        /*echo '<br> '.'perfilId'.$_SESSION['perfilId'][$j].'  ';*/
                if ($perfilesSeleccionados[$i]==$_SESSION['perfilId'][$j]){
                    $perfilesConfirmados[]=$perfilesSeleccionados[$i];
                }
            }
        }
        /*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&*******&&&&&&&&&&&&&&&&&&&&&&&&&&*******&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&*/
        perfilesEnBD();
                                                                                                                        /*Borrado de arrays para empezar de cero';*/
        if (isset($w)){
            while(count($w)>0){
                array_pop($w);
            }
        }
        if (isset($paraBorrar)){
            while(count($paraBorrar)>0){
                array_pop($paraBorrar);
            }
        }
                                                                                                                        /*Se comparan los perfilesxusuario guardados en la BD con los que fueron seleccionados
                                                                                                                        y se devuelve los perfiles que están en la BD pero se les quitó la selección.
                                                                                                                        Echo '<br>Perfiles en la BD: ';
                                                                                                                        var_dump($_SESSION['perfilesEnBD']);
                                                                                                                        echo '<br>Perfiles confirmados:';
                                                                                                                        var_dump($perfilesConfirmados);*/
        $w=array_diff($_SESSION['perfilesEnBD'], $perfilesConfirmados);
                                                                                                                        /*echo '<br>Perfiles QUE SE VAN A BORRAR:';
                                                                                                                        var_dump($w);*/
        /*$w=array_filter(($w));*/
        $cw=count($w);
        for ($v=0; $v<$cw;$v++){
                                                                                                                        /*echo '<br>v: '.$v;*/
            $paraBorrar[$v]=array_pop($w);
        }
        /*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&*******&&&&&&&&&&&&&&&&&&&&&&&&&&*******&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&*/
        if (isset($paraBorrar)&&(count($paraBorrar)!=0)){
                                                                                                                        /*echo '<br>para Borrar<br/>';
                                                                                                                        var_dump($paraBorrar);
                                                                                                                        echo '<br>#######################################################<br>';*/
            for ($i=0; $i<count($paraBorrar); $i++) {
                                                                                                                        /*echo '<br>&&&&&&&& este se va a borrar: '.$paraBorrar[$i];*/
            borrarPerfiles($paraBorrar[$i]);
            }
        }
        /*Guardar los nuevos perfiles seleccionados %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        for ($i=0; $i<$cantPerfilesSeleccionados;$i++) {
                                                                                                                        /*echo '<br>perfil Seleccionado'.$perfilesSeleccionados[$i].':   ';*/
            $prev=0;
            for ($j=0; $j<$y;$j++) {
                                                                                                                        /*echo '<br> '.'perfilId'.$_SESSION['perfilId'][$j].'  ';*/
                if ($perfilesSeleccionados[$i]==$_SESSION['perfilId'][$j]){
                    $perfilesConfirmados[]=$perfilesSeleccionados[$i];
                    $prev++;
                }
            }
            if($prev==0){
                                                                                                                        /*echo '<br>Va a entrar a guardar el perfil: '.$perfilesSeleccionados[$i].'<br>###############################################################################';*/
                guardarSeleccion($perfilesSeleccionados[$i]);
            }
        }
                                                                                                                        /*$mensaje =$perfilesSeleccionados[0].'  aaaaaaaaaaaaaaa '.$prev.' '.$cantPerfilesSeleccionados;
                                                                                                                        echo'<br>'. $mensaje;*/
    return;
    }
/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
?>