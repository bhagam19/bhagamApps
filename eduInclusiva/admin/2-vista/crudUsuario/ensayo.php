<form class="user" enctype="multipart/form-data">
    <?php
        $mail=$_GET['mail'];
        $consulta="SELECT * FROM usuarios WHERE mail='".$mail."'";
        $query=$con->query($consulta);
        $row=mysqli_fetch_row($query);
        echo '
            <div class="row mb-4">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for="nombres">Nombres</label>
                            <input type="text" name="nombres" class="form-control form-control-user" id="exampleFirstName" placeholder="Escriba sus Nombres (obligatorio)" value="'.$row[5].'">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" class="form-control form-control-user" id="exampleFirstName" placeholder="Escriba su Teléfono (obligatorio)"  value="'.$row[4].'">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for=""></label>
                            <input type="text" name="user" class="form-control form-control-user" id="exampleFirstName" placeholder="Escriba un usuario (obligatorio)"  value="'.$row[1].'">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Escriba una contraseña  (obligatorio)">
                        </div>
                        <!--<div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="col-sm-12 ">
                        <div class=" d-flex justify-content-center ">
                            <div>
                                <p>Seleccione su foto de perfil</p>
                                <img class="img-profile rounded-circle mb-3" id="imagenPrevisualizacion" src="'.$row[6].'" width="240px" height="240px">
                            </div>
                        </div>
                        <div>
                            <input type="file" class="btn btn-primary btn-user btn-block" id="seleccionArchivos" accept="image/png, .jpeg, .jpg" name="foto">
                        </div>
                    </div>
                </div>
            </div>
            <script src="../../js/js.js"></script>
            <div class="form-group">
                <label for="email">Correo</label>
                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Escriba su correo electrónico  (obligatorio)"  value="'.$row[3].'">
            </div>
            <br />
            <input type="submit" class="btn btn-primary btn-user btn-block" name="uploadBtn" value="Registrarse" />
        ';
    ?>
</form>