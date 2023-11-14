<?php 
function colorTipoSolicitud($Valor){
$Mensaje= '';
 if ($Valor ==1){
    $Mensaje= "table-info";
}
if ($Valor ==2){
    $Mensaje= "table-warning";
}
if ($Valor ==3){
    $Mensaje= "table-danger";
}

return $Mensaje;

}





?>