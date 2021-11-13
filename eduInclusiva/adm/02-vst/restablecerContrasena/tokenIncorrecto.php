<?php
    include ('./cabecera.php');
?>
    <br />
    <br />
    <div class="form-group text-center">
        <p>El código digitado es incorrecto. Por favor verifíquelo y escriba el código enviado a su correo.</p>
        <br />
        <br />
        <a href="<?=$_SESSION['path2']?>restablecerContrasena/digitarCodigo.php" class="btn btn-primary btn-user btn-block">
            Volver a Escribir el Código
        </a>
    </div>
    <br />
    <br />
<?php
    include ('./pie.php');
?>