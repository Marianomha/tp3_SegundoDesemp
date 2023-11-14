<?php
function conocerTipoSolcitud($Valor){

     $Mensaje2=' ';
    if ($Valor ==1){
        $Mensaje2= "Desarrollo de nuevas funcionalidades";
    }
    if ($Valor ==2){
        $Mensaje2= "Reporte de errores";
    }
    if ($Valor ==3){
        $Mensaje2= "Soporte Tecnico";
    }
    
    return $Mensaje2;
    }

?>