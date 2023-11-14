<?php


function calcularFechaEntrega ($TipoSolicitud){
$FechaEntrega=" ";

if($TipoSolicitud== '1'){
    $FechaEntrega = strtotime("+ 7 days" ); 


}else if($TipoSolicitud == '2'){
    $FechaEntrega = strtotime("+ 1 days" );



}else {
    $FechaEntrega = strtotime("+ 3 days" );
    


}


return date("Y-m-d" ,$FechaEntrega);
}



?>