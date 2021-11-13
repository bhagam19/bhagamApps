<?php
    include ('./cabecera.php');
?>
    <br />
    <br />
    <div class="form-group text-center">
        <p>Este token está vencido. Esto se debe a que pasaron más de 10 minutos antes de usar el código que se le envío al correo.</p>
        <br />
        <br />
        <p>Por favor solicita otro código  
            <a href="<?=$_SESSION['path2']?>restablecerContrasena/forgot-password.php">
                aquí
            </a>
        </p>
    </div>
    <br />
    <br />
<?php
    include ('./pie.php');
?>