<?php
    require_once dirname(__FILE__).'/../01-mdl/index.php';
    class modeloController{
        private $model;
        private $dato;
        public function __construct(){
            $this->model =new Modelo();	
        } 
        static function verificarInstalacion(){
            $tabla='information_schema.tables';
            $condicion='table_schema="Adolfo_SvS" AND table_name="instalacion"';
            $registro=new Modelo();
            $dato=$registro->mostrar($tabla,$condicion);            
            return $dato;
        }
        static function instalar(){
            require('adm/01-mdl/headerInstallBD.php');
            require('adm/01-mdl/contenidoInstalacion.php');
            $registro=new Modelo();
            foreach($datos as $tabla=>$columnas){
                $dato=$registro->crearTabla($tabla,$columnas); 
            }
            foreach($contenidos as $tabla=>$valores){
                if(is_array($valores)){
                    foreach($valores as $valor){
                        $dato=$registro->insertarValores($tabla,$valor);
                    }
                }else{
                    $dato=$registro->insertarValores($tabla,$valores);
                }
            }
            require('adm/01-mdl/footerInstallBD.php');
                                      
        }       
        static function index(){
            require('adm/02-vst/index.php');
        }
        static function validarLogin($tabla,$condicion,$contrasena){
            $registro=new Modelo();
            $dato= $registro->mostrar($tabla,$condicion);
            $respuesta;
            if($dato===NULL){       
                $respuesta="NE";    
            }else{
                foreach($dato as $key=>$v){
                    $usuarioBD=$v['dane'];
                    $dbHash=$v['contrasena'];
                    $institucionIDBD=$v['institucionID'];
                    $permisoBD=$v['permiso'];
                    if($contrasena==$dbHash||crypt($contrasena,$dbHash) == $dbHash){
                        $_SESSION['usuario']=$usuarioBD;
                        $_SESSION['usuarioID']=$institucionIDBD;
                        $_SESSION['permiso']=$permisoBD;
                        if($dbHash=="SvS1234*"){
                            $respuesta="C";                        
                        }else{
                            $respuesta="S";
                        }
                    }else{
                        $respuesta="N";
                    }
                }                
            }
            return $respuesta;
        }
        static function cargarUsuarioActivo(){
            $tabla='usuarios';
            $condicion='dane='.$_SESSION['usuario'];
            $registro=new Modelo();
            $dato= $registro->mostrar($tabla,$condicion);
            return $dato;            
        }
        static function consultar($tabla,$condicion){
            $registro=new Modelo();
            $dato= $registro->mostrar($tabla,$condicion);
            return $dato;
        }
        static function consultarJoin($columnas,$tabla1,$tipoJoin,$tabla2,$On,$condicion){
            $registro=new Modelo();
            $dato= $registro->mostrarJoin($columnas,$tabla1,$tipoJoin,$tabla2,$On,$condicion);
            return $dato;
        }
    }
?>