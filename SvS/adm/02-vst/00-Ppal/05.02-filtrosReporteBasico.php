
<?php    
    $filterCol=[3,6,7,8];
    $keyIndex=[6,1,2,3];
    $cnt=0;
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
            foreach($filtros[$keys[$keyIndex[$cnt]]] as $f){  
                echo'                    
                    <label for='.$f.'><input type="checkbox" id='.$f.' onclick="filtrar(\''.$keys[$keyIndex[$cnt]].'\',\''.$f.'\',this.id)" />'.$f.'</label>
                ';
            } 
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