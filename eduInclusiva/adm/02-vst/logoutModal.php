            <!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
            <!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Está seguro de querer cerrar la sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" si en verdad desea finalizar la sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="/negocioNormal/admin/3-control/cerrarSesion.php">Salir</a>
                </div>
            </div>
        </div>
    </div>
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/negocioNormal/admin/1-model/conex.php');
$consulta="SELECT * FROM usuarios";
$query=$con->query($consulta);
while($row=mysqli_fetch_row($query)){
    echo'
        <div class="modal fade" id="borrarModal'.$row[0].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Está segur@ de querer <p class="rojo">BORRAR ESTE USUARIO Y TODA LA INFORMACIÓN RELACIONADA CON ÉL?</p></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="user" enctype="multipart/form-data">
    ';
                    $consulta1="SELECT perfiles.descripcion FROM perfiles
                                INNER JOIN usuarioxperfil
                                ON perfiles.idPerfil = usuarioxperfil.idPerfil
                                INNER JOIN usuarios
                                ON usuarioxperfil.idUsuario=usuarios.idUsuario
                                WHERE usuarios.idUsuario ='".$row[0]."'";
                    $query1=$con->query($consulta1);
    echo '
                            <div>
                                <label class="azul"><p class="azul">Perfiles</p></label>
                                <br />
    ';
                                while($row1=mysqli_fetch_row($query1)){
                                    echo '
                                        <label>'.$row1[0].', </label>
                                    ';
                                }
    echo '
                                <hr>
                            </div>
                            <div class="row mb-4">
                            <div class="col-lg-6 d-flex flex-column justify-content-center">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="azul"><p class="azul">Nombres</p></label>
                                        <br />
                                        <label>'.$row[5].'</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="azul">Teléfono</label>
                                        <br />
                                        <label>'.$row[4].'</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="azul"><p class="azul">Usuario</p></label>
                                        <br />
                                        <label>'.$row[1].'</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-sm-12 ">
                                    <div class=" d-flex justify-content-center ">
                                        <div>
                                            <img class="img-profile <!--rounded-circle--> mb-3" id="imagenPrevisualizacion" src="'.$row[6].'" width="240px" height="240px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="../../js/js.js"></script>
                        <div class="form-group">
                            <label class="azul"><p class="azul">Correo</p></label>
                            <br />
                            <label>'.$row[3].'</label>
                        </div>
                    </form>
                    <hr />
                    Seleccione "Borrar" si en verdad desea borrar el usuario seleccionado.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="/negocioNormal/admin/3-control/clientesBorrar.php?mail='.$row[3].'">Borrar</a>
                </div>
            </div>
        </div>
    </div>
    ';
}
?>




<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include($path.'/negocioNormal/admin/1-model/conex.php');
    $consulta="SELECT * FROM usuarioxalertas WHERE idUsuario='".$_SESSION['id']."' ORDER BY fecha DESC";
    $query=$con->query($consulta);
    $cont=mysqli_num_rows($query);
    if($cont>=1){               
        while($row=mysqli_fetch_row($query)){

            echo '
                <div class="modal fade" id="alertasModal'.$row[0].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div>';
                                    $consulta="SELECT * FROM alertas WHERE idAlerta=$row[2]";
                                    $query=$con->query($consulta);
                                    $rowb=mysqli_fetch_row($query);
                                echo '
                                    <h6 class="modal-title" id="exampleModalLabel">Asunto: '.$rowb[2].'</h6>
                                    <p class="font-weight-bold">Fecha:    '.cambiaf_a_espanol($row[3]).'</p>
                                </div>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-header text-info">
                                <div>
                                    <p class="font-weight-bold text-dark">Mensaje:</p>
                                    '.$rowb[3].'
                                </div>
                            </div>
                            <div class="modal-body">
                                <!--Seleccione "Aceptar" si desea marcar como leída la alerta actual.-->
                            </div>
            ';
                            if ($row[4]==2){
                                echo'
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-primary" href="/negocioNormal/admin/3-control/alertasLeida.php?idAlerta='.$row[0].'">Marcar como leida</a>
                                    </div>
                                ';
                            }else{
                                echo'
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                    </div>
                                '; 
                            }
            echo '
                        </div>
                    </div>
                </div>
            ';
        }
    }
?>





    <!-- Bootstrap core JavaScript-->
    <script src="/negocioNormal/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/negocioNormal/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/negocioNormal/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/negocioNormal/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/negocioNormal/admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/negocioNormal/admin/js/demo/chart-area-demo.js"></script>
    <script src="/negocioNormal/admin/js/demo/chart-pie-demo.js"></script>