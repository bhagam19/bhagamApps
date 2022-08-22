<div class="cargadorDatos">
    <h3>Importar Datos</h3>
<?php
    $datosComponente=[
        [
            'titulo'=>'Datos SINAI',
            'ruta'=>'00-cargarCsvSinai',
            'archivo'=>'sinai'
        ],[
            'titulo'=>'Datos SIMAT',
            'ruta'=>'01-cargarCsvSimat',
            'archivo'=>'simat'
        ],[
            'titulo'=>'Datos Anexo 6A',
            'ruta'=>'02-cargarCsv6AFUC',
            'archivo'=>'Anexo6AFUC'
        ],[
            'titulo'=>'Datos PAE',
            'ruta'=>'03-cargarCsvEstPAE',
            'archivo'=>'estPAE'
        ]       
    ];
    foreach($datosComponente as $componente){
        echo '
            <div id="contenedor-formulario">     
                <div id="formLabel">'.$componente['titulo'].'</div>
                <form enctype="multipart/form-data" action="adm/03-cnt/'.$componente['ruta'].'.php" method="POST">                    
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                    <input name="subir_archivo" type="file" />
                    <input type="submit" value="Enviar" />
                </form>
                <div>Última versión: '.date('F d Y',filemtime(dirname(__FILE__).'/../../archivos/'.$componente['archivo'].'.csv')).'</div> 
            </div>
        '; 
    }
?>
</div>