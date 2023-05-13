<?php
// Inicio de la sesión
session_name("SINSIMAT");
session_start();
// Inclusión de los archivos necesarios
require_once dirname(__FILE__).'/adm/03-cnt/modeloController.php';
try {
    // Creación de una nueva instancia de la clase modeloController
    $modeloController = new modeloController();
    // Verificación de la instalación
    $instalacionVerificada = $modeloController->verificarInstalacion();
    // Si la instalación no está verificada, se procede a instalar
    if ($instalacionVerificada === NULL) {
        $modeloController->instalar();
    } else {
        // Si la instalación está verificada, se muestra la página de inicio
        $modeloController->index();
    }
} catch (Exception $e) {
    // Manejo de errores
    echo 'Error: ' . $e->getMessage();
}
?>