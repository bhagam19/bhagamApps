<?php    
    $filterCol=[3,7,8,9];
    $keyIndex=[6,8,9];
    $cnt=0;
    if(isset($_GET['condicion1'])){
        $condicion1=$_GET['condicion1'];
    }
    $condicion1=str_replace("'","\'",$condicion1);
    //echo $condicion1." en filtros... <br>";
    require_once('../../03-cnt/00-Ppal/reporte01.php');    
    for($i=0;$i<count($tituloEncabezado1)+1;$i++){
        echo'
            <form class="formFiltro">
        ';
        if(in_array($i,$filterCol)){            
            echo'
                <div class="multiselect">
                    <div class="selectBox" onclick="showCheckboxes('.$i.')">
                        <select>
                            <option></option>
                        </select>
                        <div class="overSelect"></div>
                    </div>
                    <div id="checkboxes'.$i.'" class="checkboxes">
            ';
            if(count($filtros)>0):
                foreach($filtros[$keys[$keyIndex[$cnt]]] as $f){  
                    echo'                    
                        <label for='.$f.'><input type="checkbox" id='.$f.' checked onclick="filtrar(\''.$condicion1.'\',\''.$keys[$keyIndex[$cnt]].'\',this.id,'.$id.')" />'.$f.'</label>
                    ';
                } 
            endif;
            $cnt++;
            echo'
                        </div>
                    </div>
            ';            
        }
        echo'
            </form>
        ';
    }         
?>